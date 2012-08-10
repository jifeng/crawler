<html>
<head>
<title>
展示测试
</title>
</head>
<body>
<center>
<?php
require 'DBUtil.php';
//$db=new DBUtil();
//$id=$_GET["id"];
function showFriends()
{
    $db=new DBUtil();
	$result=$db->getFriends("10");
	echo"<table border=1>";
	echo "<tr><td>ID</td><td>好友列表</td><td>好友数</td></tr>";
	while($info=mysql_fetch_array($result))
	{
		echo"<tr>";
       // $query="select * from crawler_contents where history_id='$history_id' AND rc_id=2";
		//$this->result=mysql_query($query);
		echo"<td>shenzhenyuyuyu@gmail.com</td>";
		echo"<td>".$info['content']."</td>";
		//$count = substr_count($info['content'],",");
        //$count=$count+1;
		$count=$db->getFriendsNumber($info['content']);
		echo"<td>".$count."</td>";
        echo"</tr>";
	}
       echo "</table>";
}

function  showArticles()
{
	$db=new DBUtil();
	$result=$db->getArticles("39");
    echo"<table border=1>";
	echo "<tr><td>ID</td><td>标题</td><td>文章</td></tr>";
	while($info=mysql_fetch_array($result))
	{
		echo"<tr>";
		echo"<td>姚明</td>";
		echo"<td>".$info['title']."</td>";
		echo"<td>".$info['content']."</td>";
        echo"</tr>";
	}
	echo"</table>";
}
echo"好友列表：";
showFriends();
echo"<p>";
echo"文章：";
showArticles();
?>
</center>
</body>
</html>