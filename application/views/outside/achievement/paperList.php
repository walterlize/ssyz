<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($paper))
            foreach ($paper as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/paper/paperDetail/<?= $r['paperId'] ?>" target="_blank">
            <?= $r['paperName'] ?>[<?= $r['time'] ?>]
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
