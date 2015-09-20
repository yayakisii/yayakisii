<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>社員情報入力</title>
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
		<!--memo $array = array('staff_id','name','post','tool1','tool2','tool3','level1','level2','level3','project');-->
				
	</head>
	<body>

		<script type="text/javascript">
    function checker(frm){
        if(frm.elements["staff_id"].value==""){
            alert("社員IDを入力してください");
            return false;
         }else if(frm.elements["name"].value==""){
            alert("名前を入力してください");
            return false;
         }else if(frm.elements["post"].value==""){
            alert("役職を入力してください");
            return false;
         }else if(frm.elements["work_experience"].value==""){
            alert("職種を入力してください");
            return false;
        }else{
            /* TRUEを返してフォーム送信 */
            return true;
        }
    }
	</script>


		<!-- Header -->
			<header id="header">
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="index.php">トップ</a></li>
					<li><a href="generic.php">社員情報入力</a></li>
					<li><a href="index.php#two">欲しい人材を探す</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>社員情報の入力</h2>
						<p>ここではエンジニアの名前やスキルなどの情報を入力してください</p>
					</header>

					<a href="#" class="image fit"><img src="images/inputimage.jpg" alt="" /></a>

				</div>

				<form action="input.php" method = "post" onsubmit="return checker(this)">
						社員ID（必須）
						<input type="text" name="staff_id" value="5"><br><br>
						氏名（必須）
						<input type="text" name="name" value="山田太郎"><br><br>
						パスワード（必須）
						<input type="password" name="pw" value="aaaaaa"><br><br>
						顔画像のファイル名を入力してください<br>
						<input size="30" type="file" name="picture"><br><br>
						役職（必須）
						<select name="post">
							<option value="1">部長</option>
							<option value="2">マネージャー</option>
							<option value="3">リーダー</option>
							<option value="4">エンジニア</option>
						</select><br><br>

						職種（任意）　詳しくは<a href="diagram_01.png" target="blank">こちら</a><br>
						
							<?php
							$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
							$user = 'root';
							$password = 'root';
							try{
							    $dbh = new PDO($dsn, $user, $password);

							    $dbh->query('SET NAMES utf8');

							    $sql = 'select * from occupation';
							    foreach ($dbh->query($sql) as $row) {
							    	echo "<input type='checkbox' name='work_experience[]' value='" . $row['occupation_id'] . "'>";
							        print($row['occupation_name'].'<br>');
							    }
							}catch (PDOException $e){
							    print('Error:'.$e->getMessage());
							    die();
							}

							$dbh = null;
							?><br>
					<div class="skilltable">
						<table>
						<tr>
							<th>スキル</th>
							<th>習熟度</th>
						</tr>
						ITスキル（任意）<br>
							<?php
							$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
							$user = 'root';
							$password = 'root';
							try{
							    $dbh = new PDO($dsn, $user, $password);

							    $dbh->query('SET NAMES utf8');

							    $sql = 'select * from tools';
							    //一つ目のスキルと習熟度
							    echo "<tr>";
							    echo "<td>";
							    echo "<select name='tool1'>";
							    echo "<option value='0'>選択されていません";
							    foreach ($dbh->query($sql) as $row) {
							    	/*echo "<input type='checkbox' name='tools' value='" . $row['tool_id'] . "'>";
							        print($row['tool_name']);*/
							        echo "<option value='".$row['tool_id']."'>".$row['tool_name'];
							    }
							    echo "</select>";
							    echo "</td>";
							    echo "<td>";
							    echo "<select name='level1'>";
							    	echo "<option value='0'>　";
							    	echo "<option value='1'>レベル１";
							    	echo "<option value='2'>レベル２";
							    	echo "<option value='3'>レベル３";
							    	echo "<option value='4'>レベル４";
							    	echo "<option value='5'>レベル５";
							    echo "</select>";
							    echo "</tr>";

							    //二つ目のスキルと習熟度
							    echo "<tr>";
							    echo "<td>";
							    echo "<select name='tool2'>";
							    echo "<option value='0'>選択されていません";
							    foreach ($dbh->query($sql) as $row) {
							    	/*echo "<input type='checkbox' name='tools' value='" . $row['tool_id'] . "'>";
							        print($row['tool_name']);*/
							        echo "<option value='".$row['tool_id']."'>".$row['tool_name'];
							    }
							    echo "</select>";
							    echo "</td>";
							    echo "<td>";
							    echo "<select name='level2'>";
							    	echo "<option value='0'>";
							    	echo "<option value='1'>レベル１";
							    	echo "<option value='2'>レベル２";
							    	echo "<option value='3'>レベル３";
							    	echo "<option value='4'>レベル４";
							    	echo "<option value='5'>レベル５";
							    echo "</select>";
							    echo "</tr>";

							    //三つ目のスキルと習熟度
							    echo "<tr>";
							    echo "<td>";
							    echo "<select name='tool3'>";
							    echo "<option value='0'>選択されていません";
							    foreach ($dbh->query($sql) as $row) {
							    	/*echo "<input type='checkbox' name='tools' value='" . $row['tool_id'] . "'>";
							        print($row['tool_name']);*/
							        echo "<option value='".$row['tool_id']."'>".$row['tool_name'];
							    }
							    echo "</select>";
							    echo "</td>";
							    echo "<td>";
							    echo "<select name='level3'>";
							    	echo "<option value='0'>　";
							    	echo "<option value='1'>レベル１";
							    	echo "<option value='2'>レベル２";
							    	echo "<option value='3'>レベル３";
							    	echo "<option value='4'>レベル４";
							    	echo "<option value='5'>レベル５";
							    echo "</select>";
							    echo "</tr>";
							}catch (PDOException $e){
							    print('Error:'.$e->getMessage());
							    die();
							}

							$dbh = null;
							?></table><br>
					</div>

						やりたいプロジェクト内容（任意）<br>
						<textarea name="project" cols="50" rows="5">aaaaaaaa</textarea><br><br>

						<input type="submit" value="送信">

						
						
						
						

				</form>
			</section>

			

			<form>

		



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>