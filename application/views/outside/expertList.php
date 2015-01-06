<div class="zhuti2">
<div class="zhuti21"><?=$title?></div>
<br />
<div align="left" style="width:90%">
	<?php if(is_array($expert)) foreach($expert as $r):?>
        <div><font size="+1">专家姓名：<?=$r['name']?></font></div>
        <div style="margin-left:40px">
        	<div>工作单位：<?=$r['firm']?></div>
            <div>参与课题：<a id="" href="<?=base_url()?>index.php/outside/subject/subjectDetail/<?=$r['subjectId']?>" target="_blank"><?=$r['subjectName']?></a></div>
        </div>
        <br />
   <?php endforeach; ?>
        <div align="center"><?=$page?></div>
</div>
</div>