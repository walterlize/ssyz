<div align="center" class="titleLink">
        <div class="zhuti">
<div class="zhuti2">
<div class="zhuti21"><?=$title?></div>
<br />
<div align="left" style="width:90%" class="titleLink">
	<?php if(is_array($trend)) foreach($trend as $key=>$r):?>

        <?=$key+1?>、&nbsp<a id="" href="<?=base_url()?>index.php/head/trend/detail/<?=$r['trendId']?>" target="_blank">
        	<?=$r['trendName']?>&nbsp&nbsp&nbsp
                    [<?=$r['time']?>]
        </a>
        <br /><br />
        <?php endforeach; ?>
        <div align="center"><?=$page?></div>
</div>
</div>
</div>
</div>
</div>

