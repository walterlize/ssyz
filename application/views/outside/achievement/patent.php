<div align="center">
<div class="context">
<div id="detail">
  <div class="detail_border" align="left">
            <div class="detail_title">
                <span id="lbQsmc"><?=$patent->patentName?></span></div>

              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="news">

                  <tr>
                      <td class="job_title">课题<?=$patent->subjectNum?>&nbsp;&nbsp;<?=$patent->subjectName?></td>
                  </tr>
				  <tr>
                      <td class="catelogy">专利简介</td>
                  </tr>
                  <tr>
                      <td class="td"><?=$patent->patentName?>.专利号：<?=$patent->patentNum?>. 专利类型：<?=$patent->type?>. 状态：<?=$patent->patentState?></td>
                  </tr>
                  <tr>
                      <td class="catelogy">完成单位</td>
                  </tr>
                  <tr>
                      <td class="td">完成单位：<?=$patent->workplace?></td>
                  </tr>
                  <tr>
                      <td class="td">完成人：<?=$patent->author?></td>
                  </tr>
                  <tr>
                      <td class="catelogy">时间</td>
                  </tr>
                  <tr>
                      <td class="td">申报日期：<?=$patent->applyTime?></td>
                  </tr>
                  <tr>
                      <td class="td">授权日期：<?=$patent->authorizeTime?></td>
                  </tr>
              </table>
              </div>
  </div>
    </div>
    </div>