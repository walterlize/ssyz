<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee"><?php if(isset($title)) echo $title;?></div>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px"><?php if(isset($title)) echo $title;?></td>
            <td class="td2" ><?php if (isset($project->content)) echo $project->content; ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href = '<?= base_url() ?>index.php/admin/project/projectEdit/<?php if (isset($project->id)) echo $project->id; ?>';" id="btnEdit" class="input" />
            </td>
        </tr>
    </table>
</div>