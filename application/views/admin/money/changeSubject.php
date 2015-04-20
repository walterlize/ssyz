<tr><h2 align="center"><font color="#3A6EA5" > 年度经费预算表</font></h2></tr>
<div class="select_head"><font >请选择年份：</font>  <td class="td2" colspan="4">
        <select id="year" name="year">
            <?php for ($i = 0; $i <= 2; $i++) { ?>
                <option value="<?php
                $year = 2014 + $i;
                echo $year;
                ?>"
                        <?php
                        if (isset($money->year) && $year == $money->year)
                            echo 'selected';
                        else
                            echo '';
                        ?>
                        ><?= $year ?></option>
                    <?php } ?>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        请选择课题：
        <select id="subjectId" name="subjectId"  onchange="subject_change('subjectId', 'money_result', '<?= base_url() ?>index.php/admin/money/changeSubject')">
            <?php foreach ($subject as $r): ?>

                <option value="<?= $r->subjectId ?>" 
                <?php
                if (isset($money->subjectId) && $r->subjectId == $money->subjectId)
                    echo 'selected';
                else
                    echo '';
                ?>
                        >
                            <?= $r->subjectName ?>
                </option>
            <?php endforeach; ?>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div></br>  
