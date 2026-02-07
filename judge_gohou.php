<?php
/**
 * judge_gohou.php (五黄殺専用判定ユニット)
 */

if (!function_exists('is_gohou_hit')) {
    /**
     * 指定された方位に「5」があるかどうかを判定する
     */
    function is_gohou_hit($meigu_name, $board) {
        // 方位と配列インデックスの対応表
        $houi_map = [
            '巽' => 0, '離' => 1, '坤' => 2,
            '震' => 3, '中宮' => 4, '兌' => 5,
            '艮' => 6, '坎' => 7, '乾' => 8
        ];

        $idx = $houi_map[$meigu_name] ?? null;

        // 指定方位に「5」が入っていれば true (五黄殺)
        if ($idx !== null && isset($board[$idx]) && (int)$board[$idx] === 5) {
            return true;
        }
        return false;
    }
}