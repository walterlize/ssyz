<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee"> 汇款/支票单详情</div>
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1"><div align="left">申请类别：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->type ?></div>
                </td>
                <td class="td1"><div align="left">收款单位：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->b_name ?></div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">开户行：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->bank_name ?></div>
                </td>
                <td class="td1"><div align="left">银行账号：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->b_num ?></div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">经费类别：</div></td>
                <td class="td3"><div align="left"><?= $borrow->borrowType ?>&nbsp;&nbsp;&nbsp;&nbsp;详情：<?= $borrow->borrowDetail ?>
                    </div> </td>
                <td class="td1"><div align="left">经费类别：</div></td>
                <td class="td3"><div align="left"><?= $borrow->money ?> 元
                    </div> 
                </td>
            </tr>   
          <!--  <tr>
                <td class="td1"><div align="left">上传附件（合同）：</div></td>
                <td class="td3" colspan="3"> 
                    <div align="left"><a href="<?= base_url() ?>index.php/download/downloadfile/<?= $borrow->upload_date ?>/<?= $borrow->upload ?>"><?= $borrow->upload ?></a>
                    </div> </td>
            </tr>-->
            <tr>
                <td class="td1"><div align="left">其他信息（可上传附件）：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $borrow->description ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="td3" align="center">
                    <input onclick="javascript:window.close()" type="button"value="关 闭" class="input">
                </td>
            </tr>
        </table>
   </div>