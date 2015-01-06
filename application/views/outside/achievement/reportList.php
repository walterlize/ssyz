<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($report))
            foreach ($report as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/report/reportDetail/<?= $r['reportId'] ?>" target="_blank">
<?= $r['reportName'] ?>[<?= $r['time'] ?>]
            </a>
            <br /><br />
<?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
