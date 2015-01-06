<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($software))
            foreach ($software as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/software/softwareDetail/<?= $r['softwareId'] ?>" target="_blank">
            <?= $r['softwareName'] ?>[<?= $r['time'] ?>]
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
