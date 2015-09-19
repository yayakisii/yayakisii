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
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html">Retrospect</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					<li><a href="index.html">トップ</a></li>
					<li><a href="generic.php">社員情報入力</a></li>
					<li><a href="elements.html">欲しい人材を探す</a></li>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major special">
						<h2>社員情報の入力</h2>
						<p>ここではエンジニアの名前やスキルなどの情報を入力してください</p>
					</header>

					<a href="#" class="image fit"><img src="images/pic11.jpg" alt="" /></a>

				</div>

				<form action="input.php" method = "get">
						社員ID
						<input type="text" name="staff_id"><br>
						氏名
						<input type="text" name="name"><br>
						パスワード
						<input type="text" name="pw"><br>
						顔画像のファイル名を入力してください
						<input size="30" type="file" name="photo"><br>
						役職
						<select name="post">
							<option value="1">部長</option>
							<option value="2">マネージャー</option>
							<option value="3">リーダー</option>
							<option value="4">スタッフ</option>
						</select><br>

						職歴<br>
							<input type="checkbox" name="work_experience" value="1">マーケティング
							<?php
							$dsn = 'mysql:dbname=yayakasii;host=localhost:8889';
							$user = 'root';
							$password = 'root';
							try{
							    $dbh = new PDO($dsn, $user, $password);

							    $dbh->query('SET NAMES utf8');

							    $sql = 'select * from occupation';
							    foreach ($dbh->query($sql) as $row) {
							        print($row['occupation_name'].'<br>');
							    }
							}catch (PDOException $e){
							    print('Error:'.$e->getMessage());
							    die();
							}

							$dbh = null;
							?>	
						
						
						
						

				</form>
			</section>

			

			<form>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled.</li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a>.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a>.</li>
					</ul>
				</div>
			</footer>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>