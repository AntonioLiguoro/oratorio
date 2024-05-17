<?php

session_start();

$host = "localhost";
$user = "id20990705_kozmoshadow";
$password = "Hello_1234";
$dbname = "id20990705_oratorio";
$db = mysqli_connect($host, $user, $password, $dbname);

$sql1 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (classe Like 'Asilo' OR classe = '1 Elementare') ");
$sql2 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (classe = '2 Elementare' OR classe = '3 Elementare') ");
$sql3 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (classe = '4 Elementare' OR classe = '5 Elementare') ");
$sql4 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (classe LIKE '1 Media' OR classe LIKE '2 Media' OR classe LIKE '3 Media' OR classe LIKE 'Superiore') ");

if (isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
    $sql1 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '$keyword') AND (classe LIKE 'Asilo' OR classe = '1 Elementare') ");
    $sql2 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '$keyword') AND (classe = '2 Elementare' OR classe = '3 Elementare') ");
    $sql3 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '$keyword') AND (classe = '4 Elementare' OR classe = '5 Elementare') ");
    $sql4 = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '$keyword') AND (classe LIKE 'Media' OR classe LIKE 'Superiore') ");
}

?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Passaparola - Oratorio 2023</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main1.css" />
	<link rel="icon" href="images/logo_VsN_icon.ico" type="image/ico" />
	<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<link rel="stylesheet" href="assets/css/login_style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body class="is-preload">

	<div id="wrapper">

		<header id="header">

			<div class="content">
				<div class="inner">
					<h2>Passaparola</h2>
					<h3>Oratorio 2023</h3>
				</div>
			</div>
			<nav>
				<ul>
                    <li><a href="index.php">Home</a></li>
					<li><a href="#Asilo">Asilo</a></li>
                    <li><a href="#Seconda">Seconda</a></li>
                    <li><a href="#Quarta">Quarta</a></li>
                    <li><a href="#Medie">Medie</a></li>
					<li><a href="presenze.php">Presenze</a></li>
				</ul>
			</nav>
		</header>

		<div id="main">

            <article id="Asilo">
				<form class="form-inline" method="POST" action="#Asilo">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"> <i class="fa fa-search"></i> </span></button>
					</div>
				</form>
				<h2 class="major">Asilo</h2>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Cognome</th>
								<th>Età</th>
								<th>Classe</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($sql1)) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo "<h5>" . $row['nome']; ?></td>
									<td><?php echo "<h5>" . $row['cognome']; ?></td>
									<td><?php echo "<h5>" . $row['età']; ?></td>
									<td><?php echo "<h5>" . $row['classe']; ?></td>
								</tr>
								<?php $i++;
							} ?>
						</tbody>
					</table>
			</article>

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ !-->

            <article id="Seconda">
				<form class="form-inline" method="POST" action="#Seconda">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"> <i class="fa fa-search"></i> </span></button>
					</div>
				</form>
				<h2 class="major">Seconda</h2>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Cognome</th>
								<th>Età</th>
								<th>Classe</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($sql2)) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo "<h5>" . $row['nome']; ?></td>
									<td><?php echo "<h5>" . $row['cognome']; ?></td>
									<td><?php echo "<h5>" . $row['età']; ?></td>
									<td><?php echo "<h5>" . $row['classe']; ?></td>
								</tr>
								<?php $i++;
							} ?>
						</tbody>
					</table>
			</article>

			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ !-->

            <article id="Quarta">
				<form class="form-inline" method="POST" action="#Quarta">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"> <i class="fa fa-search"></i> </span></button>
					</div>
				</form>
				<h2 class="major">Quarta</h2>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Cognome</th>
								<th>Età</th>
								<th>Classe</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($sql3)) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo "<h5>" . $row['nome']; ?></td>
									<td><?php echo "<h5>" . $row['cognome']; ?></td>
									<td><?php echo "<h5>" . $row['età']; ?></td>
									<td><?php echo "<h5>" . $row['classe']; ?></td>
								</tr>
								<?php $i++;
							} ?>
						</tbody>
					</table>	
			</article>

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ !-->

            <article id="Medie">
				<form class="form-inline" method="POST" action="#Medie">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"> <i class="fa fa-search"></i> </span></button>
					</div>
				</form>
				<h2 class="major">Medie</h2>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Cognome</th>
								<th>Età</th>
								<th>Classe</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($sql4)) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo "<h5>" . $row['nome']; ?></td>
									<td><?php echo "<h5>" . $row['cognome']; ?></td>
									<td><?php echo "<h5>" . $row['età']; ?></td>
									<td><?php echo "<h5>" . $row['classe']; ?></td>
								</tr>
								<?php $i++;
							} ?>
						</tbody>
					</table>
			</article>

		</div>

		<footer id="footer">
			<p class="copyright">
				<a>Directedy by: <br> Antonio Liguoro</a>
			</p>
		</footer>

	</div>

	<div id="bg"></div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>

</body>

</html>
