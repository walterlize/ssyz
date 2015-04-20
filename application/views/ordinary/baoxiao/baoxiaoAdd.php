<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!--  <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>设施养殖数字化智能管理技术设备研究</title>
          <link href="<?= base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
          <script src="<?= base_url(); ?>calender/WdatePicker.js" type="text/javascript"></script>
          <script src="<?= base_url(); ?>javascript/jquery.js" type="text/javascript"></script>
          <script src="<?= base_url(); ?>javascript/validation.js" type="text/javascript"></script>
          <script src="<?= base_url(); ?>javascript/levelselect.js" type="text/javascript"></script>
          <script src="<?= base_url(); ?>javascript/common.js" type="text/javascript"></script>
          <script src="<?= base_url(); ?>kindeditor/kindeditor.js" type="text/javascript"></script>
          <script src="<?= base_url(); ?>kindeditor/lang/zh_CN.js" type="text/javascript"></script>
          <script type="text/javascript" src="<?= base_url(); ?>javascript/jquery.uploadify.min.js"></script>
  
          <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>css/uploadify.css" />
      </head>-->
    <div style="margin-left:20px; margin-right:20px" id="content">
        <br/>
        <div class="title_lee"><?= $title ?></div>
        <form name="form2" method="post" action="<?= base_url() ?>index.php/ordinary/baoxiao/baoxiaoSave" id="form2">
            <input type="hidden" name="bao_id" id="bao_id" value="<?= $bao_id ?>" />
            <input type="hidden" name="s_id" id="s_id" value="<?= $s_id ?>" />
            <input type="hidden" name="mc_id" id="mc_id" value="<?= $mc_id ?>" />
            <input type="hidden" name="m_type" id="m_type" value="1" />
            <input type="hidden" name="state" id="state" value="1" />
            <table cellpadding="0" cellspacing="1" class="tablist2">
                <tr>
                    <td class="td1"align="left">类别:</td> 
                    <td class="td2" align="left"><select name="type" id="type">
                            <?php foreach ($type1 as $r): ?>
                                <option value="<?= $r ?>"
                                <?php
                                if (isset($type) && $r == $type)
                                    echo 'selected';
                                else
                                    echo '';
                                ?>
                                        >
                                            <?= $r ?>
                                </option>
                            <?php endforeach; ?>
                        </select>  

                    </td>    
                    <td class="td1">类别详情：</td>
                    <td class="td2" ><input type="text" name="baoxiaoDetail" id="baoxiaoDetail" value="<?= $baoxiaoDetail ?>" size="20" />
                    </td>

                </tr>

                <tr>
                    <td class="td1">发票张数：</td>
                    <td class="td2"><input name="num" type="text" id="num" value="<?= $num ?>" class="RegInput"  isRequired="true" validEnum="Int" />&nbsp;张
                        <font color="red">*</font><span id="numMsg" class="MsgHide">发票张数必须填写且必须为整数！</span> </td>
                    <td class="td1">发票总金额：</td>
                    <td class="td2"><input type="text" name="money" id="money" value="<?= $money ?>"size="10"  class="RegInput" isRequired="true" validEnum="Double" />&nbsp;元
                        <font color="red">*</font><font color="blue">可精确到小数点后两位</font><span id="moneyMsg" class="MsgHide">发票总金额格式有误！</span></td>
                </tr>
                <tr>
                    <td class="td1">报销人：</td>
                    <td class="td2" colspan="3"><input name="baoxiao_name" type="text" id="baoxiao_name" value="<?= $baoxiao_name ?>" class="RegInput" />&nbsp;

                </tr>


                <tr>
                    <td class="td1" style="width: 111px">备注信息：</td>
                    <td class="td2" colspan="3">
                        <script type="text/javascript">
                            KindEditor.ready(function (K) {
                                var editor1 = K.create('textarea[name="description"]', {
                                    cssPath: '<?= base_url() ?>kindeditor/plugins/code/prettify.css',
                                    uploadJson: '<?= base_url() ?>kindeditor/php/upload_json.php',
                                    fileManagerJson: '<?= base_url() ?>kindeditor/php/file_manager_json.php',
                                    allowFileManager: true,
                                    afterCreate: function () {
                                        var self = this;
                                        K.ctrl(document, 13, function () {
                                            self.sync();
                                            K('form[name=content]')[0].submit();
                                        });
                                        K.ctrl(self.edit.doc, 13, function () {
                                            self.sync();
                                            K('form[name=content]')[0].submit();
                                        });
                                    }
                                });
                                prettyPrint();
                            });
                        </script>
                        <textarea name="description" id="description" style="visibility:hidden; width:80%; height:200px;"><?= $description ?></textarea>
                    </td></tr>
              <!--  <script language="javascript">
                    function my_submit() {
                        document.form1.submit();
                        document.form1.submit1.disabled = true;
                    }
                </script>-->
                <tr>
                    <td colspan="4" class="td3" align="center">
                        <input type="submit" name="btnSave" value="保存" onclick="return check_base('form2') && confirm('确认并存为草稿?然后您可以继续填写报销申请，并在确定填写完毕后提交报销申请。');" id="btnAdd"class="input"  />
                        <input type="button" name="cancel" value="取 消" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnSave"class="input"/> 
                </tr>
            </table>
        </form>
    </div>