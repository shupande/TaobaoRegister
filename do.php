<?php
require_once '../sz/include.php';

	//获取SESSION里面存着的微信用户数据
   	$user_obj=json_decode($_SESSION['user'],true);

 	//分解
   	$nickname=$user_obj['nickname'];
   	$openid=$user_obj['openid'];
	$phoneNumber=$_POST['phoneNumber'];
	$business=$_POST['business'];
	$pickDate=$_POST['pickDate'];
	
 	//判断性别
 	//$sex=($user_obj['sex']=="1")?"男":(($user_obj['sex']=="2")? "女":"未知") ;
   	$avatar=$user_obj['headimgurl'];

	mysql_query("INSERT INTO `taobao_register` (create_time,nick_name,open_id,avatar,phone_number,business,register_time)
	  VALUES (CURRENT_TIMESTAMP,'".$nickname."','".$openid."','".$avatar."','".$phoneNumber."','".$business."','".$pickDate."')");

	echo mysql_affected_rows();
	

?>

