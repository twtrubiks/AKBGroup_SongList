<html>
<body>
<head>
<title>Confirm</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?php

function check_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

echo '收到收到收到:'.$_POST['data'][0].'<br>';
//print_r($_POST);

//使用GET傳到PHP的變數會存在一個名為$_GET的變數中，而這一個變數是一個陣列
//$val=explode(",",$_GET['val']);  //分割字串
/*$today=$val[0];  //清除字串前後空白
$today_array=explode(" ",$today);  //分割字串
$Area=$today_array[7];*/

$Area='('.check_input($_POST['data'][0]).')';

$hour=check_input($_POST['data'][1]);


$minute_temp=check_input($_POST['data'][2]);
if((int)$minute_temp<10)
{
$minute="0".$minute_temp;
}
else
{
$minute=$minute_temp;
}


//echo 'hour:'.$val[1];
$uid=$_POST['data'][3];
//echo 'uid:'.$uid;
$str=$_POST['data'][4];
//echo $str;
$src=$_POST['data'][5];
//echo $src;
$talk=$_POST['data'][6];
//echo $talk;
if($uid)
{
$fp = fopen('output/output.txt', 'a');  //開啟檔案以供新增內容，接續在目前已有的內容之後開始，如果檔案不存在，則建立一個新檔案．
fwrite($fp, $hour); //fwrite() 返回寫入的字符數
fwrite($fp, "*");
fwrite($fp, $minute.'<br />'.$Area);
fwrite($fp, "*");
fwrite($fp, $uid);
fwrite($fp, "*");
fwrite($fp, $str);
fwrite($fp, "*");
fwrite($fp, $src);
fwrite($fp, "*");
fwrite($fp, $talk);
fwrite($fp, "\n");
fclose($fp);
}

?>

<!--	
<table id="mytable" border="0" cellspacing="0" cellpadding="3" summary="file table" class="fancy centered">

<tr>
	<th><b>Order Time(h:m)</b></th>
	<th><b>ID</b></th>
	<th><b>Song</b></th>
	<th><b>Source</b></th>
</tr>
<tr>
	<td style="text-align: left"><? echo $hour;?>:<?echo $minute; ?>&nbsp;</td>
	<td style="text-align: left"><? echo $uid; ?>&nbsp;</td>
	<td style="text-align: left"><? echo $str; ?>&nbsp;</td>
	<td style="text-align: left"><? echo $src; ?>&nbsp;</td>
	
</tr>

</table>
    
	
<DIV align=center><INPUT TYPE=button VALUE="Home" onclick="javascript:back_home()">
<INPUT TYPE=button VALUE="To List" onclick="javascript:to_list()"></DIV>   -->
</body>
</html>