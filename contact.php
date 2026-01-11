<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1920">
    <title>CONTACT | UNIQUE</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #fff; color: #333; font-family: "Hiragino Mincho ProN", serif; -webkit-font-smoothing: antialiased; }
        .algo-site { width: 1920px; margin: 0 auto; }
        .grid-row { display: flex; flex-wrap: wrap; width: 1920px; }

        /* 番地表示タグ */
        .addr-tag { font-family: sans-serif; font-size: 10px; color: #ccc; letter-spacing: 0.1em; margin-bottom: 25px; }

        /* HERO: 1920x480 */
        .ct-hero { width: 1920px; height: 480px; background: #fcfcfc; display: flex; flex-direction: column; align-items: center; justify-content: center; border-bottom: 1px solid #f0f0f0; }
        .ct-hero h1 { font-size: 48px; letter-spacing: 0.5em; font-weight: 200; }

        /* LEAD AREA: 960x960 (A-B列) */
        .ct-lead { width: 960px; height: 960px; padding: 160px; border-right: 1px solid #f0f0f0; display: flex; flex-direction: column; justify-content: center; }
        .ct-lead h2 { font-size: 28px; line-height: 1.8; margin-bottom: 60px; }
        .ct-lead p { font-size: 15px; line-height: 2.6; color: #666; text-align: justify; }

        /* FORM AREA: 960x960 (C-D列) */
        .ct-form-box { width: 960px; height: 960px; padding: 120px; background: #fff; display: flex; flex-direction: column; justify-content: center; }
        .f-item { margin-bottom: 40px; }
        .f-label { font-size: 11px; letter-spacing: 0.2em; color: #999; margin-bottom: 15px; display: block; }
        .f-input { width: 100%; padding: 15px 0; border: none; border-bottom: 1px solid #ddd; font-size: 16px; outline: none; transition: 0.3s; }
        .f-input:focus { border-bottom: 1px solid #333; }
        .f-textarea { width: 100%; height: 120px; border: 1px solid #ddd; padding: 15px; margin-top: 10px; outline: none; }
        .f-submit { width: 240px; height: 60px; background: #333; color: #fff; border: none; font-size: 12px; letter-spacing: 0.3em; cursor: pointer; transition: 0.4s; margin-top: 40px; }
        .f-submit:hover { opacity: 0.7; }
    </style>
</head>
<body>

<div class="algo-site">
    <?php include('components/header.php'); ?>

    <section class="ct-hero">
        <div class="addr-tag">ADDRESS: A1 - D2</div>
        <h1>CONTACT</h1>
        <p style="margin-top:20px; color:#999; letter-spacing:0.3em;">GET IN TOUCH</p>
    </section>

    <section class="grid-row">
        <article class="ct-lead">
            <div class="addr-tag">ADDRESS: A3 - B6</div>
            <h2>プロジェクトのご相談や、<br>UNIQUEへの想いを<br>お聞かせください。</h2>
            <p>
新しい一歩の起点に、ALGOを選んでいただきありがとうございます。
私たちは、単なる制作や代行を行う存在ではありません。
あなたの構想や思想に向き合い、ともに考え、ともに形にしていく伴走者です。
まだ言葉になっていない違和感や、輪郭の曖昧なアイデアでも構いません。
整理されていなくても大丈夫です。
その「引っかかり」こそが、価値の芽だと私たちは考えています。
            </p>
        </article>

        <div class="ct-form-box">
            <div class="addr-tag">ADDRESS: C3 - D6</div>
            <form>
                <div class="f-item">
                    <label class="f-label">NAME</label>
                    <input type="text" class="f-input" placeholder="お名前をご記入ください">
                </div>
                <div class="f-item">
                    <label class="f-label">EMAIL</label>
                    <input type="email" class="f-input" placeholder="メールアドレスをご記入ください">
                </div>
                <div class="f-item">
                    <label class="f-label">MESSAGE</label>
                    <textarea class="f-textarea" placeholder="お問い合わせ内容をご記入ください"></textarea>
                </div>
                <button type="button" class="f-submit">SEND MESSAGE</button>
            </form>
        </div>
    </section>

    <?php include('components/footer.php'); ?>
</div>

<script src="js/script.js"></script>

</body>
</html>