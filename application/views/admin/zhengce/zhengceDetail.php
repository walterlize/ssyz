<div style="margin-left:20px; margin-right:20px;">
    <br />
    <div class="title_lee">详情</div>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 111px">标题</td>
            <td class="td2" ><?= $title ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1" style="width: 111px">内容</td>
            <td class="td2" ><?= $content ?>&nbsp;</td>
        </tr>

        <tr>
            <td colspan="2" class="td3" align="center">
                <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href = '<?= base_url() ?>index.php/admin/zhengce/zhengceEdit/<?= $z_id ?>';" id="btnEdit" class="input" />
                <input type="button" name="btnDelete" value="删 除" onclick="window.location.href = '<?= base_url() ?>index.php/admin/zhengce/zhengceDelete/<?= $z_id ?>';" id="btnDelete" class="input" />
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href = '<?= base_url() ?>index.php/admin/zhengce/zhengceList';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
</div>