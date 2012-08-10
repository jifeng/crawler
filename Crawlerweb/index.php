<?php

include "config.php";






/***************************上传模版类处理******************************/





if(!empty($_GET["up"]))
{


if(!empty($_POST["model_name"])){

 mysql_query("INSERT INTO crawler_model_category (`model_id`,`category_id`,`model_name`,`model_class`) VALUES (NULL,'".$_POST["category_id"]."','".$_POST["model_name"]."','".$_POST["model_class"]."')");

}
if(!empty($_FILES[upfile][name])){
					/*************************/
						   $filepath="com/nupt/model/upload/";//存放上传的文件夹

							$filename=$filepath.$_FILES[upfile][name];

							if(copy($_FILES[upfile][tmp_name],$filename))
							{
								// echo $filename;
								unlink($_FILES[upfile][tmp_name]);
							  echo "导入成功<br>二秒后自动跳转";
					          echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\">";


	                        }
							else{
							  echo "导入失败<br>二秒后自动跳转";
					          echo "<meta http-equiv=\"refresh\" content=\"2;url=index.php\">";
							}
 }




exit(0);

}

?>






<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=gbk"> 
        <title>爬虫</title> 
        <link rel="stylesheet" type="text/css" href="ext/resources/css/ext-all.css" /> 
        <script type="text/javascript" src="js/jquery-1.5.1.min.js"></script> 
        <script type="text/javascript" src="ext/adapter/jquery/ext-jquery-adapter.js"></script> 
        <script type="text/javascript" src="ext/ext-all.js"></script> 
        
        <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
        <script src="js/comsenz.js" type="text/javascript"></script>
        
        
		<style type="text/css">
        .top{
        font-size:16px;
        font-family:"宋体";
        font-weight:bold;
        text-align:center;
        color:#FF0000;
        }
        
        .pai{
        width:100%;
        text-align:center;
        }
        .pai td{
        font-family:"宋体";
        }
        
        .inp{
            display:none;
        }
		
		.usemodelclass{
			
			margin-left:20px;
			font-family:Verdana, Geneva, sans-serif;
			font-size:16px;
			color:#09F;	
			
		}
        </style>
    
        
        
        
        
        <script type="text/javascript"> 
		
		var str1;

function get(str1){
//alert("wwww"+str1);
$.get("reajax.php?isf=2&insid="+str1+"&temp="+Math.random(),{}, function(data){

//alert(data);
if(data=="1"){

clearInterval(My);

window.location.href="app/index.php?id="+str1;

}


});


}

function startF(theForm)
{
		
	 var urltemp="";//获取所有的模版类名以，号分割
	
	$("input[name='model_class']").each(function(){
		 if($(this).attr("checked")==true){
			 
		  urltemp += "."+$(this).attr("value");
		 }
	 });
	
	var urlstr="reajax.php?isf=1&key="+$("#key").val()+"&username="+$("#username").val()+"&pwd="+$("#pwd").val()+"&cid="+$("#cid_one").val()+"&model_class="+urltemp+"&temp="+Math.random();
//alert(urlstr);	
	
$.get(urlstr,{}, function(data){

str1 = data.substring(data.indexOf("<&&>")+4,data.length);
//alert(str1);

});
$("#prossbar").show();
Ext.Msg.alert('提示消息框','正在分析请稍候。。。。');
My = setInterval("get(str1)",1000);


}


function sechange(){
var cid = $("#cid_one").val();







$(".inp").children().val("");
/******ajax请求********/

$.get("reajax.php?category="+cid+"&temp="+Math.random(),{}, function(data){
 // alert("JSON Data: " + data[0].model_name);
//alert(data.length);

$(".usemodelclass").remove();
for(var i=0;i < data.length;i++){

//alert(data[i].model_name);
//$("#use_class").append("<option value='"+data[i].model_class+"' class='semodel'>"+data[i].model_name+"</option>")
$("#usemodel").append("<span  class='usemodelclass'><input name='model_class' type='checkbox' value='"+data[i].model_class+"'>"+data[i].model_name+"</span>");
}


$("#ks").show();

},"json");


/********界面变化******/

if(cid==1){
//alert("11111111111");
$("#key").parent().show("fast",function(){
  $("#username").parent().hide(1000);
  $("#pwd").parent().hide(1000);

 });
$("#modelinfo").html("第一个模型是一些新闻类网站，主要以获取信息为主。");

}else if(cid==2){
$("#key").parent().hide("fast",function(){
  $("#username").parent().show(1000);
  $("#pwd").parent().show(1000);

 });
//alert("2222222222");
$("#modelinfo").html("第二个模型是一些sns，论坛，微薄性质的网站，获取的信息比较多元。");
}else if(cid==3){

//alert("3333333333333");
$("#key").parent().show("fast",function(){
  $("#username").parent().hide(1000);
  $("#pwd").parent().hide(1000);

 });
$("#modelinfo").html("第三个模型主要是指利用一些搜索引擎获取到的结果。"); 
 
}

}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
Ext.onReady(function(){
 
    var con = new Ext.Panel({
        region: 'center',
        margins:'3 3 3 0',
        defaults:{autoScroll:true},
 
        items:[{contentEl:'1'},{contentEl:'2'}]
    });
 
    var nav = new Ext.Panel({
        title: '导航',
        region: 'west',
		split: true,
        width: 200,
        collapsible: true,
        margins:'3 0 3 3',
        cmargins:'3 3 3 3',
		items: [{
			xtype:'button',
			text: 'java爬虫调用',
			listeners:{//添加监听事件 可以结合handler测试这两个事件哪个最先执行
                  "click":function(){
                      // Ext.Msg.alert('提示消息框','测试Button组件：listeners事件！');
                $('#1').show();
				 $('#2').hide();
				
				
                  }
              },
			width:200
		},{
			xtype:'button',
			text: '爬虫模版管理',
			listeners:{//添加监听事件 可以结合handler测试这两个事件哪个最先执行
                  "click":function(){
                      // Ext.Msg.alert('提示消息框','测试Button组件：listeners事件！');
                 $('#2').show();
				 $('#1').hide();
				
                  }
              },
			width:200
		}]
  /**      split: true,
        width: 200,
        collapsible: true,
        margins:'3 0 3 3',
        cmargins:'3 3 3 3',
		items:[{contentEl:'haha',draggable:true},{contentEl:'22',draggable:true}]**/
    });
 
    var win = new Ext.Window({
        title: '欢迎使用爬虫管理系统',
		plain:true,
        closable:true,
        width:900,
        height:450,
        border:false,
        layout: 'border',
 
        items: [nav, con]
    });
 
    win.show();
 
});
        </script> 
    </head> 
    <body> 
     
    
    <div id="1" style="display:block; margin-top:60px;">
   <div id="modelinfo" style=" border:#09F 1px dashed;margin-top:-30px; margin-bottom:30px; font-size:14px;"></div>
    
    <form style="overflow:hidden;">
	 <select name="category_id" id="cid_one" onChange="sechange()">
          <option value=""  selected="selected">请选择查询类型</option>
          <option value="1">类型一</option>
		  <option value="2">类型二</option>
		  <option value="3">类型三</option>
     </select>
    <span class="inp">关键字：<input id="key" type="text" name="key" /></span>
    <span class="inp"> 用户名：<input id="username" type="text" name="username" /></span>
    <span class="inp">  密码：<input id="pwd" type="text" name="pwd" /></span>
<!-- <select name="use_class" id="use_class">
          <option value=""  selected="selected">请选择模版类</option>
          <option value="1" class="semodel">人人网</option>
		  <option value="2" class="semodel">天涯</option>
		  <option value="3" class="semodel">开心</option>
 </select>-->
 
 
 
 
<br><br><br>
请选择需要使用的模版。。。。<br><br><br>
<div id="usemodel">


</div>
<br><br><br>
<input id="ks" type="button" style=" display:none" value="开始分析" onClick="return startF(this)" />
 </form>
 <br>
 <div id="prossbar" style="display:none">正在分析请稍候。。。。。</div>
    
    
    
    </div>
     <div id="2" style="display:none;margin-top:60px;">
     
     <form method="post" ENCTYPE="multipart/form-data" action="index.php?up=1">
	信息源名称：<input type="text" name="model_name" />
    模版类类名：<input type="text" name="model_class" />
	 <select name="category_id">
          <option value=""  selected="selected">请选择所属类型</option>
          <option value="1">类型一</option>
		  <option value="2">类型二</option>
		  <option value="3">类型三</option>
     </select>
  <br><br>   请上传模版类文件：<input name="upfile" type="file" ><br><br>
<input type="submit" value="提交" />
 </form>
     
     
     
     </div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

</body> 
</html> 