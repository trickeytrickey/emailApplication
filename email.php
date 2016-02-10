<?php
session_start();
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>"); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Lab 09 - Send Email</title>
	<meta charset="utf-8" />
	<style type="text/css">
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px; color:#6666ff}
		ul li input, ul li textarea, ul li select{ float:right; margin-right:10px; border:1px solid #ccc; padding:3px; font-family: Georgia, Times New Roman, Times, serif; width:60%;}
		li input:focus, li textarea:focus{ border:1px solid #666; }
		fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000099; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
		label span{ color:#ff0000;  }
		fieldset#info {position:absolute; top:100px; left:20px; width:460px; }
		fieldset#submit {position:absolute; top:500px; left:20px; width:460px; text-align:center; }
		fieldset input#SubmitBtn{ background:#E5E5E5; color:#000099; border:1px solid #ccc; padding:5px; width:150px;}
		div#errorMsg {color:#ff0000; font-weight:bold; font-size:12pt; position:absolute; top:580px; left:25px;}
		div#newLogin {color:#0000ff; font-size:12pt; position:absolute; top:350px; left:25px;}
	</style>
</head>

<body>
<h1 style="font-size:14pt; text-indent:360px;">Lab 09 - Send Email</h1>


<form id="form0" method="post" action="emailSend.php"> 
    <fieldset id="info">
        <legend>Send Email</legend>
        <ul>
            <li> <label title="ToField" for="ToField">To: <span>*</span></label> <input name="ToField" id="ToField" type="text" size="70" maxlength="70" /></li>
            <li> <label title="FromField" for="FromField">From: <span>*</span></label> <input name="FromField" id="FromField" type="text" size="70" maxlength="70" /></li>
            <li> <label title="Subject" for="Subject">Subject: <span>*</span></label> <input name="Subject" id="Subject" type="text" size="70" maxlength="70" /></li>
            <li> <label title="Body" for="Body">Message: <span>*</span></label> <textarea id="Body" name="Body" rows="10" cols="90"></textarea></li>
        </ul>
    </fieldset>
    <fieldset id="submit">
        <input type="submit" id="sendEmail" name="sendEmail" value="Send Email" />
    </fieldset>
</form>

<div id="errorMsg"><?php if(!empty($_SESSION["errorMessage"])){echo($_SESSION["errorMessage"]);} ?></div>

<script type="text/javascript">
	document.getElementById("ToField").focus();
</script>

<?php
$_SESSION["errorMessage"] = "";
?>
</body>
</html>
