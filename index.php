<?php

session_start();

$host = "localhost";
$user = "id20990705_kozmoshadow";
$password = "Hello_1234";
$dbname = "id20990705_oratorio";
$db = mysqli_connect($host, $user, $password, $dbname);

if(!empty ($_POST['Registrazione'])) {

    $nome = mysqli_real_escape_string($db, $_POST['nome']);
    $cognome = mysqli_real_escape_string($db, $_POST['cognome']);
    $età = mysqli_real_escape_string($db, $_POST['età']);
	$classe = mysqli_real_escape_string($db, $_POST['classe']);
    if (empty($nome) or empty($cognome)) {
        $errors = "Inserisci i dati!";
    } else {
        mysqli_query($db, "INSERT INTO 03_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 04_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 05_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 06_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 10_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 11_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 12_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 13_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 17_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 18_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 19_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 20_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        mysqli_query($db, "INSERT INTO 21_07 (nome, cognome, età, classe) VALUES ('$nome', '$cognome', '$età', '$classe')");
        header('location: #Tabella');
    }
}

$import = mysqli_query($db, "LOAD DATA INFILE 'C:\Users\Utente2021\Downloads\ISCRITTI ORATORIO 2024.csv' 
INTO TABLE primo
FIELDS TERMINATED BY ',' 
ENCLOSED BY ''''
LINES TERMINATED BY '\n'
IGNORE 1 ROWS (`COGNOME`,`NOME`,`LUOGO DI NASCITA`,`DATA DI NASCITA`,`CLASSE FREQUENTATA`,`ANNI`,`CODICE FISCALE`,`CELLULARE`,`T.M.`,`SET.1`,`SET.2`,`SET.3`,`SET.4`,`ACCONTO`)");

$query = mysqli_query($db, "SELECT * FROM primo ORDER BY cognome ASC");

if(ISSET($_POST['search'])){
	$keyword = $_POST['keyword'];
	$query = mysqli_query($db, "SELECT * FROM 03_07 WHERE (CONCAT(nome, ' ', cognome, ' ') LIKE '%$keyword%' OR età LIKE '%$keyword%' OR classe LIKE '$keyword') ");
}

if (isset($_GET['del_task'])) {
    $id = $_GET['del_task'];
    mysqli_query($db, "DELETE FROM 03_07 WHERE id=$id");
	header('location: #Tabella');
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
					    <li><a href="presenze.php">Presenze</a></li>
						<li><a href="#Registrazione">Registra</a></li>
						<li><a href="#Tabella">Tabella</a></li>
					</ul>
				</nav>
			</header>

			<div id="main">

				<article id="Registrazione">
				
					<h2 class="major">Registrazione</h2>
					<form method="POST" action="">
						<div class="row">
							<br>
							<input type="text" name="nome" placeholder="Nome" required>
						</div>
						<div class="row">
							<br>
							<input type="text" name="cognome" placeholder="Cognome" required>
						</div>
						<div class="row">
							<br>
							<input type="text" name="età" placeholder="Età" required>
						</div>
						<div class="row">
							<br>
							<input type="text" name="classe" placeholder="Classe" required>
						</div>
						<div class="signup-link">
							<br>
							<input type="submit" name="Registrazione" value="Registra"> <a href="#Tabella">Lista completa</a>
						</div>	
						<?php
	          				if (isset($error)) {
		          				echo "<p style='color:red' class='signup-link'> $error </p>";
	          				}
          				?>
					</form>
				</article>

				<article id="Tabella">
					<form class="form-inline" method="POST" action="#Tabella">
						<div class="input-group col-md-12">
							<input type="text" class="form-control" placeholder="Cerca qui..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
							<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span> <i class="fa fa-search"></i> </button>
						</div>
					</form>
					<h2 class="major">Iscritti</h2>
						<table>
                           	<thead>
                                <tr>
                                	<th>#</th>
                                	<th>Nome</th>
                                	<th>Cognome</th>
									<th>Età</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
									<th>Classe</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i = 1;
                            	$import;
                                while ($row = mysqli_fetch_array($query)) { ?>
                            		<tr>
                                    	<td><?php echo $i; ?></td>
                                    	<td><?php echo "<h5>" . $row['cognome']; ?></td>
                                    	<td><?php echo "<h5>" . $row['nome']; ?></td>
                                     	<td><?php echo "<h5>" . $row['luogo di nascita']; ?></td>
										<td><?php echo "<h5>" . $row['data di nascita']; ?></td>
										<td><?php echo "<h5>" . $row['classe frequentata']; ?></td>
										<td><?php echo "<h5>" . $row['anni']; ?></td>
										<td><?php echo "<h5>" . $row['codice fiscale']; ?></td>
										<td><?php echo "<h5>" . $row['cellulare']; ?></td>
										<td><?php echo "<h5>" . $row['t.m.']; ?></td>
										<td><?php echo "<h5>" . $row['set.1']; ?></td>
										<td><?php echo "<h5>" . $row['set.2']; ?></td>
										<td><?php echo "<h5>" . $row['set.3']; ?></td>
										<td><?php echo "<h5>" . $row['set.4']; ?></td>
										<td><?php echo "<h5>" . $row['acconto']; ?></td>
                                    	<td>
                                     		<button onclick="location.href='index.php?del_task=<?php echo $row['id']; ?>'" type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"> <i class="fa fa-trash"></i> </button>
                                    	</td>
                                	</tr>
                            		<?php $i++;
                                } ?>
                            </tbody>
                        </table>
					</article>	

					</div>

					<footer id="footer">
						<p class="copyright"> <a>Directed by: <br> Antonio Liguoro</a></p>
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
