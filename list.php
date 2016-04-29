<!DOCTYPE html>
<?php
header('refresh: 240;url="list.php"') 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_list.css">
    <script src="js/JavaScript_.js"></script>
    <script src="js/jquery-latest.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <title>list</title>
    <style type="text/css">
            body {
                background-image: url(https://dl.dropboxusercontent.com/u/35685131/%E9%9B%BB%E5%8F%B0WORK/home/all.jpg);
                background-attachment: fixed;
            }
            
            #gotop {
                display: none;
                position: fixed;
                right: 10px;
                bottom: 100px;
                padding: 20px 15px;
                font-size: 20px;
                /*background: #777;*/
                background-image: url(http://i.imgur.com/eYkSSua.jpg);
                background-size: cover;
                color: white;
                cursor: pointer;
            }
        </style>
</head>

<body>
<?php
/*
$val=explode(",",$_GET['val']);
$today=trim($val[0]);
$hour=trim($val[1]);
$minute=trim($val[2]);
$uid=trim($val[3]);
$str=trim($val[4]);
*/
$row = 1;
$fp=fopen("output/output.txt","r");  //從檔案開頭開始讀取檔案
while(! feof($fp))  // 函數檢查是否已到達文件末尾 (eof)
{
    $val[$row-1]=fgetcsv($fp,2048,"*");
    //$num = count($val);  //count()，用來計算陣列中有幾個元素
    //echo "<p> $num fields in line $row: <br /></p>n";
    $hour[$row-1] = $val[$row-1][0];
    $minute[$row-1] = $val[$row-1][1];
    $uid[$row-1] = $val[$row-1][2];
    $str[$row-1] = $val[$row-1][3];
    $src[$row-1] = $val[$row-1][4];
    $talk[$row-1] = $val[$row-1][5];
    /*
    $t_22=$val[0];
    echo "<p> val[$row]:$t_22<br /> </p>n";
    $t_hour=$hour[$row-1];
    echo "<p> hour:$t_hour<br /> </p>n";
    $t_minute=$minute[$row-1];
    echo "<p> minute:$t_minute<br /> </p>n";
    $t_uid=$uid[$row-1];
    echo "<p> uid:$t_uid<br /> </p>n";
    $t_str=$str[$row-1];
    echo "<p> str:$t_str<br /> </p>n";
    $t_src=$src[$row-1];
    echo "<p> src:$t_src<br /> </p>n";
    echo "<p> row=$row<br /> </p>n";
    */
    $row++;
}
fclose($fp);
$row_condition = 1;
$fp_condition=fopen("output/condition.txt","r");  //從檔案開頭開始讀取檔案
while(! feof($fp_condition))  // 函數檢查是否已到達文件末尾 (eof)
{
    $val_condition[$row_condition-1]=fgetcsv($fp_condition,2048,"*");
    $condition[$row_condition-1] = $val_condition[$row_condition-1][0];
    $row_condition++;
}
fclose($fp_condition);
?>
    <br>
    <div id="gotop" title="回到頂端"></div>
    <div align="center">
        <input type="button" class="button" value="Home" onclick="back_home()">
    </div>
    <br>
    <div id="effect">
        <div class="CSSTableGenerator">
            <table>
                <tr>
                    <td><b>Number</b></td>
                    <td><b>Order Time</b></td>
                    <td><b>ID</b></td>
                    <td><b>Song</b></td>
                    <td><b>Source</b></td>
                    <td><b>condition</b></td>
                    <td><b>P.S</b></td>
                </tr>
<?php
$number=1;
$cap = $row;
$cap_condition=$row_condition;
while($row !== 2)
{
    /*echo "<p>!== 2row:$row</p>";
    echo "<p>!== 2cap:$cap</p>";*/   
    echo"<tr>";
    echo    "<td style='text-align:center'>";
    echo    $number;
    echo    "&nbsp;";
    echo    "</td>";
    
    echo"    <td style='text-align:center'>";
    echo $hour[$cap-$row];
    echo    ":";
    echo $minute[$cap-$row];
    echo    "&nbsp;";
    echo    "</td>";
    
    echo    "<td >";
    echo $uid[$cap-$row] ;
    echo    "&nbsp;";
    echo    "</td>";
    
    echo    "<td>";
    echo $str[$cap-$row];
    echo    "&nbsp;";
    echo    "</td>";
    
    echo    "<td >";
    echo $src[$cap-$row];
    echo    "&nbsp;";
    echo    "</td>";
    
    if(strstr($condition[$cap_condition-$row_condition],'Play')){
        echo    "<td style='text-align:center;color:red'> ";
    }
    
    else{
        echo    "<td style='text-align:center;color:blue'>";
    }
    
    echo  $condition[$cap_condition-$row_condition];
    echo    "&nbsp;";
    echo    "</td>";
    echo    "<td style='color:rgb(255,0,255)'>";
    echo    $talk[$cap-$row];
    echo    "&nbsp;";
    echo    "</td>";
    echo     "</tr>";
    
    $number++;
    $row--;
    $row_condition--;
}
?>
            </table>
         </div>
    </div>
    <br></br>
    <div align="center">
        <input type="button" class="button" value="Home" onclick="back_home()">
    </div>
    <br><br><br><br><br><br><br><br>
</body>

</html>