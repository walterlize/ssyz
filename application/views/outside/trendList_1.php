<div class="zhuti2">
<div class="zhuti21"><?=$title?></div>
<br />
<div align="left" style="width:90%" class="titleLink">
	<?php if(is_array($trend)) foreach($trend as $r):?>

        <a id="" href="<?=base_url()?>index.php/head/trend/detail/<?=$r['trendId']?>" target="_blank">
        	<?=$r['trendName']?>[<?=$r['time']?>]
        </a>
        <br /><br />
        <?php endforeach; ?>
        <div align="center"><?=$page?></div>
</div>
</div>
</div></div>

