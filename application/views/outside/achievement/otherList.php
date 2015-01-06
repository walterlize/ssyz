<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($other))
            foreach ($other as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/other/otherDetail/<?= $r['otherId'] ?>" target="_blank">
            <?= $r['otherName'] ?>
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
