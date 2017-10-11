<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--
<link rel="stylesheet" href="mystyle.css" media="screen" />
-->
<STYLE TYPE="text/css">
body {
  background: rgb(204,204,204); 
}
page[size="A4"] {
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 16px;
  box-shadow: 0 0 8px rgba(0,0,0,0.5);
}
@media print {
  body, page[size="A4"] {
    margin: 0;
    box-shadow: 0;
  }
}

</STYLE>

<link rel="stylesheet" href="mystyle.css" type="text/css" media="screen,print" />
<title>QR Code Preview</title>
</head>

<body>
<?php 
//include  "fun.php"; 
date_default_timezone_set('Asia/Taipei');
//echo $_GET['context'];

function passport_decrypt($txt, $key) { 
$txt = passport_key(base64_decode($txt), $key); 
$tmp = ''; 
for($i = 0;$i < strlen($txt); $i++) { 
$md5 = $txt[$i]; 
$tmp .= $txt[++$i] ^ $md5; 
} 
return $tmp; 
} 

//$key = "privatekey";
$context  = $_GET['context'];
//echo $encrypt;
//$context = passport_decrypt($encrypt,$key);


$rowstr = explode("@@", $context);
//echo count($rowstr);

$ctstail = "CTS COMPONENTS TWIWAN LTD.";
//$r =count($rowstr);
$head = array('SN : ','Po No : ', 'Rel : ', 'Part No : ',
              'Qty : ','Shipping Date : ', 'Vendor No : ', 'Vendor : ');
echo "<Input Type=\"Button\" Value=\"列印\"  text-align:center     onClick=\"javascript:print();\">";
echo "<page size=\"A4\">";
//echo count($rowstr);
if(strpos($rowstr[0],"undefined") >=0)
	$st = count($rowstr)-1;
else
	$st = count($rowstr);
//if($st==1){
//	echo "<table width=\"1500\" border=\"1\">";
//}
//else{
	echo "<table width=\"750\" border=\"1\">";
//}

for($i=1 ; $i < count($rowstr) ; $i++){
//echo $rowstr[$i].'<br>'; 
	if(count($rowstr) >= 1 && $i%2==1){	
	echo "<tr>";
	}
	$rdstr = explode(",", $rowstr[$i]);
	echo "<td>";
	
	//echo $rowstr[$i];
	$arr = explode(",",str_replace("#","%23",$rowstr[$i]));

	for($k=0;$k < 7;$k++){
		//echo $arr[$k];
		if($k == 0)
			$info = $arr[$k];
		else
			$info = $info.",".$arr[$k];
	}
	$info = $info.'**';
		
//echo $info;
	//$info=$rowstr[$i].'**';//$_POST["PartNo"];
	echo "<img  src=\"https://chart.googleapis.com/chart?chs=120x120&cht=qr&chl=" . $info . "&choe=UTF-8\" align=right vspace=\"10\" hspace=\"10\">";
	

	for($j=0 ; $j < count($rdstr) ; $j++){
			//echo '<p>';
			echo '<font size=1 class=p>&nbsp;&nbsp;&nbsp;&nbsp;' . $head[$j].$rdstr[$j].'</font><br>';			
			//echo '</p>';
	}

	
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1 font-weight:bold>'.$ctstail.'</font><BR>';
	//echo $ctstail.'<BR>';
	$datetime = date("Y-m-d H:i:s");
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=1   font-weight:bold>'.$datetime.'</font>'; 
	//echo $datetime;
	echo "</td>";
	if(count($rowstr) >= 1 && $i%2==0){
	echo "</tr>";
	}
//ISO-8859-1
}
echo "</table>";
echo "</page>";
?>
</body>
</html>