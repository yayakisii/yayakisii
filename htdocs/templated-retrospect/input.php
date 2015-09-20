<?php

function convString($string) {
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    $string = addslashes($string);
    return $string;
}

function convOther($string) {
    $string = ereg_replace("\n|\r|\r\n","<br>",$string);
    return $string;
}

if(empty($_POST['flag'])){
//フラグ立てて，確認フェーズか書き込みフェーズか分岐させる　予定．なんにも書いてない．

$array = array('staff_id','name','post','tool1','tool2','tool3','level1','level2','level3','project');

foreach ($array as $key => $value) {
    if(!empty($_POST[$value])){
//   	echo $array[$key] .":";
		$array[$key] = convString($_POST[$value]);
//		echo $_POST[$value] ." <br>";
	}else{
		$array[$key] = "";
	}
}

$pw = $_POST["pw"];
$pw = md5($pw);
//echo "pw:" .$pw ."<br>";

//空欄時の例外処理わからんので保留
$work_experience = $_POST["work_experience"];
//	print_r($work_experience);
//	print_r($array);

//顔写真 うまくいってないので後でなんとかする．
	if((!empty($_FILES["picture"]["tmp_name"])) && ($_FILES["picture"]["size"]>="209715200")){	//ファイルサイズが大きすぎるとemptyになる　値は適当なので要検証
			$file_dir='./picture/';	//顔写真を置いておくディレクトリは適当に設定しておくれ 一旦tempフォルダにぶち込んで，DB登録のタイミングでメインの保存先に移動させる．
			$file_path=$file_dir .$staff_id ."_" .$_FILES["picture"]["name"];	//保存先ディレクトリ/社員id_元ファイル名で保存するよ
			$file_name = $_FILES["picture"]["name"];
			if(move_uploaded_file($_FILES["picture"]["tmp_name"],$file_path)){
				$flag_file="3";	//保存できたとき
			}else{
				$flag_file="4";	//できなかったとき
			}
	}else{ //ファイルサイズ大き過ぎのときと，そもそもファイルが選択されていないときのエラー分けてないです．起きたときの私に任せた．
		$flag_file="1";
		$file_name = "画像を添付できませんでした";
	}

//入力内容の取得ここまで

//work_exprienceとtoolとlevelの成形
	//データベースから拾ってくるよ
							$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
							$user = 'root';
							$password = 'root';
							try{
							    $dbh = new PDO($dsn, $user, $password);

							    $dbh->query('SET NAMES utf8');

							    $sql = 'select * from occupation';
							    foreach ($dbh->query($sql) as $row) 
							    	$occupation[] = $row['occupation_name'];
							    	
							    $sql = 'select * from tools';
							    foreach ($dbh->query($sql) as $row) 
							    	$tools[] = $row['tool_name'];
							    	
							    $dbh = null;	
							}catch (PDOException $e){
							    print('Error:'.$e->getMessage());
							    die();
							}
	//ジョイントするよ

		$tool_name = $tools[$array[3]] ." " .	 $tools[$array[4]] ." " .	 $tools[$array[5]];
		$occupation_name = $occupation[$work_experience[0]] ." " .$occupation[$work_experience[1]] ." " .$occupation[$work_experience[2]];
		$level_tmp = $array[6] ." " .$array[7] ." " .$array[8];

//echo "test:" .$level_tmp;

$main["staff_id"] = $array[0];
$main["name"] = $array[1];
$main["post"] = $array[2];
$main["tools"] = $array[3] ." " .$array[4] ." " .$array[5];
$main["level"] = $level_tmp;
$main["occupation"] = $work_experience[0] ." " .$work_experience[1] ." " .$work_experience[2];
$main["wish"] = $array[9];
$main["picture"] =  $staff_id ."_" .$_FILES["picture"]["name"]; 
$main["pw"] = $pw;

//print_r($main);
?>




<!-----あとでここから移植してください．------>
<html>
<body>

<form action="input.php" method="post" target="_self" enctype="multipart/form-data">	
	<input id="main" type="hidden" name="main" value="<?php echo implode("\t",$main);?>">
	<input id="flag" type="hidden" name="flag" value="1">
	
<table>
	<tr>
		<td>名前</td><td><?php echo $array[1]; ?></td>
	</tr>
	<tr>
		<td>役職</td><td><?php echo $array[2]; ?></td>
	</tr>
	<tr>
		<td>職種</td><td><?php echo $occupation_name; ?></td>
	</tr>
	<tr>
		<td>使えるツール</td><td><?php echo $tool_name; ?></td>	<!-----見にくいので，元気なときに何とかする------>
	</tr>
	<tr>
		<td>習熟度</td><td><?php  echo $level_tmp;?></td>
	</tr>
	<tr>
		<td>本人の希望</td><td><?php echo $array[9]; ?></td>
	</tr>
	<tr>
		<td>顔写真</td><td><?php echo $file_name; ?></td>
	</tr>
	<tr>
			<td><input type="submit" value="送信"></form></td>
	</tr>
</table>

</body>
</html>

<?php
}else{

echo "welcome to sousin page<br>";
$main = explode("\t",$_POST["main"]);
//	print_r($main);
	
//成形しましょう

							$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
							$user = 'root';
							$password = 'root';
							
							$check=0;
//pwとidの認証するよ
							try{
							    $dbh = new PDO($dsn, $user, $password);

							    $dbh->query('SET NAMES utf8');
							    
							    $sql = 'SELECT * FROM `main` WHERE `staff_id` = \'' .$main[0] .'\' AND `pw` LIKE \'' .$main[8] .'\'';
							    
							    foreach ($dbh->query($sql) as $value){
							    	 $check=1;
							    	 echo "認証できました<br>";
								}
									$dbh = null;							    
							    }catch (PDOException $e){
						    print('Error:'.$e->getMessage());
							    die();
							    	echo "社員IDとパスワードをご確認ください<br>";
							}

if($check==1){							    							
//認証パスしたら書き込むよ							
							try{
							    $dbh = new PDO($dsn, $user, $password);

							    $dbh->query('SET NAMES utf8');

							    $sql = 'UPDATE `yayakasii`.`main` SET `picture` = \'' .$main[7] .'\', `work_experience` = \'' .$main[5] .'\', `tools` = \'' .$main[3] .'\', `learning_level` = \'' .$main[4] .'\' , `wish` = \'' .$main[6] .'\' WHERE `main`.`staff_id` = \'' .$main[0] .'\'';
	
//		echo $sql;
								$dbh->query($sql);
							    	
							    $dbh = null;	
								echo "登録できました";
							}catch (PDOException $e){
							    print('Error:'.$e->getMessage());
							    die();
							}
							
}else{
	echo "社員IDとパスワードをご確認ください";
}

}?>
