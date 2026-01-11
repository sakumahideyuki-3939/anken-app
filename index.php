<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>UNIQUE | TOP</title>
    <style>
        /* 基本スタイル・グリッド定義 */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        .grid-row { display: flex; flex-wrap: wrap; width: 1920px; }
        .addr-tag { font-family: sans-serif; font-size: 10px; color: #ccc; letter-spacing: 0.1em; margin-bottom: 25px; }

        /* HERO SLIDER: A1-D2 */
        .slider-section { width: 1920px; height: 960px; overflow: hidden; position: relative; background: #fcfcfc; }
        .slides { display: flex; width: 300%; height: 100%; animation: slideAnim 20s infinite ease-in-out; }
        .slide { width: 1920px; height: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; }
        .slide h1 { font-size: 54px; letter-spacing: 0.4em; font-weight: 200; margin-bottom: 25px; }
        .slide p { font-size: 14px; letter-spacing: 0.3em; color: #999; }
        @keyframes slideAnim {
            0%, 30% { transform: translateX(0); }
            35%, 65% { transform: translateX(-1920px); }
            70%, 100% { transform: translateX(-3840px); }
        }

        /* ユニット規格 */
        .u-v-480 { width: 480px; height: 960px; padding: 60px; display: flex; flex-direction: column; justify-content: center; border-right: 1px solid #f0f0f0; }
        .u-sq-960 { width: 960px; height: 960px; padding: 120px; display: flex; flex-direction: column; justify-content: center; border-right: 1px solid #f0f0f0; }
        .u-sq-480 { width: 480px; height: 480px; padding: 40px; display: flex; flex-direction: column; justify-content: center; text-align: center; border: 1px solid #f0f0f0; transition: 0.4s; }
        .u-sq-480:hover { background: #fafafa; }
        
        h2 { font-size: 26px; line-height: 1.8; font-weight: 400; margin-bottom: 45px; }
        p.content { font-size: 14px; line-height: 2.6; color: #666; text-align: justify; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="slider-section">
        <div class="slides">
            <div class="slide">
                <div class="addr-tag">ADDRESS: A1 - D2</div>
                <p>CONCEPT 01</p>
                <h1>DESIGN & CREATIVE</h1>
            </div>
            <div class="slide" style="background:#f9f9f9;">
                <p>CONCEPT 02</p>
                <h1>INNOVATION STYLE</h1>
            </div>
            <div class="slide" style="background:#f5f5f5;">
                <p>CONCEPT 03</p>
                <h1>GLOBAL STANDARDS</h1>
            </div>
        </div>
    </section>

    <section class="grid-row">
        <div class="u-v-480">
            <div class="addr-tag">ADDRESS: A3 - A4</div>
            <h2>クリエイティブで楽しいことをしながら</h2>
            <p class="content">ALGOの設計プロセスは、クライアント自身が本当に大切にしている価値や思想を深く理解することから始まります。
日々の対話ややり取りの中で言葉になっていない想いをすくい上げ、新しい意味と構造として再定義し、形にしていきます。私たちがつくるのは、見た目を整えるためのデザインではありません。その先にある「使われ方」「伝わり方」「体験としてどう残るか」までを含めた、本質的な価値の設計です。ALGOは、アイデアを具現化する制作会社ではなく、
ビジョンを共に考え、未来へとつなげるパートナーとして伴走します。</p>
        </div>
        <div class="u-v-480" style="background:#fafafa;">
            <div class="addr-tag">ADDRESS: B3 - B4</div>
            <p class="content">長年にわたり多様なプロジェクトに向き合いながら、私たちは経験の積み重ねとともに、技術と知識を磨き続けてきました。一方的に「つくる」のではなく、設計と開発を横断しながら生まれる実践的なコミュニケーションこそが、本質的な価値を生むと考えています。ALGOが目指すのは、特別なものを押し付けることではありません。日常の中に自然に溶け込みながらも、使うたびに気づきや発見が生まれること。その積み重ねによって、静かに価値が広がっていくプロダクトをつくり続けています。</p>
        </div>
        <div class="u-sq-960">
            <div class="addr-tag">ADDRESS: C3 - D4</div>
            <h2>アイディアに先進的なデザインを<br>新しい挑戦を、革新的なスタイルで。</h2>
            <p class="content">ALGOでは、事業そのものの立ち上がりに寄り添うことから設計を始めます。スタートアップの段階から伴走し、対話を重ねながら顧客の本質的なニーズを掘り下げ、市場の流れや競合環境を冷静に読み解きます。その上で、他には代替できない強みを構造として整理し、戦略として定義します。定めた戦略は、表層的な表現で終わらせません。ロゴ、Webサイト、パンフレットなど、すべての接点において一貫した意図とメッセージが伝わるよう、ブランド全体を設計・支援します。</p>
        </div>
    </section>

    <section class="grid-row">
        <?php 
        $works = ["PACKAGE", "PRODUCTS", "DESIGN", "BROCHURE", "WEB", "IDENTITY", "SPACE", "ART"];
        foreach($works as $index => $title): 
            $col = chr(65 + ($index % 4)); 
            $row = ($index < 4) ? 5 : 6;
        ?>
            <div class="u-sq-480">
                <div class="addr-tag">ADDRESS: <?php echo $col . $row; ?></div>
                <div style="font-size: 14px; letter-spacing: 0.4em; font-weight:bold;"><?php echo $title; ?></div>
                <p style="font-size:10px; color:#999; margin-top:20px; line-height:2;">Visual Identity for Global Brands.<br>Designed by UNIQUE 2026.</p>
            </div>
        <?php endforeach; ?>
    </section>

    <?php include('components/footer.php'); ?>
</div>

<script src="js/script.js"></script>

</body>
</html>