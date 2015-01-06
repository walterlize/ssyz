    <div class="pr_right">
    	<div class="tit"><?=$title?></div>
        <div class="pr_bj">
	<?php if(is_array($award)) foreach($award as $r):?>

        <a id="" href="<?=base_url()?>index.php/outside/award/awardDetail/<?=$r['awardId']?>" target="_blank">
        	<?=$r['awardName']?>
        </a>
        <br /><br />
        <?php endforeach; ?>
        <div align="center"><?=$page?></div>
        </div>
    </div>
