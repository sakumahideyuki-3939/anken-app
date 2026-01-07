<?php
/**
 * day.php
 * 暗剣殺占いアプリ 表示UI層【4ブロック・レイアウト版】
 *
 * 特徴:
 * - 画像のデザインに合わせてレイアウトを一新
 * - 「個人の年盤」＋「指定日の年・月・日盤」の全表示
 * - 判定結果（暗剣殺など）を盤の下にテキスト表示
 */

require_once __DIR__ . '/calc_anken.php';

// 安全弁
if (!function_exists('calc_anken_main')) {
    exit('Error: calc_anken.php not found.');
}

// --------------------------------------------------
// 0. ヘルパー関数
// --------------------------------------------------
function h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function build_url($q) { return 'day.php?' . http_build_query($q); }
function v($board, $id) { return isset($board[$id]) ? (string)$board[$id] : '—'; }

// ハイライトクラス連結
function add_hl(array &$arr, $key, string $cls) {
    if ($key === null || $key === '') return;
    $k = (int)$key;
    if ($k < 1 || $k > 9) return;
    $cur = isset($arr[$k]) ? trim((string)$arr[$k]) : '';
    if ($cur === '') { $arr[$k] = $cls; }
    elseif (strpos(" $cur ", " $cls ") === false) { $arr[$k] = $cur . ' ' . $cls; }
}

// --------------------------------------------------
// 1. 入力取得
// --------------------------------------------------
$by = isset($_GET['by']) ? max(1900, min(2100, (int)$_GET['by'])) : 1990;
$bm = isset($_GET['bm']) ? max(1, min(12, (int)$_GET['bm'])) : 1;
$bd = isset($_GET['bd']) ? max(1, min(31, (int)$_GET['bd'])) : 1;

$today = new DateTime();
$ty = isset($_GET['ty']) ? max(1900, min(2100, (int)$_GET['ty'])) : (int)$today->format('Y');
$tm = isset($_GET['tm']) ? max(1, min(12, (int)$_GET['tm'])) : (int)$today->format('m');
$td = isset($_GET['td']) ? max(1, min(31, (int)$_GET['td'])) : (int)$today->format('d');

// --------------------------------------------------
// 2. 計算実行
// --------------------------------------------------
$has_error = false;
$error_msg = '';
$result = null;

if (!checkdate($bm, $bd, $by) || !checkdate($tm, $td, $ty)) {
    $has_error = true;
    $error_msg = '日付が不正です。';
} else {
    $result = calc_anken_main($by, $bm, $bd, $ty, $tm, $td);
    if (isset($result['error'])) {
        $has_error = true;
        $error_msg = $result['error'];
    }
}

// --------------------------------------------------
// 3. データ準備（ハイライト・盤データ）
// --------------------------------------------------
// 個人の年盤（本命星から生成）
$personal_board = [];
if (!$has_error && isset($result['honmei'])) {
    // calc_anken.php内の関数を利用して盤を取得
    $personal_board = get_fixed_board_by_palace($result['honmei']);
}

// ターゲット盤（年・月・日）
$year_board  = $result['year_board'] ?? [];
$month_board = $result['month_board'] ?? [];
$day_board   = $result['day_board'] ?? [];

// ハイライト配列（月盤・日盤用）
$hl_month = [];
$hl_day = [];

if (!$has_error && isset($result['judges'])) {
    // 月盤ハイライト
    $jm = $result['judges']['month'];
    if (!empty($jm['anken']['ok'])) add_hl($hl_month, $jm['anken']['anken_palace'], 'cell-anken');
    if (!empty($jm['gogyo']['ok'])) add_hl($hl_month, $jm['gogyo']['meigu'], 'cell-gogyo');
    if (!empty($jm['double']['ok'])) {
        add_hl($hl_month, $jm['double']['main']['M'], 'cell-double');
        add_hl($hl_month, $jm['double']['check']['N'], 'cell-double');
    }

    // 日盤ハイライト
    $jd = $result['judges']['day'];
    if (!empty($jd['anken']['ok'])) add_hl($hl_day, $jd['anken']['anken_palace'], 'cell-anken');
    if (!empty($jd['gogyo']['ok'])) add_hl($hl_day, $jd['gogyo']['meigu'], 'cell-gogyo');
    if (!empty($jd['double']['ok'])) {
        add_hl($hl_day, $jd['double']['main']['M'], 'cell-double');
        add_hl($hl_day, $jd['double']['check']['N'], 'cell-double');
    }
}

// ナビゲーション
$target_obj = new DateTime("$ty-$tm-$td");
$prev = clone $target_obj; $prev->modify('-1 day');
$next = clone $target_obj; $next->modify('+1 day');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>九星気学盤面チェック</title>
<style>
    :root {
        --bg-color: #fcfcfc;
        --text-color: #333;
        --border-color: #ddd;
        --accent-blue: #007bff;
        --board-bg: #fffbf0; /* 盤面の背景（薄い黄色系） */
        --hl-anken: #ffebee; --line-anken: #d32f2f;
        --hl-gogyo: #fffde7; --line-gogyo: #fbc02d;
        --hl-double: #f3e5f5; --line-double: #7b1fa2;
    }
    body { font-family: "Helvetica Neue", Arial, sans-serif; background: var(--bg-color); color: var(--text-color); margin: 0; padding: 20px; line-height: 1.5; }
    
    /* レイアウト */
    .container { max-width: 1000px; margin: 0 auto; }
    
    /* 上段（個人盤＋情報） */
    .top-section { display: flex; flex-wrap: wrap; gap: 30px; margin-bottom: 40px; }
    .top-left { flex: 0 0 240px; } /* 個人盤 */
    .top-right { flex: 1; min-width: 300px; display: flex; flex-direction: column; justify-content: center; }

    /* 下段（暦の盤3つ） */
    .bottom-section { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    
    /* 盤面共通スタイル */
    .board-box { background: #fff; padding: 10px; }
    .board-title { font-size: 1.2rem; font-weight: bold; margin-bottom: 10px; border-left: 4px solid #333; padding-left: 10px; }
    
    .grid-table { width: 100%; max-width: 220px; border-collapse: collapse; margin: 0 auto; }
    .grid-table td {
        width: 33.3%; aspect-ratio: 1;
        border: 1px solid #eee;
        text-align: center; vertical-align: middle;
        font-size: 1.8rem; font-weight: bold;
        position: relative;
        color: #555;
    }
    /* 中宮の色 */
    .grid-table tr:nth-child(2) td:nth-child(2) { background-color: var(--board-bg); }

    /* ハイライト */
    .cell-anken { background: var(--hl-anken) !important; color: #b71c1c !important; border: 3px solid var(--line-anken) !important; }
    .cell-gogyo { background: var(--hl-gogyo) !important; color: #f57f17 !important; border: 3px double var(--line-gogyo) !important; }
    .cell-double { background: var(--hl-double) !important; color: #4a148c !important; border: 3px dashed var(--line-double) !important; }

    /* 優先度解決 */
    .cell-anken.cell-gogyo, .cell-anken.cell-double { border: 4px solid var(--line-anken) !important; }

    /* 情報エリア */
    .info-card { background: #fff; border: 1px solid #eee; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
    .info-row { margin-bottom: 10px; font-size: 0.95rem; }
    .info-row strong { margin-right: 10px; color: #000; }
    
    /* 判定テキスト */
    .judge-text { font-size: 0.75rem; margin-top: 8px; color: #d32f2f; line-height: 1.4; min-height: 3em; }
    .judge-safe { color: #888; }

    /* 入力フォーム */
    .input-area { margin-bottom: 15px; }
    input[type=number] { width: 60px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; }
    button { background: #333; color: #fff; border: none; padding: 6px 15px; border-radius: 4px; cursor: pointer; }
    
    .nav-links { margin-top: 10px; display: flex; gap: 10px; align-items: center; }
    .nav-links a { text-decoration: none; color: #007bff; font-weight: bold; border: 1px solid #ddd; padding: 4px 10px; border-radius: 4px; font-size: 0.9rem; }

    /* スマホ対応 */
    @media (max-width: 768px) {
        .top-section { flex-direction: column; align-items: center; }
        .bottom-section { grid-template-columns: 1fr; max-width: 320px; margin: 0 auto; }
        .top-right { width: 100%; }
        .grid-table { max-width: 100%; }
    }
</style>
</head>
<body>

<div class="container">

    <?php if ($has_error): ?>
        <p style="color:red; font-weight:bold; text-align:center;">エラー: <?php echo h($error_msg); ?></p>
    <?php else: ?>

    <div class="top-section">
        <div class="top-left">
            <div class="board-box">
                <div class="board-title">生年月日</div>
                <?php render_board_simple($personal_board); ?>
                <div style="text-align:center; font-size:0.8rem; margin-top:5px; color:#666;">
                    本命: <?php echo h($result['honmei']); ?> (命宮:<?php echo h($result['meigu']); ?>)
                </div>
            </div>
        </div>

        <div class="top-right">
            <div class="info-card">
                <form action="day.php" method="GET" class="input-area">
                    <div style="margin-bottom:10px;">
                        <strong>生年月日:</strong>
                        <input type="number" name="by" value="<?php echo h($by); ?>">.
                        <input type="number" name="bm" value="<?php echo h($bm); ?>">.
                        <input type="number" name="bd" value="<?php echo h($bd); ?>">
                    </div>
                    <div>
                        strong>指定日.: 指定st
                        <input type="number" name="ty" value="<?php echo h($ty); ?>">.
                        <input type="number" name="tm" value="<?php echo h($tm); ?>">.
                        <input type="number" name="td" value="<?php echo h($td); ?>">
                        <button type="submit">表示</button>
                    </div>
                </form>
                
                <div class="info-row">
                    <strong>生年月日:</strong> <?php echo "$by-$bm-$bd"; ?>
                </div>
                <div class="info-row">
                    <strong>指定日:</strong> <span style="font-size:1.2rem; font-weight:bold;"><?php echo "$ty-$tm-$td"; ?></span>
                </div>
                <div class="info-row">
                    <strong>星:</strong> 年[<?php echo h($result['year_star']); ?>] / 月[<?php echo h($result['month_star']); ?>] / 日[<?php echo h($result['day_star']); ?>]
                </div>

                <div class="nav-links">
                    <a href="<?php echo build_url(['by'=>$by,'bm'=>$bm,'bd'=>$bd,'ty'=>$prev->format('Y'),'tm'=>$prev->format('m'),'td'=>$prev->format('d')]); ?>">◀ 前日</a>
                    <a href="<?php echo build_url(['by'=>$by,'bm'=>$bm,'bd'=>$bd,'ty'=>$today->format('Y'),'tm'=>$today->format('m'),'td'=>$today->format('d')]); ?>">今日</a>
                    <a href="<?php echo build_url(['by'=>$by,'bm'=>$bm,'bd'=>$bd,'ty'=>$next->format('Y'),'tm'=>$next->format('m'),'td'=>$next->format('d')]); ?>">翌日 ▶</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-section">
        <div class="board-box">
            <div class="board-title">年盤</div>
            <?php render_board_simple($year_board, []); ?>
            <div class="judge-text judge-safe">
                年盤は判定対象外<br>(表示のみ)
            </div>
        </div>

        <div class="board-box">
            <div class="board-title">月盤</div>
            <?php render_board_simple($month_board, $hl_month); ?>
            <div class="judge-text">
                <?php echo render_judge_text($result['judges']['month']); ?>
            </div>
        </div>

        <div class="board-box">
            <div class="board-title">日盤</div>
            <?php render_board_simple($day_board, $hl_day); ?>
            <div class="judge-text">
                <?php echo render_judge_text($result['judges']['day']); ?>
            </div>
        </div>
    </div>

    <?php endif; ?>

</div>

</body>
</html>

<?php
/**
 * 盤面描画用関数 (HTML出力)
 */
function render_board_simple($board, $highlights = []) {
    // 固定配置: 4-9-2 / 3-5-7 / 8-1-6
    $layout = [
        [4, 9, 2],
        [3, 5, 7],
        [8, 1, 6]
    ];
    
    echo '<table class="grid-table">';
    foreach ($layout as $row) {
        echo '<tr>';
        foreach ($row as $id) {
            $cls = isset($highlights[$id]) ? $highlights[$id] : '';
            $val = isset($board[$id]) ? $board[$id] : '';
            echo '<td class="' . $cls . '">' . h($val) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

/**
 * 判定テキスト生成関数
 */
function render_judge_text($judge_data) {
    $parts = [];
    
    if (!empty($judge_data['anken']['ok'])) $parts[] = "暗剣殺: 該当";
    if (!empty($judge_data['gogyo']['ok'])) $parts[] = "五黄殺: 該当";
    if (!empty($judge_data['double']['ok'])) $parts[] = "ダブル暗剣: 該当";
    
    if (empty($parts)) {
        return '<span class="judge-safe">暗剣殺: なし<br>五黄殺: なし<br>ダブル: なし</span>';
    } else {
        return implode('<br>', $parts);
    }
}
?>render_judge_text(['anken'=>['ok'=>true]]);
