<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABOUT | ALGO Inc.</title>
    <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
    <style>
        .inner-pad-center { padding: 80px 60px; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; }
        .about-lead { font-size: 24px; line-height: 2.2; margin-bottom: 40px; letter-spacing: 0.1em; }
        .about-text { font-size: 13px; line-height: 2.4; text-align: left; max-width: 700px; color: #444; }
    </style>
</head>
<body class="page-about">
<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="grid-row" style="height: 480px;">
        <div class="u-4">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: A1 - D2 / CONCEPT</div>
                <h1 style="font-size: 32px; letter-spacing: 0.4em;">ABOUT ALGO</h1>
                <p style="margin-top:20px; color:#888; font-size:12px; letter-spacing:0.2em;">現場の問いを、デザインでつなぐ</p>
            </div>
        </div>
    </section>

    <section class="grid-row">
        <div class="u-double h-960 bg-light">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: A3 - B4 / MISSION</div>
                <h2 class="about-lead">現場の「どうしたい？」に寄り添い、<br>選びやすさと学びやすさをデザインする。</h2>
                [cite_start]<p class="about-text">商材・教育・コンテンツ・デザイン・AI。これらをバラバラに提供するのではなく、一つの目的のために組み合わせて提供すること。それがALGOの役割です。現場で働く人と、その先にいるお客様の「迷い」を一つずつ言葉と図解でほどき、誰もが自分らしい選択を確信を持って行える状態を創り出します [cite: 3, 6]。</p>
            </div>
        </div>
        <div class="u-double h-960 bg-white">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: C3 - D4 / VISION</div>
                <h2 class="about-lead">一人ひとりが「選びやすく、学びやすく、<br>伝えやすい」世界をひろげる。</h2>
                [cite_start]<p class="about-text">クリニック、スクール、協会、そして個人。どの現場にも「伝え方が難しい」「学び方が分からない」という壁が存在します [cite: 6, 7][cite_start]。私たちはその壁を、テクノロジーとデザインの力で透明にしていきます。AIと人間が協働することが当たり前になった未来においても、現場の切実な願いから新しいブランドやコンテンツが絶え間なく生まれ続ける「土台」であり続けます [cite: 3]。</p>
            </div>
        </div>
    </section>

    <section class="grid-row">
        <div class="u-unit h-960 bg-white">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: A5 - A6 / VALUE 01</div>
                <h3 style="font-size: 18px; margin-bottom: 30px;">「現場のことば」<br>から始める</h3>
                [cite_start]<p class="about-text" style="font-size:12px;">仕組みを先に決めるのではなく、まず現場で交わされている会話や、お客様のふとした「口癖」を丁寧に拾うところから始めます [cite: 6, 7]。その生きた言葉の中にこそ、解決すべき本質的な問いが隠されているからです。</p>
            </div>
        </div>
        <div class="u-unit h-960 bg-light">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: B5 - B6 / VALUE 02</div>
                <h3 style="font-size: 18px; margin-bottom: 30px;">難しいことを<br>「図」と「例え」にする</h3>
                [cite_start]<p class="about-text" style="font-size:12px;">幹細胞理論やAIのアルゴリズムなど、専門的になりがちなテーマほど、図解・比喩・ストーリーを用いて「とっつきやすさ」を創ることを重視します [cite: 6, 7]。理解の壁を取り払うことが、信頼への第一歩となります。</p>
            </div>
        </div>
        <div class="u-double h-960 bg-soft">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: C5 - D6 / VALUE 03-04</div>
                <h3 style="font-size: 18px; margin-bottom: 30px;">ビジネスと学びの調和</h3>
                [cite_start]<p class="about-text">受講生や患者様の理解が深まることと、現場の売上・継続性が両立する形をデザインします [cite: 6, 7][cite_start]。また、AIに任せるべき仕事と人間が担うべきクリエイティビティを見極め、現場の負担を減らしながら、より価値の高い時間に集中できる環境を整えます [cite: 6, 7]。</p>
            </div>
        </div>
    </section>

    <?php include('components/footer.php'); ?>
</div>
</body>
</html>