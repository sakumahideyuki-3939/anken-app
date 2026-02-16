<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT | ALGO Inc.</title>
    <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
    <style>
        .inner-pad-center { padding: 80px 60px; height: 100%; display: flex; flex-direction: column; justify-content: center; }
        .contact-info-block { margin-bottom: 40px; }
        .contact-info-block h3 { font-size: 14px; letter-spacing: 0.1em; margin-bottom: 10px; color: #2f2f2f; }
        .contact-info-block p { font-size: 13px; line-height: 1.8; color: #666; }
    </style>
</head>
<body class="page-contact">
<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="grid-row" style="height: 480px;">
        <div class="u-4">
            <div class="inner-pad-center" style="align-items: center; text-align: center;">
                <div class="addr-tag">ADDRESS: A1 - D2 / CONTACT</div>
                <h1 style="font-size: 32px; letter-spacing: 0.4em;">CONTACT</h1>
                [cite_start]<p style="margin-top:20px; color:#888; font-size:12px; letter-spacing:0.2em;">お問い合わせ [cite: 2]</p>
            </div>
        </div>
    </section>

    <section class="grid-row" style="border-top: 1px solid #f0f0f0;">
        <div class="u-double h-960 bg-white">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: A3 - B6 / CHANNELS</div>
                
                <div class="contact-info-block">
                    <h3>一般のお問い合わせ</h3>
                    [cite_start]<p>ALGO Inc. 全般に関するご質問、その他全般的なお問い合わせはこちらから。 [cite: 2]</p>
                    [cite_start]<p>Email: info@example.com / Tel: 03-6805-0781 [cite: 2]</p>
                </div>

                <div class="contact-info-block">
                    <h3>クリニック・法人様</h3>
                    [cite_start]<p>美容皮膚科向けEC「ALGO-COSME」、幹細胞・試薬、AI導入支援など。 [cite: 2]</p>
                    [cite_start]<p>Email: business@example.com [cite: 2]</p>
                </div>

                <div class="contact-info-block">
                    <h3>メディア・講演依頼</h3>
                    [cite_start]<p>取材・セミナー登壇・社内研修などのご依頼。 [cite: 2]</p>
                    [cite_start]<p>Email: pr@example.com [cite: 2]</p>
                </div>
            </div>
        </div>

        <div class="u-double h-960 bg-soft">
            <div class="inner-pad-center" style="align-items: center; text-align: center;">
                <div class="addr-tag">ADDRESS: C3 - D6 / MESSAGE</div>
                <p style="font-size: 16px; line-height: 2.5; letter-spacing: 0.1em;">
                    現場の「問い」から、<br>
                    新しい価値を共に創り出す。<br><br>
                    ご連絡を心よりお待ちしております。
                </p>
            </div>
        </div>
    </section>

    <?php include('components/footer.php'); ?>
</div>
</body>
</html>