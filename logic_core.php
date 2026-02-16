<?php
/**
 * logic_core.php
 * 【絶対編集禁止】算出ロジック本体・隔離ファイル
 * 1967年10月13日 ＝ 本命[6] / 月[6] / 日[2] を出す心臓部。
 */

require_once __DIR__ . '/setsu.php';

$star_desc_array = array(9, 8, 7, 6, 5, 4, 3, 2, 1);
$date_change = array(
    '1916-12-23', '1928-06-23', '1939-12-23', '1951-06-23',
    '1962-12-22', '1974-06-22', '1985-12-21', '1997-06-21',
    '2008-12-20', '2020-06-20', '2031-12-20', '2043-06-20'
);

function F_NO($num) {
    while ($num < 1) { $num += 9; }
    while ($num > 9) { $num -= 9; }
    return $num;
}

function YEAR_no_base($y, $m) {
    global $star_desc_array;
    $BASE_y = 1919;
    $diff = $y - $BASE_y;
    $Num = $diff % 9;
    if ($Num < 0) { $Num += 9; }
    $Y_no = $star_desc_array[$Num];
    if ($m == 1) { $Y_no = F_NO($Y_no + 1); }
    return $Y_no;
}

function MONTH_no_base($y, $m) {
    global $star_desc_array;
    $BASE_y = 1919; $BASE_m = 7;
    $MM = $m - $BASE_m;
    $YY = ($y - $BASE_y) * 12 + $MM;
    if ($YY < 0) {
        $YY = -1 * $YY; $mod = $YY % 9;
        $M_no = ($mod == 0) ? 9 : $mod;
    } else {
        $M_no = $star_desc_array[$YY % 9];
    }
    return $M_no;
}

function DATE_no_base($year1, $month1, $day1, $date_change) {
    $now_flg = 0; $dateno = ''; $date_k = -1; $D_no = 0;
    $temp_d = sprintf("%04d-%02d-%02d", $year1, $month1, $day1);
    foreach ($date_change as $key => $value) {
        if ($value == $temp_d) {
            $D_no = ($month1 == 12) ? 7 : 3;
            $now_flg = 1; break;
        } elseif ($value < $temp_d) {
            $dateno = $value; $date_k = $key;
        }
    }
    if ($now_flg == 0) {
        if ($date_k == -1 || !isset($date_change[$date_k + 1])) { return array(false, true); }
        $_base = date("Y-m-d", strtotime("$dateno +30 day"));
        $base = explode("-", $_base);
        $dt1 = gmmktime(0, 0, 0, $month1, $day1, $year1);
        $dt2 = gmmktime(0, 0, 0, $base[1], $base[2], $base[0]);
        $diff = $dt1 - $dt2; $diffDay = $diff / (60 * 60 * 24);
        $cnt = floor($diffDay / 180);
        $D_no = F_NO($diffDay % 180 % 9 + 1);
        $XD = $date_change[$date_k + 1];
        $date = new DateTime($XD); $date->sub(new DateInterval('P30D')); $PD = $date->format('Y-m-d');
        $date = new DateTime($dateno); $date->sub(new DateInterval('P30D')); $ND = $date->format('Y-m-d');
        $TD = $temp_d; $XM = explode("-", $XD);
        if ($TD < $ND) {
            $D_no = ($XM[1] == '06') ? 7 + $D_no + 2 : 5 - $D_no + 5;
        } elseif ($TD >= $PD && $TD < $XD) {
            if ($XM[1] == '12') { $D_no = 5 - $D_no + 5; }
        } else {
            if ((int)$base[1] - 1 == 6) {
                if ($cnt % 2 == 0) { $D_no = 5 - $D_no + 5; }
            } else {
                if ($cnt % 2 == 1) { $D_no = 5 - $D_no + 5; }
            }
        }
    }
    return array(F_NO($D_no), false);
}