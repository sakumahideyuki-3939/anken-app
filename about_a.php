<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>ABOUT | ALGO Inc.</title>
    <style>
        /* ベーススタイル */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        
        /* 1920x480 COMPACT HERO */
        .a-hero-compact { 
            width: 1920px; 
            height: 480px; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            text-align: center; 
            background: #fcfcfc; 
            border-bottom: 1px solid #f0f0f0;
        }
        .a-hero-compact h1 { font-size: 64px; letter-spacing: 0.6em; font-weight: 200; line-height: 1.2; text-transform: uppercase; }
        .a-hero-compact p { font-size: 14px; letter-spacing: 0.4em; color: #999; margin-top: 30px; }

        /* コンテンツエリア */
        .container-center { width: 1200px; margin: 0 auto; padding: 120px 0; text-align: center; }
        
        /* セクション：ALGOとは */
        .section-lead { font-size: 32px; line-height: 2; margin-bottom: 60px; font-weight: 400; color: #444; }
        .section-text { font-size: 16px; line-height: 2.8; color: #555; margin-bottom: 80px; text-align: justify; }

        /* ビジュアル画像エリア（1200px x 675px） */
        .concept-visual { 
            width: 1200px; 
            height: 675px; 
            margin: 0 auto 120px; 
            overflow: hidden; 
            background: #f9f9f9; 
        }
        .concept-visual img { 
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
            display: block;
        }

        /* MISSION / VISION セクション */
        .mv-grid { display: flex; justify-content: space-between; margin-top: 100px; border-top: 1px solid #eee; padding-top: 80px; }
        .mv-item { width: 540px; text-align: left; }
        .mv-label { font-size: 12px; letter-spacing: 0.3em; color: #ccc; margin-bottom: 20px; display: block; }
        .mv-title { font-size: 24px; margin-bottom: 30px; letter-spacing: 0.1em; color: #333; }
        .mv-desc { font-size: 15px; line-height: 2.2; color: #666; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="a-hero-compact">
        <h1>ABOUT</h1>
        <p>ALGO Inc. について</p>
    </section>

    <div class="container-center">
        <h2 class="section-lead">「現場の問い」と「デザイン思考」でつなぐ</h2>
        <div class="section-text">
            <p>ALGO Inc. は、医療・美容・学び・ゴルフ・AI といった一見バラバラに見える領域を、「現場の問い」と「デザイン思考」でつなぐクリエイティブカンパニーです。すべての事業は、目の前の人の「本当はどうしたい？」「どう伝えればいい？」という問いから生まれています。</p>
        </div>

        <div class="concept-visual">
            <img src="/testtest/assets/images/concept-visual-about.png" alt="ALGO Concept Visual">
        </div>

        <div class="mv-grid">
            <div class="mv-item">
                <span class="mv-label">MISSION</span>
                <h3 class="mv-title">現場の「どうしたい？」に寄り添い、<br>選びやすさと学びやすさをデザインする。</h3>
                <p class="mv-desc">商材・教育・コンテンツ・デザイン・AI を組み合わせて、現場で働く人と、その先にいるお客様の「迷い」を減らし、自分で選び、自分で決めていける状態をつくることが、ALGOのミッションです。</p>
            </div>
            <div class="mv-item">
                <span class="mv-label">VISION</span>
                <h3 class="mv-title">一人ひとりが「選びやすく、学びやすく、伝えやすい」世界をひろげる。</h3>
                <p class="mv-desc">情報の複雑さや専門性の高さを、言葉とデザインでほどき、誰もが自分らしい選択ができる社会を構築していきます。ALGOは、その壁を一つひとつ丁寧に解消していきます。</p>
            </div>
        </div>
    </div>

    <?php include('components/footer.php'); ?>
</div>

</body>
</html>