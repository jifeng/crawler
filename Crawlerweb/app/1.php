<?php

$article = getArticles();

//print_r($article);



?>




<html> 
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=gbk"> 
        <title>爬虫</title> 
        <link rel="stylesheet" type="text/css" href="../ext/resources/css/ext-all.css" /> 
        <script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script> 
        <script type="text/javascript" src="../ext/adapter/jquery/ext-jquery-adapter.js"></script> 
        <script type="text/javascript" src="../ext/ext-all.js"></script> 
    
            
    <script type="text/javascript">     		
Ext.onReady(function(){
 
    var con = new Ext.Panel({
        region: 'center',
        margins:'3 3 3 0',
        defaults:{autoScroll:true},
	   layout: 'accordion',
		layoutConfig: {
			titleCollapse: true,
			animate: true,
			activeOnTop: false
		},
        items:[<?php
		 echo "{title: '".$article[0][5]."',html: '".$article[0][1]."'}";	
		 for($i=1;$i<count($article);$i++){
			echo ",{title: '".$article[$i][5]."',html: '".$article[$i][1]."'}";			
		}?>]
    });
	
	
	
	var win = new Ext.Window({
	title: '欢迎使用此应用！！！<?php echo "当前关键字是：".getHistoryName() ?>',
	plain:true,
	closable:true,
	width:900,
	height:450,
	border:false,
	layout: 'border',

	items: [con]
    });
 
    win.show();
	

});
	
      </script> 
     </head>
     <body>
     
     
     
        
        
        
        
        
        
        
        
        
        
        
        
        
            

      </body> 
      </html> 
        