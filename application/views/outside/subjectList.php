    <div class="pr_right">
    	<div class="tit"><?=$title?></div>
        <div class="pr_bj">
        	<?php if(is_array($subject)) foreach($subject as $r):?>

        <a id="" href="<?=base_url()?>index.php/outside/subject/subjectDetail/<?=$r['subjectId']?>" target="_blank">
        	课题<?=$r['subjectNum']?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$r['subjectName']?>
        </a>
        <br /><br />
        <?php endforeach; ?>
        <div align="center"><?=$page?></div>
        </div>
    </div>
