<div align="center" class="titleLink">
        <div class="zhuti">
<div class="zhuti2">
<div class="zhuti21">政策规定文件下载</div>
<br />
<div align="left" style="width:90%" class="titleLink">
	<?php if(is_array($zhengce)) foreach($zhengce as $key=>$r):?>

        <?=$key+1?>、&nbsp<a id="" href="<?=base_url()?>index.php/head/trend/zhengceDetail/<?=$r['z_id']?>" target="_blank">
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

