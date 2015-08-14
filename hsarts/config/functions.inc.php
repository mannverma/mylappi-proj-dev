<?php //$root = 'http://localhost/iglowtiles/';
ob_start();
error_reporting(0);
session_start();
$sess_id=session_id();
$site_title="HS Arts";
if($_SERVER['HTTP_HOST']=="localhost"||$_SERVER['HTTP_HOST']=="127.1.1.0")
{

    $siteurl="http://localhost/hsarts/";

    $DB["dbName"] =  'hsarts';   

	$DB["host"] = 'localhost'; 

	$DB["user"] = 'root';

	$DB["pass"] = ''; 

}

else

{

//Online

$siteurl="http://www.megatronpowerplants.com/";

	$DB["dbName"] =  'megatron_db';   

	$DB["host"] = 'localhost'; 

	$DB["user"] = 'megatron_db';

	$DB["pass"] = 'M123456'; 

	$local_mode = false;

}



	



   $My_Host="http://".$_SERVER["HTTP_HOST"];

   $My_Host_Dir="";

   $My_Path="";

   $My_DBF['host']=$DB["host"];

   $My_DBF['user']=$DB["user"];

   $My_DBF['passwd']=$DB["pass"];

   $My_DBF['name']=$DB["dbName"];

   $My_DBF['debug']=1;//0-nodebug;1-screen;2-email;

   $debug_sendmail=false;

   $link = mysql_connect($DB["host"], $DB["user"], $DB["pass"]) or die("<span style='FONT-SIZE:11px; FONT-COLOR: #000000; font-family=tahoma;'><center>An Internal Error has Occured. Please report following error to the webmaster.<br><br>".mysql_error()."'</center>");

mysql_select_db($DB["dbName"]);



function executeQuery($sql)

{

	$result = mysql_query($sql) or die("<span style='FONT-SIZE:11px; FONT-COLOR: #000000; font-family=tahoma;'><center>An Internal Error has Occured. Please report following error to the webmaster.<br><br>".$sql."<br><br>".mysql_error()."'</center></FONT>");

	return $result;

} 





function getSingleResult($sql)

{

	$response = "";

	$result = mysql_query($sql) or die("<center>An Internal Error has Occured. Please report following error to the webmaster.<br><br>".$sql."<br><br>".mysql_error()."'</center>");

	if ($line = mysql_fetch_array($result)) 

	{

		$response = $line[0];

	} 

	return $response;

} 



function sort_arrows($column){

	global $_SERVER;

	return '<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'asc')).'"><IMG SRC="images/uparrow.png" WIDTH="9" HEIGHT="7" BORDER="0"></A> <A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2'), array($column,'desc')).'"><IMG SRC="images/downarrow.png" WIDTH="9" HEIGHT="7" BORDER="0"></A>';

}

function sort_arrows1($column){

	global $_SERVER;

	return '<A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2','date','short'), array($column,'asc',$_REQUEST['date'],yes)).'"><IMG SRC="img/uparrow.png" WIDTH="9" HEIGHT="7" BORDER="0"></A> <A HREF="'.$_SERVER['PHP_SELF'].get_qry_str(array('order_by','order_by2','date','short'), array($column,'desc',$_REQUEST['date'],yes)).'"><IMG SRC="img/downarrow.png" WIDTH="9" HEIGHT="7" BORDER="0"></A>';

}

function Filter($string)

{

$string = str_replace(" & ",'&amp;',$string);

return ucfirst(trim(stripslashes($string)));

}

function Filter_Add($string)

{

 return addslashes(trim($string));

}

function get_qry_str($over_write_key = array(), $over_write_value= array())

{

	global $_GET;

	$m = $_GET;

	if(is_array($over_write_key)){

		$i=0;

		foreach($over_write_key as $key){

			$m[$key] = $over_write_value[$i];

			$i++;

		}

	}else{

		$m[$over_write_key] = $over_write_value;

	}

	$qry_str = qry_str($m);

	return $qry_str;

} 

function qry_str($arr, $skip = '')

{

	$s = "?";

	$i = 0;

	foreach($arr as $key => $value) {

		if ($key != $skip) {

			if ($i == 0) {

				$s .= "$key=$value";

				$i = 1;

			} else {

				$s .= "&amp;$key=$value";

			} 

		} 

	} 



	return $s;

} 

function ms_stripslashes($text)

{

	if (is_array($text)) {

		$tmp_array = Array();

		foreach($text as $key => $value) {

			$tmp_array[$key] = ms_stripslashes($value);

			//echo($tmp_array[$key]);

		} 

		//ms_print_r($tmp_array);

		return $tmp_array;

	} else {

		return stripslashes($text);

	} 

} 

function ms_addslashes($text)

{

	if (is_array($text)) {

		$tmp_array = Array();

		foreach($text as $key => $value) {

			$tmp_array[$key] = ms_addslashes($value);

		} 

		return $tmp_array;

	} else {

		return addslashes(stripslashes($text));

	} 

}





 

 function Filter_Link($Text)

{

$Text=stripslashes(trim($Text));

$Text=str_replace(" ","-",$Text);

$Text=str_replace('"','',$Text);

$Text=str_replace(',','',$Text);

$Text=str_replace('.','',$Text);

$Text=str_replace('/','-',$Text);



$Text=str_replace("&amp;","",$Text);

$Text=str_replace("&","",$Text);

$Text=str_replace("?","",$Text);

$Text=str_replace("%","",$Text);

$Text=str_replace("---","-",$Text);

$Text=str_replace("--","-",$Text);

$Text=strtolower(urlencode($Text));

if($Text=="") { $Text="--------";}

return $Text;

}

function Filter_Print($Text)

{

$Text=stripslashes(trim($Text));

$Text=str_replace("-"," ",$Text);

$Text=str_replace(".html","",$Text);

if($Text=="") { $Text="--------";}

return $Text;

}



function is_valid_user()

{
}
?>