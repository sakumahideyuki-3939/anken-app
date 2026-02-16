<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPANY | ALGO Inc.</title>
    <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
    <style>
        .inner-pad-center { padding: 80px 60px; height: 100%; display: flex; flex-direction: column; justify-content: center; }
        .company-table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        .company-table th, .company-table td { padding: 20px 0; border-bottom: 1px solid #eee; font-size: 13px; text-align: left; }
        .company-table th { width: 100px; font-weight: 400; color: #999; }
        .service-list { margin-top: 20px; font-size: 12px; line-height: 2.2; color: #555; list-style: none; }
    </style>
</head>
<body class="page-company">
<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="grid-row" style="height: 480px;">
        <div class="u-4">
            <div class="inner-pad-center" style="align-items: center; text-align: center;">
                <div class="addr-tag">ADDRESS: A1 - D2 / CORPORATE</div>
                <h1 style="font-size: 32px; letter-spacing: 0.4em;">COMPANY</h1>
                <p style="margin-top:20px; color:#888; font-size:12px; letter-spacing:0.2em;">株式会社アルゴ 会社概要</p>
            </div>
        </div>
    </section>

    <section class="grid-row">
        <div class="u-double h-960 bg-white">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: A3 - B4 / PROFILE</div>
                <h2 style="font-size: 20px; letter-spacing: 0.2em;">CORPORATE PROFILE</h2>
                <table class="company-table">
                    <tr><th>会社名</th><td>株式会社アルゴ（ALGO Inc.）</td></tr>
                    <tr><th>所在地</th><td>〒150-0075 東京都渋谷区東2-29-7-201</td></tr>
                    <tr><th>設立</th><td>2014年 9月</td></tr>
                    <tr><th>代表者</th><td>代表取締役 佐久間 秀行</td></tr>
                    <tr><th>連絡先</th><td>TEL：03-6805-0781 / FAX：03-5539-4937</td></tr>
                    <tr><th>主要取引先</th><td>全国の美容皮膚科・形成外科・クリニック、一般社団法人日本美容創造協会、他</td></tr>
                </table>
            </div>
        </div>
        <div class="u-double h-960 bg-light">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: C3 - D4 / BUSINESS DOMAINS</div>
                <h2 style="font-size: 20px; letter-spacing: 0.2em;">BUSINESS DOMAINS</h2>
                <ul class="service-list">
                    <li><strong>01. 美容皮膚科向けEC事業</strong>：ドクターズコスメ・試薬・プロダクト販売</li>
                    <li><strong>02. 再生医療支援事業</strong>：幹細胞「生搾り」プロジェクトの企画・推進</li>
                    <li><strong>03. 美容教育事業</strong>：IBCAを通じた検定運営・教材設計・講座開発</li>
                    <li><strong>04. AI導入支援事業</strong>：現場の課題を解決するAI活用フローの構築</li>
                    <li><strong>05. コンテンツ制作事業</strong>：教育教材、図解資料、LP、論語リライト</li>
                    <li><strong>06. スポーツ・ライフスタイル</strong>：ゴルフマネジメント、吉報旅の企画運営</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="grid-row" style="height: 480px;">
        <div class="u-4 bg-soft">
            <div class="inner-pad-center" style="align-items: center;">
                <div class="addr-tag">ADDRESS: A5 - D6 / ACCESS</div>
                <p style="font-size: 13px; letter-spacing: 0.1em; color: #666;">GOOGLE MAP AREA / 〒150-0075 東京都渋谷区東2-29-7-201</p>
                </div>
        </div>
    </section>

    <?php include('components/footer.php'); ?>
</div>
</body>
</html>