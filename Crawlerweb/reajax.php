<?php

include "config.php";

if(!empty($_GET["category"])){


$modelArray=getconf("crawler_model_category"," where category_id = '".$_GET["category"]."'");
//print_r($modelArray);
for($i=0;$i<count($modelArray);$i++){

$modelArray[$i]["model_name"]=iconv("GBK","UTF-8",$modelArray[$i]["model_name"]);


}
//print_r($modelArray);
$modelJson=json_encode($modelArray);


//print_r($modelArray);

echo $modelJson;

}




if(!empty($_GET["isf"])){


if($_GET["isf"]==1){
	//echo "hnjkjkb".$_GET[key].$_GET[username].$_GET[pwd].$_GET[model_class];

if(!empty($_GET[key])){

mysql_query("INSERT INTO crawler_history (`history_id`,`history_key`,`category_id`,`isdown`) VALUES (NULL,'".$_GET[key]."','".$_GET[cid]."','0')");

$insertid=mysql_insert_id();

system('cmd /c java com.nupt.main.CrawlerMain '.$_GET[model_class].' '.$insertid.' '.$_GET[key]);//调用爬虫

echo "<&&>".$insertid;

}else{


mysql_query("INSERT INTO crawler_history (`history_id`,`history_key`,`category_id`,`isdown`) VALUES (NULL,'".$_GET[username]."','".$_GET[cid]."','0')");
$insertid=mysql_insert_id();
system('cmd /c java com.nupt.main.CrawlerMain '.$_GET[model_class].' '.$insertid.' '.$_GET[username].' '.$_GET[pwd]);//调用爬虫

echo "<&&>".$insertid;
}



}else if($_GET["isf"]==2){

//$isdownarray=getconf("crawler_history"," where history_id in (select max(history_id) from crawler_history)");
$isdownarray=getconf("crawler_history"," where history_id = ".$_GET['insid']);
echo $isdownarray[0][isdown];

}







}









?>
