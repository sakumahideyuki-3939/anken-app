<?php
/**
 * calc_anken.php (五黄・暗剣・ダブル暗剣 統合ハブ版)
 */
require_once __DIR__ . '/logic_core.php';

// 判定ファイルを一括自動読み込み
foreach (['judge_gohou.php', 'judge_anken.php', 'judge_double.php'] as $file) {
    if (file_exists(__DIR__ . '/' . $file)) { include_once __DIR__ . '/' . $file; }
}

function get_houi_name($pos_index) {
    $names = [0=>'巽', 1=>'離', 2=>'坤', 3=>'震', 4=>'中宮', 5=>'兌', 6=>'艮', 7=>'坎', 8=>'乾'];
    return $names[$pos_index] ?? '不明';
}

function get_universal_board($center) {
    $patterns = [
        1=>[9,5,7,8,1,3,4,6,2], 2=>[1,6,8,9,2,4,5,7,3], 3=>[2,7,9,1,3,5,6,8,4],
        4=>[3,8,1,2,4,6,7,9,5], 5=>[4,9,2,3,5,7,8,1,6], 6=>[5,1,3,4,6,8,9,2,7],
        7=>[6,2,4,5,7,9,1,3,8], 8=>[7,3,5,6,8,1,2,4,9], 9=>[8,4,6,7,9,2,3,5,1]
    ];
    return $patterns[(int)$center] ?? array_fill(0, 9, '');
}

function calc_anken_main($by, $bm, $bd, $ty, $tm, $td) {
    global $SDAY_array, $date_change;

    // --- 生年月日算出 ---
    $b_Y = YEAR_no_base($by, $bm); 
    $b_M = MONTH_no_base($by, $bm);
    if (isset($SDAY_array[$by][$bm-1]) && $bd < $SDAY_array[$by][$bm-1]) {
        $b_M = F_NO($b_M + 1); if ($bm == 2) $b_Y = F_NO($b_Y + 1);
    }
    list($b_D, $err_b) = DATE_no_base($by, $bm, $bd, $date_change);
    $m_board = get_universal_board($b_M);
    $meigu_pos = array_search($b_Y, $m_board); 
    $meigu_name = get_houi_name($meigu_pos);

    // --- 指定日算出 ---
    $t_Y = YEAR_no_base($ty, $tm); 
    $t_M = MONTH_no_base($ty, $tm);
    if (isset($SDAY_array[$ty][$tm-1]) && $td < $SDAY_array[$ty][$tm-1]) {
        $t_M = F_NO($t_M + 1); if ($tm == 2) $t_Y = F_NO($t_Y + 1);
    }
    list($t_D, $err_t) = DATE_no_base($ty, $tm, $td, $date_change);

    $boards = [
        'y' => get_universal_board($t_Y),
        'm' => get_universal_board($t_M),
        'd' => get_universal_board($t_D)
    ];

    // 親子判定用の中宮スターを保持
    $centers = ['y'=>$t_Y, 'm'=>$t_M, 'd'=>$t_D];

    // --- 基本判定の実行 ---
    $judges = [];
    foreach (['y', 'm', 'd'] as $k) {
        $judges[$k] = [
            'gohou' => function_exists('is_gohou_hit') ? is_gohou_hit($meigu_name, $boards[$k]) : false,
            'anken' => function_exists('is_anken_hit') ? is_anken_hit($b_Y, $meigu_name, $boards[$k]) : false,
            'double' => false // 初期化
        ];
    }

    // --- ダブル暗剣殺の階層判定 (月と日のみ) ---
    if (function_exists('is_double_hit')) {
        // 月盤のダブル：年(親)と月(子)を比較
        $judges['m']['double'] = is_double_hit($b_Y, $centers['y'], $centers['m']);
        // 日盤のダブル：月(親)と日(子)を比較
        $judges['d']['double'] = is_double_hit($b_Y, $centers['m'], $centers['d']);
    }

    return [
        'honmei' => $b_Y, 'meigu' => $meigu_name,
        'birth' => [
            'stars' => ['y'=>$b_Y, 'm'=>$b_M, 'd'=>$b_D],
            'boards' => ['y'=>get_universal_board($b_Y), 'm'=>get_universal_board($b_M), 'd'=>get_universal_board($b_D)]
        ],
        'target' => ['stars' => ['y'=>$t_Y, 'm'=>$t_M, 'd'=>$t_D], 'boards' => $boards, 'judges' => $judges]
    ];
}