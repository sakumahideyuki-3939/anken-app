<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORK | ALGO Inc. 制作実績</title>
    <link rel="stylesheet" href="./assets/css/main.css?v=20260114_master">
</head>
<body class="page-work">
<div class="algo-site">

    <?php include('components/header.php'); ?>

    <main class="page-main">

        <section class="a-hero-compact">
            <div class="addr-tag">ADDRESS: A1 - D2</div>
            <h1>WORK</h1>
            <p style="margin-top:15px; color:#888; font-size:12px; letter-spacing:0.2em;">ALGO Inc. が手がけている事業・プロジェクト</p>
        </section>

        <section class="grid-row">
            <?php
            // 提供いただいた文字情報に基づいたワークリスト
            $works = [
                ["cat"=>"COSME",     "title"=>"ALGO-COSME",      "text"=>"美容皮膚科向けECの設計と運用。"],
                ["cat"=>"CELLS",     "title"=>"幹細胞 生搾り",    "text"=>"ドクター向け再生医療プロダクトの設計。"],
                ["cat"=>"EDUCATION", "title"=>"IBCA 検定/講座",   "text"=>"美肌・メイクの検定＆教育プログラム。"],
                ["cat"=>"AI SUPPORT", "title"=>"クリニックAI導入",  "text"=>"現場の運用に落ちる形へAIを導入。"],
                ["cat"=>"FORTUNE",   "title"=>"五行診断アート",    "text"=>"生年月日からの五行バランスを可視化。"],
                ["cat"=>"GOLF",      "title"=>"ALGO-GOLF",       "text"=>"思考とデータで組み立てるゴルフ講座。"],
                ["cat"=>"FOOD",      "title"=>"おせち・冷凍食品",  "text"=>"ブランドを支える食品OEMパートナー。"],
                ["cat"=>"CREATIVE",  "title"=>"制作スタジオ",     "text"=>"LP・教育コンテンツの統合デザイン。"],
            ];

            foreach ($works as $i => $work) {
                // A5スタート、4列ごとに段落を計算
                $col = chr(65 + ($i % 4));
                $row = 3 + intdiv($i, 4); // HEROが1-2段目なので3段目から開始
                $addr = $col . $row;
                
                // 背景色を交互に変えて「あの時のデザイン」の空気感を出す
                $bg_class = (($i + intdiv($i, 4)) % 2 == 0) ? "bg-white" : "bg-light";
            ?>
                <article class="u-unit <?php echo $bg_class; ?>">
                    <div class="addr-tag">ADDRESS: <?php echo $addr; ?></div>
                    <div style="font-size: 11px; color: #888; letter-spacing: 0.2em; margin-bottom: 10px;">
                        <?php echo htmlspecialchars($work["cat"]); ?>
                    </div>
                    <h2 style="font-size: 18px; margin-bottom: 20px;">
                        <?php echo htmlspecialchars($work["title"]); ?>
                    </h2>
                    <p class="content-text" style="font-size: 12px; line-height: 2;">
                        <?php echo htmlspecialchars($work["text"]); ?>
                    </p>
                </article>
            <?php } ?>
        </section>

    </main>

    <?php include('components/footer.php'); ?>

</div>
</body>
</html>