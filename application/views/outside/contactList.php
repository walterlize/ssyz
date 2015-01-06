<div class="pr_right">
    <div class="tit"><?= $title ?></div>
    <div class="pr_bj">
        <?php if (is_array($contact))
            foreach ($contact as $r): ?>
                <div><font size="+1">联系人：<?= $r['personName'] ?></font></div>
                <div style="margin-left:40px">
                    <div>工作单位：<?= $r['firm'] ?></div>
                    <div>邮箱地址：<?= $r['email'] ?></div>
                </div>
                <br />
        <?php endforeach; ?>
            <div align="center"><?= $page ?></div>
    </div>
</div>