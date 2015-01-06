<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($book))
            foreach ($book as $r): ?>

                <a id="" href="<?= base_url() ?>index.php/outside/book/bookDetail/<?= $r['bookId'] ?>" target="_blank">
            <?= $r['bookName'] ?>[<?= $r['time'] ?>]
            </a>
            <br /><br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>
