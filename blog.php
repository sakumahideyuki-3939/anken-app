<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>BLOG | UNIQUE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        .grid-row { display: flex; flex-wrap: wrap; width: 1920px; }

        /* HEADER & HERO */
        .b-hero { width: 1920px; height: 960px; background: #fcfcfc; display: flex; flex-direction: column; align-items: center; justify-content: center; border-bottom: 1px solid #f0f0f0; }
        .b-hero h1 { font-size: 54px; letter-spacing: 0.5em; font-weight: 200; }

        /* BLOG UNIT: 480x480 正方形 */
        .b-unit { 
            width: 480px; height: 480px; padding: 60px; 
            display: flex; flex-direction: column; justify-content: space-between; 
            border-right: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0;
            transition: 0.4s;
        }
        .b-unit:nth-child(4n) { border-right: none; }
        .b-unit:hover { background-color: #fafafa; }

        .addr-tag { font-family: sans-serif; font-size: 9px; color: #ccc; letter-spacing: 0.1em; }
        .b-date { font-size: 11px; letter-spacing: 0.1em; color: #999; margin-top: 10px; }
        .b-title { font-size: 18px; line-height: 1.8; font-weight: bold; margin: 20px 0; }
        .b-btn { font-size: 11px; letter-spacing: 0.2em; border: 1px solid #ddd; padding: 10px; width: 120px; text-align: center; color: #333; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="b-hero">
        <div class="addr-tag">ADDRESS: A1 - D2</div>
        <h1>BLOG | UNIQUE</h1>
        <p style="margin-top:20px; color:#999; letter-spacing:0.3em;">CREATIVE INSIGHTS</p>
    </section>

    <section class="grid-row">
        <?php
        $blogs = [
            ["date" => "2026.01.10", "title" => "480pxグリッドが生み出す、デザインの動的な静寂"],
            ["date" => "2026.01.18", "title" => "IBCAプロジェクト：ブランド資産の構築とブログ運用"],
            ["date" => "2026.01.18", "title" => "論語のリライト：吉報旅に込めた設計思想の断片"],
            ["date" => "2026.01.10", "title" => "AIとの共創：クリエイティブの最前線から"],
            ["date" => "2026.01.13", "title" => "タイポグラフィの美学：余白と文字の黄金比"],
            ["date" => "2026.01.05", "title" => "空間をデザインする：480pxグリッドの物理的拡張"],
            ["date" => "2026.01.01", "title" => "新年特別企画：2026年度のプロジェクト展望"],
            ["date" => "2026.01.01", "title" => "UNIQUE思考：デザインが解決できること"]
        ];

        foreach($blogs as $index => $post): 
            $col = chr(65 + ($index % 4)); 
            $row = floor($index / 4) + 3;
        ?>
            <div class="b-unit">
                <div class="top-meta">
                    <div class="addr-tag">ADDRESS: <?php echo $col . $row; ?></div>
                    <div class="b-date"><?php echo $post['date']; ?></div>
                </div>
                <div class="b-title"><?php echo $post['title']; ?></div>
                <div class="b-btn">READ MORE</div>
            </div>
        <?php endforeach; ?>
    </section>

    <?php include('components/footer.php'); ?>
</div>

</body>
</html>