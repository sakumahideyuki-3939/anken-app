<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALGO Inc. | 医療・美容・学び・AIをつなぐ</title>
    <link rel="stylesheet" href="./assets/css/main.css?v=<?php echo time(); ?>">
    <style>
        /* 文字密度を維持するためのスタイルガード */
        .inner-pad-center { 
            padding: 60px 50px; 
            height: 100%; 
            display: flex; 
            flex-direction: column; 
            justify-content: center; 
            align-items: center; 
            text-align: center; 
        }
        .content-text-rich {
            font-size: 13px;
            line-height: 2.2;
            text-align: left;
            margin-top: 30px;
            max-width: 640px;
        }
        .work-desc-rich {
            font-size: 11px;
            line-height: 2.0;
            text-align: left;
            margin-top: 15px;
            color: #555;
        }
        .work-ttl { font-size: 15px; font-weight: bold; letter-spacing: 0.15em; line-height: 1.5; }

        /* スライダーの物理構造 */
        .slider-section { width: 100%; overflow: hidden; height: 960px; background: #fff; position: relative; }
        .slides { display: flex; width: 200%; height: 100%; transition: transform 0.8s ease-in-out; }
        .slide { width: 50%; height: 100%; flex-shrink: 0; }
    </style>
</head>
<body class="page-index">
<div class="algo-site">

    <?php include('components/header.php'); ?>

    <section class="slider-section">
        <div class="slides" id="js-slides">
            <div class="slide bg-white">
                <div class="inner-pad-center">
                    <p class="addr-tag">ADDRESS: A1 - D2</p>
                    <h1 style="font-size: clamp(24px, 5vw, 48px);">医療・美容・学び・AIをつなぐ<br>クリエイティブカンパニー</h1>
                </div>
            </div>
            <div class="slide bg-light">
                <div class="inner-pad-center">
                    <p class="addr-tag">CONCEPT 01</p>
                    <h1 style="font-size: clamp(24px, 5vw, 48px);">現場の「どうしたらいい？」を<br>形にする</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="grid-row">
        <div class="u-unit h-960 bg-white">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: A3 - A4</div>
                <h2>現場の<br>「ことば」から<br>始める</h2>
                <p class="work-desc-rich">ALGOの出発点は、美容皮膚科や教育現場、あるいはスポーツの現場で交わされるリアルな「困りごと」にあります。専門家が抱える伝えづらさ、受け手が感じる選びづらさ。その最前線にある「生きた言葉」を拾い上げることから、すべてのプロジェクトは動き出します。</p>
            </div>
        </div>
        <div class="u-unit h-960 bg-light">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: B3 - B4</div>
                <h2>難しいことを<br>「図」と<br>「例え」にする</h2>
                <p class="work-desc-rich">高度に専門化された知見は、時として受け手との距離を生んでしまいます。ALGOは、複雑な論理を直感的な「図」に整理し、日常的な「例え」へと翻訳します。誰もが迷わず選ぶことができ、自ら主体的に学ぶことができる。そんな「分かりやすさ」の標準を創ります。</p>
            </div>
        </div>
        <div class="u-double h-960 bg-soft">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: C3 - D4</div>
                <h2 style="font-size: 28px;">多様な領域を「問い」と<br>「デザイン」で再構築する。</h2>
                <p class="content-text-rich">
                    医療、美容、学び、ゴルフ、そしてAI。一見すると異なる領域に共通するのは、「伝えるべき価値がありながら、その届け方に課題がある」という点です。ALGOは、固定観念に縛られない「問い」を立て、デザイン思考によって本質的な価値を再定義します。商材開発から教育システム、デジタルツールの導入まで、現場と未来を繋ぐ一気通貫のソリューションを提供します。
                </p>
            </div>
        </div>
    </section>

    <section class="grid-row">
        <div class="u-double h-960" style="background: #f4f4f4; border-right: 1px solid #eee;">
            <div class="inner-pad-center">
                <div class="addr-tag" style="color:#bbb;">ADDRESS: A5 - B6 / PHILOSOPHY</div>
                <h2 style="font-size: 32px; margin-bottom: 20px; color: #333;">現場発のブランドと<br>コンテンツが<br>生まれ続ける土台へ</h2>
                <p class="content-text-rich" style="color: #666;">
                    私たちが提供するのは、単なるクリエイティブの制作物ではありません。現場で働く人々が「伝えやすさ」の武器を手に入れ、受け取る人々が「選びやすさ」という自由を享受できる。そんな新しい循環を生み出す“土台”そのものをデザインすることです。AIと人間が共生し、知恵が滑らかに伝わる社会において、ALGOは常に「現場の願い」を形にする伴走者であり続けます。
                </p>
            </div>
        </div>
        <div class="u-unit h-960 bg-white">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: C5 - C6</div>
                <h3>IBCA<br>美容創造協会</h3>
                <p class="work-desc-rich">検定試験の運営から、デジタル教材の設計、資格認定システムまで。次世代の美容教育に求められる「学びやすさ」を、協会ビジネスの枠組みを超えたコンテンツデザインによって構築します。現場が求める技術と、時代が求める知識を、確かな品質で接続する教育のハブとなります。</p>
            </div>
        </div>
        <div class="u-unit h-960 bg-light">
            <div class="inner-pad-center">
                <div class="addr-tag">ADDRESS: D5 - D6</div>
                <h3>AI Support<br>導入支援</h3>
                <p class="work-desc-rich">「AIをどう使えばいいかわからない」というクリニックや事業者の不安を、具体的な運用フローへと変換します。質問フォーム一つで、現場の悩みに最適化されたプロンプトや活用方法を提案。テクノロジーを身近な道具として手なずけ、本来の業務に集中できる環境を共に創り出します。</p>
            </div>
        </div>
    </section>

    <section class="grid-row">
        <?php 
        $work_items = [
            ["cat"=>"REGENERATIVE", "ttl"=>"幹細胞「生搾り」", "txt"=>"クリニック向けの再生医療プロジェクト。鮮度にこだわった提供価値を設計。"],
            ["cat"=>"ALGO-COSME", "ttl"=>"アルゴコスメ", "txt"=>"美容皮膚科向けEC。院内製剤の魅力を、論理的なコピーとデザインで再定義。"],
            ["cat"=>"CONSULTING", "ttl"=>"AIコンサル", "txt"=>"教育コンテンツ制作や業務効率化にAIを統合し、生産性を劇的に向上。"],
            ["cat"=>"EDUCATION", "ttl"=>"IBCA", "txt"=>"検定ビジネスのDX化と、学習効果を最大化するカリキュラムデザイン。"],
            ["cat"=>"PUBLISHING", "ttl"=>"教科書販売", "txt"=>"専門知識を「図解」で読み解く、EC機能を備えた教材販売プラットフォーム。"],
            ["cat"=>"CONTENTS", "ttl"=>"論語リライト", "txt"=>"古典の知恵を現代の文脈、特に美容や吉報旅の視点で再解釈する試み。"],
            ["cat"=>"TRAVEL", "ttl"=>"吉報旅", "txt"=>"「問い」から始まる新しい旅の形。自分を見つめ直す体験をデザイン。"],
            ["cat"=>"SPORTS", "ttl"=>"ゴルフ", "txt"=>"マネジメントと動作解析に「デザイン」と「言語化」の視点を導入。"]
        ];
        foreach($work_items as $item): ?>
        <div class="u-unit h-480 bg-white">
            <div class="inner-pad-center" style="padding: 40px;">
                <div class="work-cat" style="font-size: 9px; color: #999; margin-bottom: 10px;"><?php echo $item['cat']; ?></div>
                <div class="work-ttl"><?php echo $item['ttl']; ?></div>
                <p style="font-size: 10px; line-height: 1.8; color: #888; margin-top: 15px;"><?php echo $item['txt']; ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </section>

    <?php include('components/footer.php'); ?>

</div>

<script>
    let current = 0;
    const slides = document.getElementById('js-slides');
    if(slides) {
        setInterval(() => {
            current = (current + 1) % 2;
            slides.style.transform = `translateX(-${current * 50}%)`;
        }, 5000);
    }
</script>
</body>
</html>