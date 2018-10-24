<?php
require_once '../sz/include.php';



	$sql="select create_time,nick_name,open_id,phone_number,business,register_time from taobao_register LIMIT 0 , 30";


	$result = mysql_query($sql);

	while( $data = mysql_fetch_assoc($result) ){
              $list[]=$data;
            }

    echo json_encode($list,128);



?>