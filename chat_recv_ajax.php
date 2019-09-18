<?php
/*
08/08/2019 Edited by Sarawut L.
Original from Sunil Kumar P
Chat Application in PHP(codeproject.com)

ความผิดพลาดของ Ajax ทำงานกับ PHP 5.3, MySQL character_set_system เป็น UTF-8, ฐานข้อมูลที่เก็บเป็น TIS-620 
ต้องใช้ iconv
$var_output = iconv("TIS-620", "UTF-8", $var_input);
หรือ
$var_output = iconv("TIS-620", "UTF-8//TRANSLIT", $var_input);

SQL create table:
create table chat( id bigint AUTO_INCREMENT,username varchar(20), 
chatdate datetime,msg varchar(500), primary key(id));
*/
     require_once('dbconnect.php');

     db_connect();
    
     $sql = "SELECT id, username, chatdate, msg, date_format(chatdate,'%d-%m-%Y %r') as cdt from chat order by ID desc limit 200";
     $sql = "SELECT id, username, chatdate, msg, cdt FROM (" . $sql . ") as ch order by ID";
     $result = mysql_query($sql) or die('Query failed: ' . mysql_error());
     
     // Update Row Information
     $msg="<table border='0' style='font-size: 10pt; color: blue; font-family: tahoma, verdana, arial;'>";
     while ($line = mysql_fetch_array($result, MYSQL_ASSOC))
     {
			$tmp = iconv("TIS-620", "UTF-8", $line["msg"]);
			$msg = $msg . "<tr><td>" . $line["cdt"] . "&nbsp;</td>" .
                "<td>" . $line["username"] . ":&nbsp;</td>" .
                "<td>" . $tmp . "</td></tr>";
     }
     $msg=$msg . "</table>";

     echo $msg;

?>





