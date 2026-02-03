<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>BLOG | ALGO Inc.</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        .grid-row { display: flex; width: 1920px; }

        /* HERO: 1920x480 */
        .b-hero { width: 1920px; height: 480px; background: #fcfcfc; display: flex; flex-direction: column; align-items: center; justify-content: center; border-bottom: 1px solid #f0f0f0; }
        .b-hero h1 { font-size: 48px; letter-spacing: 0.5em; font-weight: 200; }
        .b-hero p { margin-top:20px; color:#999; letter-spacing:0.3em; font-size: 14px; }

        /* MAIN CONTENT AREA: 1440px */
        .b-main { width: 1440px; padding: 80px 120px; border-right: 1px solid #f0f0f0; }
        .post-item { width: 100%; display: flex; margin-bottom: 80px; text-decoration: none; color: inherit; }
        .post-thumb { width: 480px; height: 320px; background: #f5f5f5; overflow: hidden; }
        .post-thumb img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
        .post-item:hover .post-thumb img { transform: scale(1.05); }
        
        .post-info { width: calc(100% - 480px); padding-left: 60px; display: flex; flex-direction: column; justify-content: center; }
        .post-meta { font-size: 12px; color: #bbb; letter-spacing: 0.1em; margin-bottom: 15px; }
        .post-title { font-size: 24px; line-height: 1.6; margin-bottom: 25px; font-weight: 400; }
        .post-excerpt { font-size: 14px; line-height: 2; color: #777; }

        /* SIDEBAR: 480px */
        .b-sidebar { width: 480px; padding: 80px 60px; background: #fff; }
        .widget { margin-bottom: 80px; }
        .widget-title { font-size: 13px; font-weight: bold; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 40px; letter-spacing: 0.2em; }
        .widget ul { list-style: none; }
        .widget ul li { font-size: 13px; line-height: 3; color: #666; border-bottom: 1px dotted #eee; }
        
        .addr-tag { font-family: sans-serif; font-size: 10px; color: #ccc; margin-bottom: 25px; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="b-hero">
        <div class="addr-tag">ADDRESS: A1 - D2</div>
        <h1>BLOG</h1>
        <p>現場の知見と、これからの問い</p>
    </section>

    <div class="grid-row">
        <main class="b-main">
            <div class="addr-tag">ADDRESS: A3 - C12</div>

            <a href="single.php" class="post-item">
                <div class="post-thumb">
                    <img src="/testtest/assets/images/concept-visual-about.png" alt="ALGO Concept Visual">
                </div>
                <div class="post-info">
                    <div class="post-meta">2026.01.11 | NEWS</div>
                    <h2 class="post-title">ALGO本社サイト「ai.index.html」公開のお知らせ</h2>
                    <p class="post-excerpt">ALGO全体の思想と事業を束ねるコーポレートサイトを公開しました。ABOUT・SERVICE・COMPANYを通じて、私たちの「問い」を発信していきます。</p>
                </div>
            </a>

            <a href="single.php" class="post-item">
                <div class="post-thumb">
                    <div style="width:100%; height:100%; background:#f9f9f9; display:flex; align-items:center; justify-content:center; color:#ccc;">NO IMAGE</div>
                </div>
                <div class="post-info">
                    <div class="post-meta">2026.01.10 | PROJECT</div>
                    <h2 class="post-title">美容EC「ALGO-COSME」構成リニューアル検討</h2>
                    <p class="post-excerpt">美容皮膚科クリニックの現場で、より患者様に伝わりやすい説明の仕組みを構築するためのアップデートを行っています。</p>
                </div>
            </a>
        </main>

        <aside class="b-sidebar">
            <div class="addr-tag">ADDRESS: D3 - D12</div>
            
            <div class="widget">
                <div class="widget-title">CATEGORY</div>
                <ul>
                    <li>> NEWS</li>
                    <li>> PROJECT</li>
                    <li>> COLUMN</li>
                </ul>
            </div>

            <div class="widget">
                <div class="widget-title">RECENT POSTS</div>
                <ul style="border:none;">
                    <li style="border-bottom:none; line-height:1.6; margin-bottom:20px;">
                        <span style="font-size:10px; color:#bbb;">2026.01.11</span><br>
                        ALGO本社サイト公開のお知らせ
                    </li>
                    <li style="border-bottom:none; line-height:1.6; margin-bottom:20px;">
                        <span style="font-size:10px; color:#bbb;">2026.01.10</span><br>
                        美容EC「ALGO-COSME」リニューアル
                    </li>
                </ul>
            </div>
        </aside>
    </div>

    <?php include('components/footer.php'); ?>
</div>

</body>
</html>