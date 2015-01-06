<div class="pr_right">
    	<div class="tit"><?=$title?></div>
        <div class="pr_bj">
        	<?php if(is_array($trend)) foreach($trend as $r):?>

        <a id="" href="<?=base_url()?>index.php/outside/trend/detail/<?=$r['trendId']?>" target="_blank">
        	<?=$r['trendName']?>[<?=$r['time']?>]
        </a>
        <br /><br />
        <?php endforeach; ?>
        <div align="center"><?=$page?></div>
        </div>
    </div>

