<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>SINGLE | UNIQUE</title>
    <style>
        /* 共通リセット */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; overflow: hidden; }
        .grid-row { display: flex; width: 1920px; }

        /* 番地表示タグ */
        .addr-tag { font-family: sans-serif; font-size: 10px; color: #ccc; letter-spacing: 0.1em; margin-bottom: 20px; }

        /* TITLE AREA */
        .s-title-area { width: 1920px; padding: 100px 80px; border-bottom: 1px solid #f0f0f0; }
        .s-title-area h1 { font-size: 32px; letter-spacing: 0.1em; line-height: 1.6; }

        /* MAIN CONTENT: 1440px */
        .s-main { width: 1440px; padding: 80px 120px; border-right: 1px solid #f0f0f0; }
        .s-eye-catch { width: 100%; height: 600px; background: #f5f5f5; margin-bottom: 60px; }
        .s-body p { font-size: 15px; line-height: 2.8; color: #444; margin-bottom: 40px; text-align: justify; }

        /* SIDEBAR: 480px */
        .s-sidebar { width: 480px; padding: 80px 60px; background: #fff; }
        .widget { margin-bottom: 80px; }
        .widget-title { font-size: 13px; font-weight: bold; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 40px; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php 
        if(file_exists('components/header.php')){
            include('components/header.php'); 
        } else {
            echo '<div style="padding:20px; background:red; color:white;">HEADER NOT FOUND</div>';
        }
    ?>

    <section class="s-title-area">
        <div class="addr-tag">ADDRESS: A1 - D2</div>
        <h1>創造性を最大限に引き出す、クリエイティブ集団のためのAIプロンプト設計テンプレート</h1>
    </section>

    <div class="grid-row">
        <article class="s-main">
            <div class="addr-tag">ADDRESS: A3 - C12</div>
            <div class="s-eye-catch"></div>
            <div class="s-body">
                <p>（ここに本文が入ります。2.5倍の文字量に耐える設計です。）</p>
            </div>
        </article>

        <aside class="s-sidebar">
            <div class="addr-tag">ADDRESS: D3 - D12</div>
            <div class="widget">
                <div class="widget-title">CATEGORY</div>
            </div>
        </aside>
    </div>

    <?php 
        if(file_exists('components/footer.php')){
            include('components/footer.php'); 
        } 
    ?>
</div>

</body>
</html>