<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($result))
            foreach ($result as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/result/resultDetail/<?= $r['resultId'] ?>" target="_blank">
            <?= $r['resultName'] ?>[<?= $r['time'] ?>]
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
