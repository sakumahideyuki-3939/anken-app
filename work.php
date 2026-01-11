<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>WORK | UNIQUE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        .grid-row { display: flex; flex-wrap: wrap; width: 1920px; }

        /* HERO: 1920x960 */
        .w-hero { width: 1920px; height: 960px; background: #fcfcfc; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; }
        .w-hero h1 { font-size: 54px; letter-spacing: 0.4em; font-weight: 200; margin-bottom: 20px; }
        .w-hero p { font-size: 14px; letter-spacing: 0.2em; color: #999; }

        /* WORK UNIT: 480x480 */
        .w-unit { 
            width: 480px; height: 480px; padding: 60px; 
            display: flex; flex-direction: column; justify-content: center; 
            border: 1px solid #f0f0f0; transition: 0.4s;
        }
        .w-unit:hover { background-color: #fafafa; }
        
        .w-category { font-size: 10px; letter-spacing: 0.2em; color: #bbb; margin-bottom: 20px; font-family: sans-serif; }
        .w-title { font-size: 18px; letter-spacing: 0.15em; margin-bottom: 25px; line-height: 1.4; font-weight: bold; }
        .w-desc { font-size: 13px; line-height: 2.2; color: #777; text-align: justify; }

        .addr-tag { font-family: sans-serif; font-size: 9px; color: #eee; margin-bottom: 15px; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="w-hero">
        <h1>SELECTED WORKS</h1>
        <p>実績紹介：私たちのクリエイション</p>
    </section>

    <section class="grid-row">
        <?php
        $works = [
            ["cat" => "BRANDING", "title" => "IBCA 美容創造協会", "text" => "美容業界の新たなスタンダードを構築。ロゴデザインからブログ運用フェーズまで、一貫したブランドアイデンティティを提供しています。"],
            ["cat" => "WEB DESIGN", "title" => "吉報旅 公式サイト", "text" => "「旅と運気」をテーマにしたHP構築プロジェクト。論語の精神をデザインに落とし込み、独自のユーザー体験を設計。"],
            ["cat" => "APP DEVELOPMENT", "title" => "Fortune App Project", "text" => "占いとテクノロジーを融合させた次世代アプリの開発。直感的なインターフェースと緻密なロジックを両立させています。"],
            ["cat" => "PACKAGE DESIGN", "title" => "Stemcell Cosmetic", "text" => "幹細胞コスメのパッケージデザイン。高級感と科学的根拠を感じさせるミニマルな造形美を追求しました。"],
            ["cat" => "GRAPHIC", "title" => "Corporate Brochure", "text" => "企業のビジョンを視覚化するパンフレット制作。紙の質感からタイポグラフィまで、細部にこだわり抜いた一冊。"],
            ["cat" => "SPACE DESIGN", "title" => "Creative Workspace", "text" => "「動的な静寂」を実現するオフィス空間のプロデュース。480pxグリッドの思考を物理空間に拡張。"],
            ["cat" => "CONSULTING", "title" => "AI Support System", "text" => "AIを思考パートナーとして活用するビジネスモデルの提案。効率化とクリエイティビティの最大化を支援。"],
            ["cat" => "CREATIVE", "title" => "Unique Lifestyle", "text" => "モノ・コト・場所を横断的にデザインする包括的なクリエイティブワーク。新しいライフスタイルの提案。"]
        ];

        foreach($works as $index => $work): 
            $col = chr(65 + ($index % 4)); // A, B, C, D
            $row = ($index < 4) ? 3 : 4;   // 3行目 or 4行目
        ?>
            <div class="w-unit">
                <div class="addr-tag">ADDRESS: <?php echo $col . $row; ?></div>
                <div class="w-category"><?php echo $work['cat']; ?></div>
                <div class="w-title"><?php echo $work['title']; ?></div>
                <p class="w-desc"><?php echo $work['text']; ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <?php include('components/footer.php'); ?>
</div>

</body>
</html>