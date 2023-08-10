<!DOCTYPE html>
<html lang="jp">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="simemo.css">
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="favicon.ico">
<title>Simple Memo</title>
<?php
	//URLパラメータ解析
	if(isset($_GET['No'])){
		$filename=$_GET['No'];
		$url='./simemo.php?No='.$filename;
	}
	else{
		$filename='1';
		$url='./simemo.php?No=1';
	}
	if(isset($_GET['edit'])){
		$readonly='';
		$color='#FDF2CC';
		$button="Save";
	}
	else{
		$readonly='readonly';
		$color='white';
		$button="Edit";
		$url=$url.'&edit';
	}
	//ファイル出力
	if (isset($_POST['Save'])) {
		file_put_contents($filename.'.txt',$_POST['memo']);
	}
?>
</head>
<body>
<?php
	echo sprintf('<form method="POST" action="%s">',$url);
?>
<table>
  <tr valign="top">
  <td>
<?php
	echo sprintf('<textarea id="memo" name="memo" rows=19 cols=29 %s width="100%%" height="500px" style="background-color:%s;">',$readonly,$color);
	readfile($filename . ".txt");
?>
  </textarea>
  </td>
  <td>
<?php
	echo sprintf('<input type="submit" name="%s" value="%s">',$button,$button);
?>
  </td>
</table>
</form>
</body>
</html>