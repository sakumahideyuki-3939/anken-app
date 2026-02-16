<?php
/**
 * judge_anken.php (暗剣殺判定：本命星・命宮 統合決め打ち版)
 * 【役割】本命星(数字)または命宮(方位)と、中宮のペアが一致するかを判定。
 */
if (!function_exists('is_anken_hit')) {
    function is_anken_hit($honmei_star, $meigu_name, $board) {
        $center_star = (int)$board[4]; // 現在の盤の中心

        // --- ルールA：本命星に基づく暗剣殺（既設） ---
        $anken_map_honmei = [
            1 => 3, 2 => 8, 3 => 4, 4 => 9, 5 => 0, 
            6 => 1, 7 => 6, 8 => 2, 9 => 7
        ];
        if (isset($anken_map_honmei[$honmei_star]) && $anken_map_honmei[$honmei_star] === $center_star) {
            return true;
        }

        // --- ルールB：命宮（方位）に基づく暗剣殺（新設） ---
        $anken_map_meigu = [
            '巽' => 4, '離' => 9, '坤' => 2, '震' => 3, 
            '中宮' => 5, '兌' => 7, '艮' => 8, '坎' => 1, '乾' => 6
        ];
        if (isset($anken_map_meigu[$meigu_name]) && $anken_map_meigu[$meigu_name] === $center_star) {
            return true;
        }

        return false;
    }
}