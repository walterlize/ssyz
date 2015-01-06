<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($patent))
            foreach ($patent as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/patent/patentDetail/<?= $r['patentId'] ?>" target="_blank">
        <?= $r['patentName'] ?>[<?= $r['authorizeTime'] ?>]
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
