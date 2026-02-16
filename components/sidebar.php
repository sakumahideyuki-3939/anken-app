<?php include_once(__DIR__ . '/../config.php'); ?>
<aside class="s-sidebar" style="width: 480px; padding: 80px 60px;">
    <div class="widget">
        <div class="widget-title" style="font-weight:bold; border-bottom:1px solid #eee; padding-bottom:15px; margin-bottom:40px;">PROJECTS</div>
        <ul style="list-style:none; font-size:12px; line-height:3; color:#888;">
            <?php foreach($works_list as $work): ?>
                <li><?php echo $work['title']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>