<?php
/*
08/08/2019 Edited by Sarawut L.
Original from Sunil Kumar P
Chat Application in PHP(codeproject.com)
*/

function db_connect()
{
  date_default_timezone_set("Asia/Bangkok");

  $link = mysql_connect("localhost", "root", "")
            or die('Could not connect: ' . mysql_error());
  mysql_set_charset("tis620", $link);
  mysql_select_db("webtech") or die('Could not select database');
  return true;
}


function quote($strText)
{
    $Mstr = addslashes($strText);
    return "'" . $Mstr . "'";
}


function isdate($d)
{
   $ret = true;
   try
   {
       $x = date("d",$d);
   }
   catch (Exception $e)
   {
       $ret = false;
   }
   echo $x;
   return $ret;
}

 
?>
