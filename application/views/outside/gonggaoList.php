<div align="center" class="titleLink">
        <div class="zhuti">
<div class="zhuti2">
<div class="zhuti21"><?=$gtitle?></div>
<br />
<div align="left" style="width:90%" class="titleLink">
	<?php if(is_array($gonggao)) foreach($gonggao as $key=>$r):?>

        <?=$key+1?>、&nbsp<a id="" href="<?=base_url()?>index.php/head/trend/gonggaoDetail/<?=$r['gonggaoId']?>" target="_blank">
        	<?=$r['title']?>&nbsp&nbsp&nbsp
                    [<?=$r['date']?>]
        </a>
        <br /><br />
        <?php endforeach; ?>
        <div align="center"><?=$page?></div>
</div>
</div>
</div>
</div>
</div>

