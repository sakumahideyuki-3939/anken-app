<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>ABOUT | UNIQUE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        .grid-row { display: flex; flex-wrap: wrap; width: 1920px; }

        /* 番地表示タグ */
        .addr-tag { font-family: sans-serif; font-size: 10px; color: #ccc; letter-spacing: 0.1em; margin-bottom: 25px; }

        /* HERO: 1920x960 */
        .a-hero { width: 1920px; height: 960px; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; background: #fcfcfc; }
        .a-hero h1 { font-size: 64px; letter-spacing: 0.6em; font-weight: 200; line-height: 1.2; }
        .a-hero p { font-size: 14px; letter-spacing: 0.4em; color: #999; margin-top: 40px; }

        /* PHILOSOPHY: 960x1920 (A-B列) */
        .a-philosophy { width: 960px; height: 1920px; padding: 160px; display: flex; flex-direction: column; justify-content: flex-start; border-right: 1px solid #f0f0f0; }
        .a-philosophy h2 { font-size: 32px; line-height: 1.8; margin-bottom: 80px; font-weight: 400; }
        .a-content { font-size: 16px; line-height: 2.8; color: #555; text-align: justify; }

        /* RIGHT BLOCKS: 960x960 (C-D列) */
        .a-side-block { width: 960px; height: 960px; padding: 120px; display: flex; flex-direction: column; justify-content: center; }
        .a-image-area { background: #f5f5f5; display: flex; align-items: center; justify-content: center; color: #ddd; font-size: 12px; letter-spacing: 0.2em; }
        .a-text-area { background: #fff; border-bottom: 1px solid #f0f0f0; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="a-hero">
        <div class="addr-tag">ADDRESS: A1 - D2</div>
        <h1>UNIQUE LOGIC</h1>
        <p>「唯一無二」という、論理の答え。</p>
    </section>

    <section class="grid-row">
        <article class="a-philosophy">
            <div class="addr-tag">ADDRESS: A3 - B6</div>
            <h2>デザインとは、<br>問いを立て、答えを<br>空間に刻むこと。</h2>
            <div class="a-content">
                <p>私たちは、単に美しいものを作る集団ではありません。クライアントが抱える複雑な課題を解きほぐし、480pxという論理的な最小単位（グリッド）から、広大なデジタル・物理空間へと再構築する。そのプロセスそのものをデザインと呼んでいます。</p>
                <br>
                <p>IBCAでの美容教育の革新、吉報旅での古典と現代の融合。私たちが手がけるプロジェクトは多岐にわたりますが、根底にある哲学は常に一つです。それは「情報の純度を高め、受け手の心に届く一瞬を設計する」こと。2026年、AIが私たちの思考パートナーとなった今、人間にしかできない「意味の付与」がより重要になっています。</p>
                <br>
                <p>余白は、何もない場所ではありません。それは、次に生まれる思考のための「呼吸」であり、デザインにおいて最も重要な要素です。UNIQUEが提供するのは、その息を呑むような静寂と、そこから溢れ出す圧倒的なブランド体験です。</p>
            </div>
        </article>

        <div style="width: 960px;">
            <div class="a-side-block a-image-area">
                <div class="addr-tag" style="position:absolute; margin-top:-380px; margin-left:-360px;">ADDRESS: C3 - D4</div>
                SYMBOLIC IMAGE (960x960)
            </div>
            <div class="a-side-block a-text-area">
                <div class="addr-tag">ADDRESS: C5 - D6</div>
                <h3 style="font-size:20px; margin-bottom:40px; letter-spacing:0.2em;">VALUES</h3>
                <p style="font-size:14px; line-height:2.4; color:#777;">
                    1. Logical Harmony: 数理的な美しさの追求<br>
                    2. Creative Silence: 沈黙の中に宿る強さ<br>
                    3. AI-Human Symbiosis: AIと人間の共創<br>
                    4. Infinite Expansion: 480pxから無限への拡張
                </p>
            </div>
        </div>
    </section>

    <?php include('components/footer.php'); ?>
</div>

</body>
</html>