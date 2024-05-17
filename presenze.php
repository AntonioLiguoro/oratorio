<?php

session_start();

$host = "localhost";
$user = "id20990705_kozmoshadow";
$password = "Hello_1234";
$dbname = "id20990705_oratorio";
$db = mysqli_connect($host, $user, $password, $dbname);

$query = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'No' ORDER BY cognome ASC");

$sq = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' ORDER BY cognome ASC");

if (isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
	$query = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'No' AND (CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '$keyword') ");
    $sq = mysqli_query($db, "SELECT * FROM 20_07 WHERE presenza = 'Si' AND (CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '$keyword') ");
}

if (isset($_POST['Salva_Assenti'])) {
	foreach ($_POST['presenza'] as $id => $presenza) {
		$id = mysqli_real_escape_string($db, $id);
		$presenza = mysqli_real_escape_string($db, $presenza);
		mysqli_query($db, "UPDATE 20_07 SET presenza = '$presenza' WHERE id = '$id'");
        header('location: #Assenti');
    }
}

$sql = mysqli_query($db,"SELECT * FROM 03_07 ORDER BY cognome ASC");
$sql1 = mysqli_query($db, "SELECT presenza FROM 04_07 ORDER BY cognome ASC");
$sql2 = mysqli_query($db, "SELECT presenza FROM 05_07 ORDER BY cognome ASC");
$sql3 = mysqli_query($db, "SELECT presenza FROM 06_07 ORDER BY cognome ASC");
$sql4 = mysqli_query($db, "SELECT presenza FROM 10_07 ORDER BY cognome ASC");
$sql5 = mysqli_query($db, "SELECT presenza FROM 11_07 ORDER BY cognome ASC");
$sql6 = mysqli_query($db, "SELECT presenza FROM 12_07 ORDER BY cognome ASC");
$sql7 = mysqli_query($db, "SELECT presenza FROM 13_07 ORDER BY cognome ASC");
$sql8 = mysqli_query($db, "SELECT presenza FROM 17_07 ORDER BY cognome ASC");
$sql9 = mysqli_query($db, "SELECT presenza FROM 18_07 ORDER BY cognome ASC");
$sql10 = mysqli_query($db, "SELECT presenza FROM 19_07 ORDER BY cognome ASC");
$sql11 = mysqli_query($db, "SELECT presenza FROM 20_07 ORDER BY cognome ASC");
$sql12 = mysqli_query($db, "SELECT presenza FROM 21_07 ORDER BY cognome ASC");

if (isset($_POST['search_griglia'])) {
	$keyword = $_POST['keyword'];
    $sql = mysqli_query($db, "SELECT * FROM 03_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql1 = mysqli_query($db, "SELECT presenza FROM 04_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%'ORDER BY cognome ASC ");
	$sql2 = mysqli_query($db, "SELECT presenza FROM 05_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql3 = mysqli_query($db, "SELECT presenza FROM 06_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql4 = mysqli_query($db, "SELECT presenza FROM 10_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql5 = mysqli_query($db, "SELECT presenza FROM 11_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql6 = mysqli_query($db, "SELECT presenza FROM 12_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql7 = mysqli_query($db, "SELECT presenza FROM 12_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql8 = mysqli_query($db, "SELECT presenza FROM 17_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql9 = mysqli_query($db, "SELECT presenza FROM 18_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql10 = mysqli_query($db, "SELECT presenza FROM 19_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql11 = mysqli_query($db, "SELECT presenza FROM 20_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
	$sql12 = mysqli_query($db, "SELECT presenza FROM 21_07 WHERE CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '%$keyword%' ORDER BY cognome ASC");
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
					<li><a href="#Assenti">Assenti</a></li>
                    <li><a href="#Presenti">Presenti</a></li>
                    <li><a href="#Griglia">Griglia</a></li>
					<li><a href="catechesi.php">Catechesi</a></li>
				</ul>
			</nav>
		</header>

		<div id="main">

			<article id="Assenti">
				<form class="form-inline" method="POST" action="#Assenti">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"> <i class="fa fa-search"></i> </span></button>
					</div>
				</form>
				<h2 class="major">Assenti</h2>
				<form method="POST">
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Cognome</th>
								<th>Età</th>
								<th>Classe</th>
								<th>Presente</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($query)) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo "<h5>" . $row['nome']; ?></td>
									<td><?php echo "<h5>" . $row['cognome']; ?></td>
									<td><?php echo "<h5>" . $row['età']; ?></td>
									<td><?php echo "<h5>" . $row['classe']; ?></td>
									<td>
										<select name="presenza[<?= $row['id']; ?>]">
											<option value="no" <?= $row['presenza'] == 'no' ? 'selected' : ''; ?>>No</option>
											<option value="si" <?= $row['presenza'] == 'si' ? 'selected' : ''; ?>>Si</option>
										</select>
									</td>
								</tr>
								<?php $i++;
							} ?>
						</tbody>
					</table>
					<div class="signup-link">
						<br>
						<input type="submit" name="Salva_Assenti" value="Salva"> <a href="#Presenti">Presenti</a>
					</div>	
				</form>
			</article>

            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ !-->

            <article id="Presenti">
				<form class="form-inline" method="POST" action="#Presenti">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
						<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"> <i class="fa fa-search"></i> </span></button>
					</div>
				</form>
				<h2 class="major">Presenti</h2>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Cognome</th>
								<th>Età</th>
								<th>Classe</th>
								<th>Presente</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($sq)) { ?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo "<h5>" . $row['nome']; ?></td>
									<td><?php echo "<h5>" . $row['cognome']; ?></td>
									<td><?php echo "<h5>" . $row['età']; ?></td>
									<td><?php echo "<h5>" . $row['classe']; ?></td>
									<td><?= $row['presenza']; ?></td>
								</tr>
								<?php $i++;
							} ?>
						</tbody>
					</table>	
			</article>

			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ !-->

			<article id="Griglia">
				<form class="form-inline" method="POST" action="#Griglia">
					<div class="input-group col-md-12">
						<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
						<button class="btn btn-primary" name="search_griglia"><i class="fa fa-search"></i></button>
					</div>
				</form>
				<h2 class="major">Griglia</h2>
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Cognome</th>
								<th>Età</th>
								<th>Classe</th>								
								<th>24/06</th>
								<th>25/06</th>
								<th>26/06</th>
								<th>27/06</th>
								<th>01/07</th>
								<th>02/07</th>	
								<th>03/07</th>
								<th>04/07</th>
								<th>08/07</th>
								<th>09/07</th>
								<th>10/07</th>
								<th>11/07</th>
								<th>21/07</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							while ($row = mysqli_fetch_array($sql)) { 
									$row1 = mysqli_fetch_array($sql1);
									$row2 = mysqli_fetch_array($sql2);
									$row3 = mysqli_fetch_array($sql3);
									$row4 = mysqli_fetch_array($sql4);
									$row5 = mysqli_fetch_array($sql5);
									$row6 = mysqli_fetch_array($sql6);
									$row7 = mysqli_fetch_array($sql7);
									$row8 = mysqli_fetch_array($sql8);
									$row9 = mysqli_fetch_array($sql9);
									$row10 = mysqli_fetch_array($sql10);
									$row11 = mysqli_fetch_array($sql11);
									$row12 = mysqli_fetch_array($sql12);
								?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo "<h5>" . $row['nome']; ?></td>
									<td><?php echo "<h5>" . $row['cognome']; ?></td>
									<td><?php echo "<h5>" . $row['età']; ?></td>
									<td><?php echo "<h5>" . $row['classe']; ?></td>
									<td><?= $row['presenza']; ?></td>
                                    <td><?= $row1['presenza']; ?></td>
                                    <td><?= $row2['presenza']; ?></td>
                                    <td><?= $row3['presenza']; ?></td>
                                    <td><?= $row4['presenza']; ?></td>
                                    <td><?= $row5['presenza']; ?></td>
                                    <td><?= $row6['presenza']; ?></td>
                                    <td><?= $row7['presenza']; ?></td>
                                    <td><?= $row8['presenza']; ?></td>
                                    <td><?= $row9['presenza']; ?></td>
                                    <td><?= $row10['presenza']; ?></td>
                                    <td><?= $row11['presenza']; ?></td>
                                    <td><?= $row12['presenza']; ?></td>
								</tr>
								<?php $i++;
							}?>
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
