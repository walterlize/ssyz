<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($standard))
            foreach ($standard as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/standard/standardDetail/<?= $r['standardId'] ?>" target="_blank">
            <?= $r['standardName'] ?>[<?= $r['time'] ?>]
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
