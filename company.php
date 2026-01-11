<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>COMPANY | UNIQUE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        .grid-row { display: flex; flex-wrap: wrap; width: 1920px; }

        /* セクション規格 */
        .c-hero { width: 1920px; height: 960px; background: #f9f9f9; display: flex; align-items: center; justify-content: center; position: relative; }
        .c-hero h1 { font-size: 48px; letter-spacing: 0.5em; font-weight: 200; color: #bbb; }
        
        .c-message { width: 960px; height: 960px; padding: 160px; display: flex; flex-direction: column; justify-content: center; }
        .c-map { width: 960px; height: 960px; background: #f2f2f2; display: flex; align-items: center; justify-content: center; color: #ccc; font-size: 14px; letter-spacing: 0.2em; }
        
        .c-table-section { width: 1920px; padding: 120px 80px; border-top: 1px solid #eee; }
        .c-table { width: 100%; border-collapse: collapse; }
        .c-table tr { border-bottom: 1px solid #f0f0f0; }
        .c-table th { width: 480px; padding: 60px 0; text-align: left; font-size: 14px; letter-spacing: 0.3em; font-weight: bold; color: #999; vertical-align: top; }
        .c-table td { padding: 60px 0; font-size: 15px; line-height: 2.2; letter-spacing: 0.05em; color: #444; }

        .addr-tag { font-family: sans-serif; font-size: 10px; color: #ccc; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="c-hero">
        <div class="addr-tag" style="position:absolute; top:40px; left:40px;">ADDRESS: A1 - D2</div>
        <h1>COMPANY PROFILE</h1>
    </section>

    <section class="grid-row">
        <div class="c-message">
            <div class="addr-tag">ADDRESS: A3 - B4</div>
            <h2 style="font-size:32px; margin-bottom:60px; line-height:1.6;">未来をデザインする、<br>唯一無二のパートナーとして。</h2>
            <p style="font-size:15px; line-height:2.6; color:#666; text-align:justify;">
                株式会社アルゴは、クリエイティブの力で社会に新しい価値を提案し続けるデザイン開発のプロフェッショナル集団です。私たちは、顧客の想いを深く理解し、それを形にするだけでなく、その先にある感動や体験を設計します。これまでの豊富な経験と最先端の知見を融合させ、あなたのビジネスを次のステージへと引き上げます。
            </p>
        </div>
        <div class="c-map">
            <div class="addr-tag" style="position:absolute; margin-top:-400px; margin-left:-360px;">ADDRESS: C3 - D4</div>
            GOOGLE MAP AREA (960x960)
        </div>
    </section>

    <section class="c-table-section">
        <div class="addr-tag">ADDRESS: A5 - D6</div>
        <table class="c-table">
            <tr>
                <th>会社名</th>
                <td>株式会社アルゴ（UNIQUE Inc.）</td>
            </tr>
            <tr>
                <th>所在地</th>
                <td>〒150-0011 渋谷区東2-29-7<br>※アクセス：恵比寿駅より徒歩７分</td>
            </tr>
            <tr>
                <th>設立</th>
                <td>2014年 9月</td>
            </tr>
            <tr>
                <th>事業内容</th>
                <td>
                    1. ブランディング戦略の立案・実行<br>
                    2. グラフィック・WEBデザイン制作<br>
                    3. プロダクト開発・パッケージデザイン<br>
                    4. 空間デザイン・展示会プロデュース<br>
                    5. クリエイティブコンサルティング
                </td>
            </tr>
            <tr>
                <th>代表者</th>
                <td>代表取締役 佐久間秀行</td>
            </tr>
        </table>
    </section>

    <?php include('components/footer.php'); ?>
</div>

</body>
</html>