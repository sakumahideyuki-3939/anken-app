<?php
/**
 * calc_anken.php
 * 暗剣殺占いアプリ 計算ロジック本体【復旧・完全版】
 *
 * 役割:
 * 1. setsu.php を読み込み、節入りを考慮して年・月・日の九星を算出
 * 2. 盤面（宮配置）を生成
 * 3. 暗剣殺・五黄殺・ダブル暗剣殺の判定を行う
 * 4. day.php (UI) が必要とする配列データを返却する
 */

// 依存ファイルの読み込み（同階層にある前提）
require_once __DIR__ . '/setsu.php';

// --------------------------------------------------
// 定数・設定データ（ZIP準拠）
// --------------------------------------------------

// 日盤切替日
$date_change = array(
    '1916-12-23', '1928-06-23', '1939-12-23', '1951-06-23',
    '1962-12-22', '1974-06-22', '1985-12-21', '1997-06-21',
    '2008-12-20', '2020-06-20', '2031-12-20', '2043-06-20'
);

// 年盤・月盤計算用 配列（降順）
// index 0 = 9 (1919年基準)
$star_desc_array = array(9, 8, 7, 6, 5, 4, 3, 2, 1);

// --------------------------------------------------
// 基本計算関数
// --------------------------------------------------

/**
 * 数値を1-9の範囲に正規化（循環）
 */
function F_NO($num) {
    while ($num < 1) {
        $num += 9;
    }
    while ($num > 9) {
        $num -= 9;
    }
    return $num;
}

/**
 * 年星計算（節入り補正前）
 */
function YEAR_no_base($y, $m) {
    global $star_desc_array;
    $BASE_y = 1919;
    
    $diff = $y - $BASE_y;
    $Num = $diff % 9;
    
    if ($Num < 0) {
        $Num += 9;
    }
    
    $Y_no = $star_desc_array[$Num];

    if ($m == 1) {
        $Y_no = F_NO($Y_no + 1);
    }
    return $Y_no;
}

/**
 * 月星計算（節入り補正前）
 */
function MONTH_no_base($y, $m) {
    global $star_desc_array;
    $BASE_y = 1919;
    $BASE_m = 7;
    
    $MM = $m - $BASE_m;
    $YY = ($y - $BASE_y) * 12 + $MM;

    if ($YY < 0) {
        $YY = -1 * $YY;
        $mod = $YY % 9;
        if ($mod == 0) {
            $M_no = 9;
        } else {
            $M_no = $mod;
        }
    } else {
        $M_no = $star_desc_array[$YY % 9];
    }
    return $M_no;
}

/**
 * 日星計算
 */
function DATE_no_base($year1, $month1, $day1, $date_change) {
    $now_flg = 0;
    $dateno = '';
    $date_k = -1;
    $D_no = 0;

    $temp_d = sprintf("%04d-%02d-%02d", $year1, $month1, $day1);

    foreach ($date_change as $key => $value) {
        if ($value == $temp_d) {
            if ($month1 == 12) {
                $D_no = 7;
            } else {
                $D_no = 3;
            }
            $now_flg = 1;
            break;
        } elseif ($value < $temp_d) {
            $dateno = $value;
            $date_k = $key;
        }
    }

    if ($now_flg == 0) {
        if ($date_k == -1 || !isset($date_change[$date_k + 1])) {
            return array(false, true);
        }

        $_base = date("Y-m-d", strtotime("$dateno +30 day"));
        $base = explode("-", $_base);

        $dt1 = gmmktime(0, 0, 0, $month1, $day1, $year1);
        $dt2 = gmmktime(0, 0, 0, $base[1], $base[2], $base[0]);
        $diff = $dt1 - $dt2;
        $diffDay = $diff / (60 * 60 * 24);

        $cnt = floor($diffDay / 180);
        $D_no = F_NO($diffDay % 180 % 9 + 1);

        $XD = $date_change[$date_k + 1];

        $date = new DateTime($XD);
        $date->sub(new DateInterval('P30D'));
        $PD = $date->format('Y-m-d');

        $date = new DateTime($dateno);
        $date->sub(new DateInterval('P30D'));
        $ND = $date->format('Y-m-d');

        $TD = $temp_d;
        $XM = explode("-", $XD);

        if ($TD < $ND) {
            if ($XM[1] == '06') {
                $D_no = 7 + $D_no + 2;
            } else {
                $D_no = 5 - $D_no + 5;
            }
        } elseif ($TD >= $PD && $TD < $XD) {
            if ($XM[1] == '12') {
                $D_no = 5 - $D_no + 5;
            }
        } else {
            if ((int)$base[1] - 1 == 6) {
                if ($cnt % 2 == 0) {
                    $D_no = 5 - $D_no + 5;
                }
            } else {
                if ($cnt % 2 == 1) {
                    $D_no = 5 - $D_no + 5;
                }
            }
        }
    }

    return array(F_NO($D_no), false);
}

/**
 * 九星盤取得（固定9パターン参照・ハードコード版）
 * 戻り値：宮ID(1..9) => 星(1..9)
 */
function get_fixed_board_by_palace($center_star) {
    $center_star = (int)$center_star;
    if ($center_star < 1 || $center_star > 9) {
        return array();
    }

    $boards = array(
        1 => array(5=>1, 4=>2, 3=>3, 2=>4, 1=>5, 9=>6, 8=>7, 7=>8, 6=>9),
        2 => array(5=>2, 4=>3, 3=>4, 2=>5, 1=>6, 9=>7, 8=>8, 7=>9, 6=>1),
        3 => array(5=>3, 4=>4, 3=>5, 2=>6, 1=>7, 9=>8, 8=>9, 7=>1, 6=>2),
        4 => array(5=>4, 4=>5, 3=>6, 2=>7, 1=>8, 9=>9, 8=>1, 7=>2, 6=>3),
        5 => array(5=>5, 4=>6, 3=>7, 2=>8, 1=>9, 9=>1, 8=>2, 7=>3, 6=>4),
        6 => array(5=>6, 4=>7, 3=>8, 2=>9, 1=>1, 9=>2, 8=>3, 7=>4, 6=>5),
        7 => array(5=>7, 4=>8, 3=>9, 2=>1, 1=>2, 9=>3, 8=>4, 7=>5, 6=>6),
        8 => array(5=>8, 4=>9, 3=>1, 2=>2, 1=>3, 9=>4, 8=>5, 7=>6, 6=>7),
        9 => array(5=>9, 4=>1, 3=>2, 2=>3, 1=>4, 9=>5, 8=>6, 7=>7, 6=>8),
    );

    return $boards[$center_star];
}

// --------------------------------------------------
// 判定ロジック関数
// --------------------------------------------------

/**
 * 盤から「指定した星が入っている宮ID」を返す
 */
function find_palace_of_star($board, $star) {
    $star = (int)$star;
    foreach ($board as $palace => $s) {
        if ((int)$s === $star) {
            return (int)$palace;
        }
    }
    return null;
}

/**
 * 宮IDの対冲（180度反対宮）を返す
 */
function opposite_palace($palace) {
    $palace = (int)$palace;
    $map = array(
        1 => 9, 2 => 8, 3 => 7,
        4 => 6, 5 => 5, 6 => 4,
        7 => 3, 8 => 2, 9 => 1
    );
    return isset($map[$palace]) ? $map[$palace] : null;
}

/**
 * 暗剣殺（単）判定
 */
function judge_anken_single($board, $honmei_star) {
    $fivePalace = find_palace_of_star($board, 5);
    
    if ($fivePalace === null) {
        return array('ok' => false, 'five_palace' => null, 'anken_palace' => null, 'target_palace' => null);
    }

    $ankenPalace = opposite_palace($fivePalace);
    $targetPalace = find_palace_of_star($board, $honmei_star);

    // 成立判定
    $is_ok = ($targetPalace !== null && $targetPalace === $ankenPalace);

    return array(
        'ok' => $is_ok,
        'five_palace' => $fivePalace,
        'anken_palace' => $ankenPalace,
        'target_palace' => $targetPalace
    );
}

/**
 * 五黄殺 判定
 */
function judge_gogyo($board, $meigu) {
    if (!isset($board[$meigu])) {
        return array('ok' => false, 'meigu' => $meigu, 'star_at_meigu' => null);
    }
    
    $star = $board[$meigu];
    $is_ok = ((int)$star === 5);

    return array(
        'ok' => $is_ok,
        'meigu' => $meigu,
        'star_at_meigu' => $star
    );
}

/**
 * ダブル暗剣殺 判定（A×B盤）
 */
function judge_anken_double($boardA, $boardB, $honmei_star) {
    // 主判定 (A盤の5の対冲が、B盤の本命星位置と同じか)
    $A5 = find_palace_of_star($boardA, 5);
    $M = opposite_palace($A5);
    $B_honmei = find_palace_of_star($boardB, $honmei_star);
    $main_ok = ($M !== null && $M === $B_honmei);

    // 検算 (B盤の5の対冲が、A盤の本命星位置と同じか)
    $B5 = find_palace_of_star($boardB, 5);
    $N = opposite_palace($B5);
    $A_honmei = find_palace_of_star($boardA, $honmei_star);
    $check_ok = ($N !== null && $N === $A_honmei);

    return array(
        'ok' => ($main_ok && $check_ok),
        'main' => array(
            'A5' => $A5,
            'M' => $M,
            'B_honmei' => $B_honmei,
            'ok' => $main_ok
        ),
        'check' => array(
            'B5' => $B5,
            'N' => $N,
            'A_honmei' => $A_honmei,
            'ok' => $check_ok
        )
    );
}

// --------------------------------------------------
// メイン計算ロジック（ここがday.phpから呼ばれる）
// --------------------------------------------------

function calc_anken_main($birth_y, $birth_m, $birth_d, $target_y, $target_m, $target_d) {
    global $SDAY_array, $date_change;

    // --- 本命星・命宮計算 ---
    
    $birth_Y_no = YEAR_no_base($birth_y, $birth_m);
    $birth_M_no = MONTH_no_base($birth_y, $birth_m);
    
    // 節入り判定（setsu.phpのデータを使用）
    if (isset($SDAY_array[$birth_y][$birth_m - 1])) {
        $birth_setsu = $SDAY_array[$birth_y][$birth_m - 1];
        if ($birth_d < $birth_setsu) {
            $birth_M_no = F_NO($birth_M_no + 1);
            if ($birth_m == 2) {
                $birth_Y_no = F_NO($birth_Y_no + 1);
            }
        }
    } else {
        // データ範囲外エラー
        return array('status' => false, 'error' => 'Birth date out of range (setsu data missing)');
    }

    $honmei_star = $birth_Y_no;
    $meigu = F_NO($birth_Y_no - $birth_M_no + 1);

    // --- 指定日盤計算 ---
    
    $target_Y_no = YEAR_no_base($target_y, $target_m);
    $target_M_no = MONTH_no_base($target_y, $target_m);

    if (isset($SDAY_array[$target_y][$target_m - 1])) {
        $target_setsu = $SDAY_array[$target_y][$target_m - 1];
        if ($target_d < $target_setsu) {
            $target_M_no = F_NO($target_M_no + 1);
            if ($target_m == 2) {
                $target_Y_no = F_NO($target_Y_no + 1);
            }
        }
    } else {
        return array('status' => false, 'error' => 'Target date out of range (setsu data missing)');
    }

    list($target_D_no, $is_error) = DATE_no_base($target_y, $target_m, $target_d, $date_change);
    
    if ($is_error) {
        return array('status' => false, 'error' => 'Target date out of range (date_change data missing)');
    }

    // --- 盤データ取得（単一次元配列：宮ID=>星） ---
    $year_board  = get_fixed_board_by_palace($target_Y_no);
    $month_board = get_fixed_board_by_palace($target_M_no);
    $day_board   = get_fixed_board_by_palace($target_D_no);

    // --- 判定ロジック実行 ---
    $judges = array(
        'month' => array(
            'anken'  => judge_anken_single($month_board, $honmei_star),
            'gogyo'  => judge_gogyo($month_board, $meigu),
            'double' => judge_anken_double($year_board, $month_board, $honmei_star) // 年×月
        ),
        'day' => array(
            'anken'  => judge_anken_single($day_board, $honmei_star),
            'gogyo'  => judge_gogyo($day_board, $meigu),
            'double' => judge_anken_double($month_board, $day_board, $honmei_star) // 月×日
        )
    );

    // --- 結果返却 ---
    return array(
        'status'      => true,
        'honmei'      => $honmei_star,
        'meigu'       => $meigu,
        'year_star'   => $target_Y_no,
        'month_star'  => $target_M_no,
        'day_star'    => $target_D_no,
        'year_board'  => $year_board,
        'month_board' => $month_board,
        'day_board'   => $day_board,
        'judges'      => $judges
    );
}
?>