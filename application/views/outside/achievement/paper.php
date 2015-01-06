<div align="center">
<div class="context">
<div id="detail">
  <div class="detail_border" align="left">
            <div class="detail_title">
                <span id="lbQsmc"><?=$paper->paperName?></span></div>

              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="news">

                  <tr>
                      <td class="job_title">课题<?=$paper->subjectNum?>&nbsp;&nbsp;<?=$paper->subjectName?></td>
                  </tr>
				  <tr>
                      <td class="catelogy">论文简介</td>
                  </tr>
                  <tr>
                      <td class="td"><?=$paper->author?>.<?=$paper->paperName?>.<?=$paper->publication?>，<?=$paper->year?>，<?=$paper->volume?>(<?=$paper->period?>)：<?=$paper->fromPage?>-<?=$paper->endPage?>.</td>
                  </tr>
                  <tr>
                      <td class="catelogy">论文类型&amp;收录</td>
                  </tr>
                  <tr>
                      <td class="td">类型：<?=$paper->type?>&nbsp;&nbsp;&nbsp;&nbsp;收录：<?=$paper->record?></td>
                      </tr>
                  <tr>
                      <td class="catelogy">第一作者单位</td>
                  </tr>
                  <tr>
                      <td class="td"><?=$paper->authorWorkplace?></td>
                  </tr>
              </table>
              </div>
  </div>
    </div>
    </div>