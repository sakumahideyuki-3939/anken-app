<?php
/**
 * day.php (統合表示版)
 */
require_once __DIR__ . '/calc_anken.php';

$by = isset($_GET['by']) ? (int)$_GET['by'] : 1967;
$bm = isset($_GET['bm']) ? (int)$_GET['bm'] : 10;
$bd = isset($_GET['bd']) ? (int)$_GET['bd'] : 13;
$today = new DateTime();
$ty = isset($_GET['ty']) ? (int)$_GET['ty'] : (int)$today->format('Y');
$tm = isset($_GET['tm']) ? (int)$_GET['tm'] : (int)$today->format('m');
$td = isset($_GET['td']) ? (int)$_GET['td'] : (int)$today->format('d');

$result = calc_anken_main($by, $bm, $bd, $ty, $tm, $td);
$target_obj = new DateTime("$ty-$tm-$td");
$prev = clone $target_obj; $prev->modify('-1 day');
$next = clone $target_obj; $next->modify('+1 day');

if (!function_exists('h')) { function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); } }
if (!function_exists('build_url')) { function build_url($q) { return 'day.php?' . http_build_query($q); } }

if (!function_exists('render_card')) {
    function render_card($board, $title, $labels) {
        echo '<div class="board-card">';
        echo '<div class="board-title">'.h($title).'</div>';
        echo '<table class="kyusei-table">';
        echo '<tr><td>'.h($board[0]).'</td><td>'.h($board[1]).'</td><td>'.h($board[2]).'</td></tr>';
        echo '<tr><td>'.h($board[3]).'</td><td class="center-cell">'.h($board[4]).'</td><td>'.h($board[5]).'</td></tr>';
        echo '<tr><td>'.h($board[6]).'</td><td>'.h($board[7]).'</td><td>'.h($board[8]).'</td></tr>';
        echo '</table>';
        if (!empty($labels)) {
            echo '<div class="judge-info">';
            foreach ($labels as $class => $text) {
                echo '<span class="'.h($class).'">'.h($text).'</span>';
            }
            echo '</div>';
        }
        echo '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>暗剣アプリ - 統合版</title>
    <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body>
<div class="container">
    <div class="block-1">
        <form action="day.php" method="GET">
            <div class="input-row">
                <strong>生年月日:</strong>
                <input type="number" name="by" value="<?=$by?>">.<input type="number" name="bm" value="<?=$bm?>">.<input type="number" name="bd" value="<?=$bd?>">
                &nbsp;&nbsp;
                <strong>指定日:</strong>
                <input type="number" name="ty" value="<?=$ty?>">.<input type="number" name="tm" value="<?=$tm?>">.<input type="number" name="td" value="<?=$td?>">
                <button type="submit" class="btn-submit">表示</button>
            </div>
            <div class="input-row">
                <a href="<?=build_url(['by'=>$by,'bm'=>$bm,'bd'=>$bd,'ty'=>$prev->format('Y'),'tm'=>$prev->format('m'),'td'=>$prev->format('d')])?>" class="btn-nav">◀ 前日</a>
                <a href="<?=build_url(['by'=>$by,'bm'=>$bm,'bd'=>$bd,'ty'=>$today->format('Y'),'tm'=>$today->format('m'),'td'=>$today->format('d')])?>" class="btn-nav">今日</a>
                <a href="<?=build_url(['by'=>$by,'bm'=>$bm,'bd'=>$bd,'ty'=>$next->format('Y'),'tm'=>$next->format('m'),'td'=>$next->format('d')])?>" class="btn-nav">翌日 ▶</a>
            </div>
            <div class="status-monitor">
                生年月日 星： <b>年[<?=h($result['birth']['stars']['y'])?>] / 月[<?=h($result['birth']['stars']['m'])?>] / 日[<?=h($result['birth']['stars']['d'])?>]</b>
                <span style="margin:0 15px; opacity:0.3;">|</span>
                指定日 星： <b>年[<?=h($result['target']['stars']['y'])?>] / 月[<?=h($result['target']['stars']['m'])?>] / 日[<?=h($result['target']['stars']['d'])?>]</b>
                <span style="margin:0 15px; opacity:0.3;">|</span>
                <b>本命: <?=h($result['honmei'])?> / 命宮: <?=h($result['meigu'])?></b>
            </div>
        </form>
    </div>

    <div class="board-grid">
        <?php render_card($result['birth']['boards']['y'], "2ブロック: 年盤", []); ?>
        <?php render_card($result['birth']['boards']['m'], "3ブロック: 月盤", []); ?>
        <?php render_card($result['birth']['boards']['d'], "4ブロック: 日盤", []); ?>
    </div>

    <div class="board-grid">
        <?php 
          $jy = $result['target']['judges']['y']; $jm = $result['target']['judges']['m']; $jd = $result['target']['judges']['d'];
          
          render_card($result['target']['boards']['y'], "5ブロック: 指定年盤", [
              "lucky" => "幸運生就月", 
              ("gohou" . ($jy['gohou'] ? " hit" : "")) => "五黄殺", 
              ("anken" . ($jy['anken'] ? " hit" : "")) => "暗剣殺"
          ]); 
          render_card($result['target']['boards']['m'], "6ブロック: 指定月盤", [
              "lucky" => "幸運生就月", 
              ("gohou" . ($jm['gohou'] ? " hit" : "")) => "五黄殺", 
              ("anken" . ($jm['anken'] ? " hit" : "")) => "暗剣殺", 
              ("double" . ($jm['double'] ? " hit" : "")) => "ダブル暗剣殺"
          ]); 
          render_card($result['target']['boards']['d'], "7ブロック: 指定日盤", [
              "lucky" => "幸運多忙日", 
              ("gohou" . ($jd['gohou'] ? " hit" : "")) => "五黄殺", 
              ("anken" . ($jd['anken'] ? " hit" : "")) => "暗剣殺", 
              ("double" . ($jd['double'] ? " hit" : "")) => "ダブル暗剣殺"
          ]); 
        ?>
    </div>
</div>
</body>
</html>