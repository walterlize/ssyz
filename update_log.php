<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 15-7-4
 * Time: 下午11:08
 */
/*--------------------------------------*/
/*
 * Author:walter
 * Date:20150704
 * Version:2.0

1.修复了所有的分类查询显示分页的错误。取消了其分页设置。
2.download下了最新的数据库。修改了借款管理银行账户位数不足导致的溢出。
3.修复了所有的查询模式。

*/

/*---------------------------------------*/
/*
 *
 * Author:walter
 * Date:2050908
 * Version:2.1


1、修复了普通用户 课题花费详情 的按年度、月度、经费类型 的查询。修改了按金额查询出现的sum函数失效的问题。
2、修复了普通管理员 下 经费审核--》汇款 支票审核管理审核通过，点击查看详情空白的问题。
3、优化了普通管理员下 课题经费管理的课题总经费执行以及子课题经费汇总的经费列表展示形式。
4、增加了普通管理员下 借款报销管理的查看详情。
5、修复了普通用户借款管理填写银行账号时长度不足溢出。将单纯的数字改为varchar防止有“-”等特殊字符。（需要修改服务器端的数据库）
6、修复了普通用户差旅费按金额查询出现的错误。



 */

/*
 * Author:walterlize
 * Date:20150922
 * Version:2.2
 *1、 修复了首页 more显示的问题。屏蔽了左侧导航栏
 *2、 重新设计了foot
 */

/*
 * Author:walterlize
 * Date:20151004
 * Version:2.4
 *1、 新建了首页的 研究成果，设计了css。
 *2、 修复了后台的研究成果的页面，重新设计了论文详情。
 *3、 新建了首页的政策规定页面，用于显示后台的政策规定。
 *4、 修复了一些小bug
 */

/*
 * Author:walterlize
 * Date:20151005
 * Version:2.5
 *1、 新建了课题管理员的工作月报与工作简报功能；
 *2、 修复了子课题管理员的工作月报与工作简报功能。

 *3、 修复了一些小bug
 */

/*
 * Author:walterlize
 * Date:20151111
 * Version:2.5.1
 *1、 修改了detail的展示方式

 */

/*
 * Author:walterlize
 * Date:20151112
 * Version:2.5.2
 *1、 修改列表的展示的方式 使之更加人性化

 */
/*
 * Author:walterlize
 * Date:20151212
 * Version:2.6
 * ------------------------------------------
 * 1.更改了研究成果与政策规定的样式,使之基本的风格统一
 * 2.更改了研究成果链接的风格,使点击之后颜色不发生变化.
 * 3.修改论文页面,使得其不能全文下载.
 * 4.修复子课题查询方式
 * 5.更正劳务费显示的bug
 * 6.增加了普通用户填写论文/专利等
 * 7.删除了ordinary里面的
 *
 *
 * */
/*
 * Author:walterlize
 * Date:20160105
 * Version:2.7
 * ------------------------------------------
 * 1.修改了成果管理是普通课题管理员可以上传课题成果.
 * 2.修改了成果视图,加入了inherit与subjectUnit
 *
 *
 *
 * */
/*
 * Author:walterlize
 * Date:20160106
 * Version:3.0
 * ------------------------------------------
 * 1.修复了一下bug可以上线了
 *
 *
 *
 * */