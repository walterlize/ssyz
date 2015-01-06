<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($demonstration))
            foreach ($demonstration as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/demonstration/demonstrationDetail/<?= $r['demonstrationId'] ?>" target="_blank">
            <?= $r['technique'] ?>
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>    
