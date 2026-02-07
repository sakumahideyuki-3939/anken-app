<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALGO本社サイト公開のお知らせ | BLOG | ALGO Inc.</title>
    <link rel="stylesheet" href="./assets/css/main.css?v=20260114_master">
    <style>
        /* 記事詳細専用の微調整 */
        .post-header { padding-bottom: 60px; border-bottom: 1px solid #f0f0f0; margin-bottom: 60px; }
        .post-meta { font-size: 11px; letter-spacing: 0.2em; color: #999; margin-bottom: 20px; display: flex; gap: 20px; }
        .post-content h2 { font-size: 22px; margin: 80px 0 30px; }
        .post-content p { margin-bottom: 40px; }
        .post-eye-catch { width: 100%; height: auto; margin-bottom: 60px; background: #f9f9f9; }
        .post-eye-catch img { width: 100%; height: auto; opacity: 0.9; }
        .post-navigation { border-top: 1px solid #f0f0f0; padding-top: 60px; margin-top: 100px; display: flex; justify-content: space-between; font-size: 12px; letter-spacing: 0.1em; color: #888; }
    </style>
</head>
<body class="page-single">
<div class="algo-site">

    <?php include('components/header.php'); ?>

    <main class="page-main">

        <section class="grid-row">
            <div class="u-4 inner-pad bg-white">
                <div class="addr-tag">ADDRESS: A1 - D2 / BLOG POST</div>
                <div class="post-header">
                    <div class="post-meta">
                        <span>2025.11.20</span>
                        <span>NEWS</span>
                    </div>
                    <h1 style="font-size: 32px; line-height: 1.5; letter-spacing: 0.1em;">ALGO本社サイト「ai.index.html」<br>公開のお知らせ</h1>
                </div>
            </div>
        </section>

        <section class="grid-row">
            <div class="u-3 bg-white" style="padding: 100px 120px;">
                <div class="addr-tag">ADDRESS: A3 - C12</div>

                <article class="post-content">
                    <div class="post-eye-catch">
                        <img src="./assets/images/concept-visual-about.png" alt="ALGO Corporate Site View">
                    </div>

                    <p class="content-text">
                        ALGO全体の思想と事業を束ねるコーポレートサイト「ai.index.html」を公開しました。ABOUT・SERVICE・COMPANY・BLOGを通じて、ALGOが取り組んでいるプロジェクトや考え方を一元的に発信していきます。
                    </p>

                    <h2>サイト公開の背景</h2>
                    <p class="content-text">
                        これまでは、ALGO-COSMEやIBCAなど、プロジェクト単位で情報が点在していました。今回のコーポレートサイトでは、それらを「ALGO Inc.」として束ね、医療・美容・学び・ゴルフ・AIといった領域をどのように横断しているのかを分かりやすく整理しています。
                    </p>

                    <div class="post-navigation">
                        <a href="blog.php" style="color:#2f2f2f;">← PREV</a>
                        <a href="blog.php" style="color:#2f2f2f;">BLOG LIST</a>
                        <span style="color:#ccc;">NEXT →</span>
                    </div>
                </article>
            </div>

            <div class="u-1 bg-light">
                <div class="addr-tag">ADDRESS: D3 - D12</div>
                <?php include('components/sidebar.php'); ?>
            </div>
        </section>

    </main>

    <?php include('components/footer.php'); ?>

</div>
</body>
</html>