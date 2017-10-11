<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
    table .tabStyle td{
     vertical-align:middle;
}
#form1 div table tr th {
	color: #00F;
}
#Tab1 #title td {
	color: #400040;
}
#Tab1 #title td {
	color: #FFF;
}
#form1 div .fancytable1 tr th {
	color: #FFF;
}
#form1 div .fancytable1 tr td {
	color: #FFF;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CTS QRCode</title>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<!--
<LINK REL=STYLESHEET TYPE="text/css" HREF="mystyle.css">
-->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link rel="stylesheet" href="mystyle.css" type="text/css" media="screen,print" />

<script>
function display(){
	var context;
	var rowstr;
	//var i = document.getElementById('SerialNo').value;
	//alert(sn);
	for (i=1; i < window.Tab1.rows.length; i++) { 
		var rowstr1;
		for (j=0; j < window.Tab1.rows[i].cells.length; j++) { 
			if(j > 0){
				rowstr1 = rowstr1 + ',' + window.Tab1.rows[i].cells[j].innerHTML;
			}
			else{
				rowstr1 = '@@' + window.Tab1.rows[i].cells[j].innerHTML;
			}
			//alert(window.Tab1.rows[i].cells[j].innerHTML); 			
		}
		rowstr = rowstr + rowstr1; 		
	} 
	//window.open('review.php?context='+rowstr.replace("undefined",""),'windowopen1');
	//alert(passport_encrypt('1,2,3,4','privatekey'));
	window.open('preview.php?context='+encodeURIComponent(rowstr),'windowopen1');
}


function chkFormat(x, y) {
	var i = x.value.indexOf(".", 0);
// 如果有小數點才做檢核
	if (i != -1) {
		var j = x.value.substring(i+1);
		if (j.length>y) {
			alert("Qty小數點限制" + y + "位數、請重新輸入");
			document.all(x.id).select();
		}
	}
}
</script>

<link rel="stylesheet" href="mystyle.css" type="text/css" media="screen,print" />

<?php
	$today = date('m/d/Y'); 
?>
</head>


<body>
<p align="center">
  <input name="SerialNo" type="hidden" id="SerialNo" value=0 size="3" />
  <input name="TotalSerialNo" type="hidden" id="TotalSerialNo" value=0 size="3" />
<img src="images/title-2.bmp" /></p>
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="590" border="1" class="fancytable1">
      <tr>
        <th width="143" scope="row"><div align="left">PO No :</div></th>
        <td width="369"><span id="sprytextfield1">
    <input name="PoNo" type="text" id="PoNo" size="10" maxlength="6" />        
        <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式須為數字</span></span></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">REL :</div></th>
        <td><span id="sprytextfield2">
        <input name="Rel" type="text" id="Rel" size="10" maxlength="3" />
        <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式須為正整數</span></span></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Part No :</div></th>
        <td><span id="sprytextfield7">
        <input name="PartNo" type="text" id="PartNo" size="20" maxlength="15" />
        <span class="textfieldRequiredMsg">必填欄位</span></span></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Qty</div></th>
        <td><span id="sprytextfield3">
        <input name="Qty" type="text" id="Qty" size="13" maxlength="13" onBlur="chkFormat(this, 3);" />
        <span class="textfieldInvalidFormatMsg">格式須為正整數</span><span class="textfieldRequiredMsg">需要有一個值。</span></span>(.000)</td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Shipping Date :</div></th>
        <td><span id="sprytextfield4">
        <input name="ShippingDate" type="text" id="ShippingDate" size="10" maxlength="10" value='<?php echo $today?>'/>
        <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式為mm/dd/yyyy</span></span></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Vendor No :</div></th>
        <td><span id="sprytextfield5">
        <input name="VendorNo" type="text" id="VendorNo" size="10" maxlength="6" />
        <span class="textfieldRequiredMsg">需要有一個值。</span><span class="textfieldInvalidFormatMsg">格式為數字</span></span></td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Vendor :</div></th>
        <td><span id="sprytextfield6">
        <input name="Vendor" type="text" id="Vendor" size="30" maxlength="30" />
        <span class="textfieldRequiredMsg">必填欄位</span></span></td>
      </tr>
    </table>
    <!--
    <input name="submit" type="button" id="submit" value="新增" onclick="AddRow()"/>
    -->
    <input type=button value="新增" onclick="Add()"> &nbsp;&nbsp;
        <input type="button" value="清除" onclick="Clear()" />
  </div>
  <p></p>
</form>
<script language=javascript>

var i=1,j=0;

function Clear(){
	document.form1.PoNo.value='';
	document.form1.Rel.value='';
	document.form1.PartNo.value='';
	document.form1.Qty.value='';
	//document.form1.ShippingDate.value='';
	//document.form1.VendorNo.value='';
	//document.form1.Vendor.value='';	
	document.form1.PoNo.disabled=false;
	document.form1.Rel.disabled=false;
	document.form1.PartNo.disabled=false;
	document.form1.ShippingDate.disabled=false;
	document.form1.VendorNo.disabled=false;
	document.form1.Vendor.disabled=false;
	document.getElementById('SerialNo').value=0;
}

function Add(){
	
	if(document.form1.PoNo.value==''){
      alert('Po No未填');
      document.form1.PoNo.focus();
      return false;
    }
    if(document.form1.Rel.value==''){
      alert('Rel未填');
      document.form1.Rel.focus();
      return false;
    }
	if(document.form1.PartNo.value==''){
      alert('Part No未填');
      document.form1.PartNo.focus();
      return false;
    }
    if(document.form1.Qty.value==''){
      alert('Qty未填');
      document.form1.Qty.focus();
      return false;
    }
    if(document.form1.ShippingDate.value==''){
      alert('Shipping Date未填');
      document.form1.ShippingDate.focus();
      return false;
    }
	if(document.form1.ShippingDate.value.length != 10){
      alert('Shipping Date格式有錯(正確 : mm/dd/yyyy)');
      document.form1.ShippingDate.focus();
      return false;
    }
	if(document.form1.VendorNo.value==''){
      alert('Vendor No未填');
      document.form1.VendorNo.focus();
      return false;
    }
    if(document.form1.Vendor.value==''){
      alert('Vendor未填');
      document.form1.Vendor.focus();
      return false;
    }
				
	if(i <= 10){
		if(document.getElementById('SerialNo').value == 0){
			document.form1.PoNo.disabled=true;
			document.form1.Rel.disabled=true;
			document.form1.PartNo.disabled=true;
			document.form1.ShippingDate.disabled=true;
			document.form1.VendorNo.disabled=true;
			document.form1.Vendor.disabled=true;
		}
   		var TabObj=document.getElementById("Tab1");
   		var NewRow=Tab1.insertRow(i);
   		var NewCell=NewRow.insertCell();
   		document.getElementById('SerialNo').value=parseInt(document.getElementById('SerialNo').value, 10) + 1;
		document.getElementById('TotalSerialNo').value=i;
   
   //NewCell=NewRow.insertCell();
/*
   		if(i%2==1){
   		document.write("<tr class=\"datarowodd\">");
		}
		else{
		document.write("<tr class=\"dataroweven\">");
		}
*/
   		NewCell.align="center";
		if(document.getElementById('SerialNo').value != document.getElementById('TotalSerialNo').value){
  			NewCell.innerText=document.getElementById('SerialNo').value;  }
		else
		{
			NewCell.innerText=document.getElementById('TotalSerialNo').value;
		}
   
   		NewCell=NewRow.insertCell();
   		NewCell.innerText=document.getElementById('PoNo').value;
   		NewCell.align="center";
   
   		NewCell=NewRow.insertCell();
   		NewCell.innerText=document.getElementById('Rel').value;
   		NewCell.align="center";      

   		NewCell=NewRow.insertCell();
   		NewCell.innerText=document.getElementById('PartNo').value.toUpperCase();
   		NewCell.align="center";
 
   		NewCell=NewRow.insertCell();
		var qtys = parseFloat(document.getElementById('Qty').value);;
//  		NewCell.innerText=(document.getElementById('Qty').value).toFixed(3);
  		NewCell.innerText=(qtys).toFixed(3);
		NewCell.align="center";

	    NewCell=NewRow.insertCell();
	    NewCell.innerText=document.getElementById('ShippingDate').value.substr(6,4)+document.getElementById('ShippingDate').value.substr(0,2)+document.getElementById('ShippingDate').value.substr(3,2);
   		NewCell.align="center";      

   		NewCell=NewRow.insertCell();     
   		NewCell.innerText=document.getElementById('VendorNo').value;
   		NewCell.align="center";

   		NewCell=NewRow.insertCell(); 
   		NewCell.innerText=document.getElementById('Vendor').value.toUpperCase();  
   		NewCell.align="center";
		//NewCell.innerHTML="</tr>";
   		//NewCell=NewRow.insertCell(); 
		
		//var cell=row.insertCell();
		//cell.parentElement.id=i;
		//Newcell.parentElement.id=i;	
   		//NewCell.align="center";
		//j=j+1;
		j=j+1;
   		i=i+1;
   		//NewRow.id = "id";
   	}
   	else
		alert("新增QRCode勿超過10筆");
}
</script> 

<!--<form id="form2" name="form2" method="post" action="">-->
  <div align="center">
    <table width="832" id="Tab1" class="fancytable">
    <!--
     <tr class="textfieldMinCharsState" id="title">
    -->
      <tr class="headerrow" id="title">
        <td width="25"><div align="center"><strong>SN</strong></div></td>
        <td width="110"><div align="center"><strong>Po No</strong></div></td>
        <td width="47"><div align="center"><strong>REL</strong></div></td>
        <td width="97"><div align="center"><strong>Part No</strong></div></td>
        <td width="85"><div align="center"><strong>Qty</strong></div></td>
        <td width="127"><div align="center"><strong>Shipping Date</strong></div></td>
        <td width="95"><div align="center"><strong>Vendor No</strong></div></td>
        <td width="93"><div align="center"><strong>Vendor</strong></div></td>
      </tr>
    </table>
    <!--<form id="form2" name="form2" method="post" action="">-->
    <form>
<INPUT type="button" value="列印預覽" onClick="display()"/>
	</form>
  </div>
<!-- "window.open('t1.html','mywindow')"> -->   
<p></p>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {useCharacterMasking:true, validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "date", {validateOn:["change"], format:"mm/dd/yyyy", useCharacterMasking:true});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {validateOn:["change"], useCharacterMasking:true});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {validateOn:["change"]});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none");
</script>
</body>
</html>