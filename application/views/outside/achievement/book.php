<div align="center">
<div class="context">
<div id="detail">
  <div class="detail_border" align="left">
            <div class="detail_title">
                <span id="lbQsmc"><?=$book->bookName?></span></div>

              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="news">

                  <tr>
                      <td class="job_title">课题<?=$book->subjectNum?>&nbsp;&nbsp;<?=$book->subjectName?></td>
                  </tr>
				  <tr>
                      <td class="catelogy">论著简介</td>
                  </tr>
                  <tr>
                      <td class="td"><?=$book->bookName?>.出版社：<?=$book->publication?>. 出版时间：<?=$book->time?>. 论著类型：<?=$book->type?></td>
                  </tr>
                  <tr>
                      <td class="catelogy">主编</td>
                  </tr>
                  <tr>
                      <td class="td">主编：<?=$book->chiefEditor?></td>
                  </tr>
                  <tr>
                      <td class="td">主编单位：<?=$book->editorWorkplace?></td>
                  </tr>
                  <tr>
                      <td class="catelogy">副主编</td>
                  </tr>
                  <tr>
                      <td class="td"><?=$book->associateEditor?></td>
                  </tr>
                  <tr>
                      <td class="catelogy">参编</td>
                  </tr>
                  <tr>
                      <td class="td"><?=$book->superviseEditor?></td>
                  </tr>
              </table>
              </div>
  </div>
    </div>
    </div>