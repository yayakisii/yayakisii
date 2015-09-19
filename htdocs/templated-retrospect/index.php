<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>人員配置トップ</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
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

		<!-- Banner -->
			<section id="banner">
				<h2>人員配置支援サービス</h2>
				<p>for engineer</p>
				<!--<ul class="actions">
					<li><a href="#" class="button big special">人材を探してみる</a></li>
				</ul>-->
				当サイトはシステム開発会社向けのサイトです。<br>プロジェクトなどでの人員配置に役立ててください
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="inner">
					<article class="feature left">
						<span class="image"><img src="images/index1.jpg" alt="" width="576" height="358"></span>
						<div class="content">
							<h2>欲しい人材を探す</h2>
							<p>新しいプロジエクトに欲しい人材を探します。ここではエンジニアのスキルや経験などから検索が可能です。</p>
							<ul class="actions">
								<li>
									<a href="#two" class="button alt">探す</a>
								</li>
							</ul>
						</div>
					</article>
					<article class="feature right">
						<span class="image"><img src="images/index2.jpg" alt="" width="576" height="358"></span>
						<div class="content">
							<h2>エンジニアの情報を入力する</h2>
							<p>新入社員の情報や他の社員の情報の更新などの管理にお使いください</p>
							<ul class="actions">
								<li>
									<a href="generic.php" class="button alt">入力を行う</a>
								</li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2>人材検索</h2>
						<p>条件を入力してください。</p>
					</header>
			<form action="result.php" method="get">
				
					<p>スキル検索(3つまで選べます)</p>
					<?php
						$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
						$user = 'root';
						$password = 'root';
						try{
						    $dbh = new PDO($dsn, $user, $password);

						    $dbh->query('SET NAMES utf8');

						    $sql = 'select * from tools';
						    //一つ目のスキル
						    echo "<select name='skill1'>";
						    echo "<option value='0'>選択されていません";
						    foreach ($dbh->query($sql) as $row) {
						    	/*echo "<input type='checkbox' name='tools' value='" . $row['tool_id'] . "'>";
						        print($row['tool_name']);*/
						        echo "<option value='".$row['tool_id']."'>".$row['tool_name'];
						    }
						    echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;";
						    //二つ目のスキル
						    echo "<select name='skill2'>";
						    echo "<option value='0'>選択されていません";
						    foreach ($dbh->query($sql) as $row) {
						    	/*echo "<input type='checkbox' name='tools' value='" . $row['tool_id'] . "'>";
						        print($row['tool_name']);*/
						        echo "<option value='".$row['tool_id']."'>".$row['tool_name'];
						    }
						    echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;";
						    //三つ目のスキル
						    echo "<select name='skill3'>";
						    echo "<option value='0'>選択されていません";
						    foreach ($dbh->query($sql) as $row) {
						    	/*echo "<input type='checkbox' name='tools' value='" . $row['tool_id'] . "'>";
						        print($row['tool_name']);*/
						        echo "<option value='".$row['tool_id']."'>".$row['tool_name'];
						    }
						    echo "</select>&nbsp;&nbsp;&nbsp;&nbsp;";
						    }catch (PDOException $e){
							    print('Error:'.$e->getMessage());
							    die();
							}
					?>
					<br><br><br>
					<p>職種を選んでください</p>
					<?php
						$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
						$user = 'root';
						$password = 'root';
						try{
						    $dbh = new PDO($dsn, $user, $password);

						    $dbh->query('SET NAMES utf8');

						    $sql = 'select * from occupation';
						    
						    echo "<select name='occupation'>";
						    echo "<option value='0'>選択されていません";
						    foreach ($dbh->query($sql) as $row) {
						    	/*echo "<input type='checkbox' name='tools' value='" . $row['tool_id'] . "'>";
						        print($row['tool_name']);*/
						        echo "<option value='".$row['occupation_id']."'>".$row['occupation_name'];
						    }
						    echo "</select>";
						    }catch (PDOException $e){
							    print('Error:'.$e->getMessage());
							    die();
							}
					?>

				
				<br><br><br>

				<input type="submit" value="結果へ" class="big button alt">

			</form>
					
					
				</div>
			</section>

		

		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>