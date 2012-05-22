<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27356320-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div id="baseUrl"><?php echo Yii::app()->request->baseUrl;?></div>
<div id="headerWrapper">
<a id="logo" title="首页" href="<?php echo Yii::app()->request->baseUrl;?>/bulletin/list">托个行李 | 海外华人行李托带网 tuogexingli.com</a>
<div id="logoText"><strong>海外华人行李托带网</strong> - tuogexingli.com</div>
<div id="explainBlock">
	<div id="explainKeTuo">邮寄太烦 代购太贵 - 【求托】</div>
	<div id="explainQiuTuo">交个朋友 赚点小钱 - 【可托】</div>
</div>
<div id="topRight">
	<div id="topLinks">
	<a href="#">推荐朋友</a>
	<a href="#">关于</a>
	<a href="#">帮助</a>
	<a href="#">声明</a>
	<a href="#">联系我们</a>
	<a id="facebookIcon" href="http://www.facebook.com/pages/%E6%89%98%E4%B8%AA%E8%A1%8C%E6%9D%8E-%E6%B5%B7%E5%A4%96%E5%8D%8E%E4%BA%BA%E8%A1%8C%E6%9D%8E%E6%89%98%E5%B8%A6%E7%BD%91-tuogexinglicom/143959745707824" title="我们的Facebook主页"></a>
	<a id="weiboIcon" href="http://www.weibo.com/tuogexingli" title="我们的新浪微博"></a>
	</div>
	<a id="createPost" title="发个帖子" href="<?php echo Yii::app()->request->baseUrl?>/bulletin/create"></a>
	<div id="createPostText">互助   免费   便捷  无需注册   </div>
</div>
</div>


<div id="wrapper">
<!--
<?php
//if (Zend_Controller_Front::getInstance()->getRequest()->getControllerName()== "bulletin" 
//	&& (Zend_Controller_Front::getInstance()->getRequest()->getActionName()=="list" || Zend_Controller_Front::getInstance()->getRequest()->getActionName()=="view" )){?>
<div class="contentWrapper" id="searchContent">
<div class="contentHeader">
<div class="contentlt"></div>
<div class="contentt"></div>
<div class="contentrt"></div>
</div>

<div class="content">


<div class="contentInner">

<?php 
//echo $this->searchForm;
?>
	


</div>
</div>

<div class="contentFooter">
<div class="contentlb"></div>
<div class="contentb"></div>
<div class="contentrb"></div>
</div>
</div>

<?php //}?>
-->
<div class="contentWrapper" id="mainContent">
<div class="contentHeader">
<div class="contentlt"></div>
<div class="contentt"></div>
<div class="contentrt"></div>
</div>

<div class="content">
<div class="contentInner">

<?php 

echo $content;

?>
</div>
</div>

<div class="contentFooter">
<div class="contentlb"></div>
<div class="contentb"></div>
<div class="contentrb"></div>
</div>


<div id="footer" style="width:945px;">
<div style="float:left;">© 2011 tuogexingli.com, All Rights Reserved </div>
</div>

</div>
</div>
</body>

<script type="text/javascript" src=<?php echo Yii::app()->request->baseUrl; ?>"/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src=<?php echo Yii::app()->request->baseUrl; ?>"/js/date.js"></script>
<script type="text/javascript" src=<?php echo Yii::app()->request->baseUrl; ?>"/js/jquery.datePicker.js"></script>
<script type="text/javascript" src=<?php echo Yii::app()->request->baseUrl; ?>"/js/jquery.validate.min.js"></script>
<script type="text/javascript" src=<?php echo Yii::app()->request->baseUrl; ?>"/js/jquery.cookie.js"></script>
<script type="text/javascript" src=<?php echo Yii::app()->request->baseUrl; ?>"/js/list.js"></script>
<script type="text/javascript">
var $ = jQuery.noConflict();
$(document).ready(function() {
$baseUrl=$("#baseUrl").text();  

    

    //live change doesn't work in ie jquery 1.4.2

    $("#from_country,#to_country").bind("change",function(){

    	$formId = $(this).parents("form").attr("id");

    	$which_country = $(this).attr("id").replace("_country","_city");

    	

    	$.ajax({

    		  url: $baseUrl+ '/bulletin/citylistajax',

    		  type: 'post',

    		  dataType: 'json',

    		  async: false,

    		  data: ({countryId : parseInt($(this).val())}),

    		  success: function(data) {

    			if(data.exist) {

    				$("form[id='"+$formId+"']").find("[id='"+$which_country+"']").empty().append(data.list);

    			} else {

    				$("form[id='"+$formId+"']").find("[id='"+$which_country+"']").empty();

    			}

    		  }});   

    

    });

}); 

</script>

</html>
