<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG | ALGO Inc.</title>
    <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
    <style>
        .post-item { display: flex; gap: 50px; margin-bottom: 80px; width: 100%; }
        .post-thumb { width: 360px; height: 240px; background: #f4f4f4; flex-shrink: 0; }
        .post-info { flex-grow: 1; }
        .post-meta { font-size: 11px; color: #999; letter-spacing: 0.1em; margin-bottom: 15px; }
        .post-title { font-size: 18px; line-height: 1.6; margin-bottom: 15px; font-weight: bold; }
        .post-excerpt { font-size: 13px; color: #666; line-height: 2.2; }
        .sidebar-title { font-size: 12px; font-weight: bold; letter-spacing: 0.2em; border-bottom: 1px solid #000; padding-bottom: 15px; margin-bottom: 30px; width: 100%; }
    </style>
</head>
<body class="page-blog">
<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="grid-row" style="height: 480px;">
        <div class="u-4">
            <div class="inner-pad-center" style="align-items: center; text-align: center;">
                <div class="addr-tag">ADDRESS: A1 - D2 / INSIGHTS</div>
                <h1 style="font-size: 32px; letter-spacing: 0.4em;">B L O G</h1>
                <p style="margin-top:20px; color:#888; font-size:12px;">現場の「問い」と、これからの知見</p>
            </div>
        </div>
    </section>

    <section class="grid-row-flex">
        
        <div style="flex: 1; min-height: 960px;">
            <div class="inner-pad-blog">
                <div class="addr-tag">ADDRESS: A3 - C12 / ARTICLES</div>
                
                <article class="post-item">
                    <div class="post-thumb"></div>
                    <div class="post-info">
                        <div class="post-meta">2026.01.11 | NEWS</div>
                        <h2 class="post-title"><a href="single.php">ALGO本社サイト「ai.index.html」公開のお知らせ</a></h2>
                        <p class="post-excerpt">医療・美容・学び・AIといった多様な領域を「問い」と「デザイン」で体系化する。ALGOの思想を束ねるハブとして、新しいコーポレートサイトを公開しました。</p>
                    </div>
                </article>

                <article class="post-item">
                    <div class="post-thumb"></div>
                    <div class="post-info">
                        <div class="post-meta">2026.01.05 | PROJECT</div>
                        <h2 class="post-title"><a href="#">美容教育におけるAI導入の現場報告</a></h2>
                        <p class="post-excerpt">IBCAでの実例を元にした、クリエイティブとAIの共生についての考察。現場の「わからない」を「できる」に変えるフロー構築の舞台裏を公開します。</p>
                    </div>
                </article>
            </div>
        </div>

        <div class="u-blog-side">
            <div class="inner-pad-blog">
                <div class="addr-tag">ADDRESS: D3 - D12 / CATEGORY</div>
                <div class="sidebar-title">CATEGORY</div>
                <ul style="list-style:none; font-size:11px; letter-spacing:0.1em; line-height:3; color:#666; width: 100%;">
                    <li><a href="#">> ALL POSTS</a></li>
                    <li><a href="#">> NEWS</a></li>
                    <li><a href="#">> PROJECT</a></li>
                    <li><a href="#">> COLUMN</a></li>
                </ul>
            </div>
        </div>

    </section>

    <?php include('components/footer.php'); ?>
</div>
</body>
</html>