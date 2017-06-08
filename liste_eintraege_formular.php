<?php
session_start();
//Die Einträge für eine ToDo-Liste werden hier eingegeben.
//error_reporting(E_ALL);
//Datenbankverbindung
	include 'db_connect.php';
	include 'klassen.php';

		//Parameter, die auf dieser Seite gebraucht und angezeigt werden.
		//Pflichtfeld: ToDo (Bezeichnung), Rest optional. Fehlerbehandlung.


		$todo="";
		$notiz="";
		$kategorie="";
		$prio="";
		$err="";
		$liste="";


		 	if(isset($_POST['submit'])){
				if (empty(trim($_POST["todo"]))) {
					$err = "ToDo eingeben!";
				}
				else {
			$eintrag = new ToDoEintrag();



			 	$eintrag->todo = ($_POST['todo']);
				$eintrag->kategorie = ($_POST['kategorie']);
			 	$eintrag->prio = ($_POST['prio']);
			 	$eintrag->notiz = ($_POST['notiz']);

				$eintrag->liste = $_SESSION["liste"];
				//$_SESSION["liste"]=$liste;

			$db_link = mysqli_connect (MYSQL_SERVER, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
			mysqli_set_charset( $db_link, 'utf8');
			$sql="INSERT INTO EinzelneListen (ToDo, Notiz, Kategorie, Prio, Liste) VALUES ('$eintrag->todo', '$eintrag->notiz', '$eintrag->kategorie', '$eintrag->prio', '$eintrag->liste')";

		 if ($db_link->query($sql) === TRUE) {
			$db_link_close;
			header("Location: http://s656189401.online.de/internetserverprog2/liste_eintraege_anzeigen.php");
			exit;
		 } else {
				 echo "Error: " . $sql . "<br>" . $db_link->error;
		 }
}


}

	?>


<!DOCTYPE html>
<html lang="de">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./css/bootstrap.min.css" rel="stylesheet">
<title>Meine ToDo-Listen</title>
</head>
<body>
	<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" />
			<div class="col-xs-12">
				<h1 class="page-header">LISTE BEARBEITEN - TASKS ANLEGEN</h1>
				<p>
			</div>
	<div>
		<div  class="col-xs-12 col-sm-6" >
             <div class="form-group">
			<label class="smallLabel">Neues ToDo anlegen</label>
			<?php echo htmlentities($err); ?>
				<input class="form-control" type="text" id="todo" maxlength="56" name="todo" value="<?php echo htmlentities($todo); ?>">


			</div>
		</div>

		<div  class="col-xs-12 col-sm-3">
             <div class="form-group">
				<label class="smallLabel">Prio</label>
				 	<select class="form-control" name="prio" id="prio">
						<option value="Niedrig">Niedrig</option>
						<option value="Mittel">Mittel</option>
						<option value="Hoch">Hoch</option>
						<option value="Akut">Akut</option>
					</select>
			</div>
		</div>
	</div>
		<div class="col-xs-12 col-sm-3">
			<div class="form-group">
				<label class="smallLabel">Kategorie</label>
					<select class="form-control" name="kategorie" id="kategorie">
						<option value="Sonstiges">Sonstiges</option>
						<option value="Kochen">Kochen</option>
						<option value="Putzen">Putzen</option>
						<option value="Schule">Schule</option>
						<option value="Sport">Sport</option>
						<option value="Familie">Familie</option>
						<option value="Freunde">Freunde</option>
						<option value="Arzttermin">Arzttermin</option>
						<option value="Arbeit">Arbeit</option>
						<option value="Einkaufen">Einkaufen</option>
					</select>

			</div>
		</div>
		<div class="col-xs-12  col-sm-6">
             <div class="form-group">
			<label class="smallLabel">Notiz</label>
			<textarea class="form-control changeBorderBottom" rows="8" type="text" id="notiz" maxlength="240" size="3" name="notiz" value="<?php echo htmlentities($notiz);?>"></textarea>
			</div>
		</div>


			<div class="col-xs-12">
			<button type="submit" class="btn btn-lg btn-primary center-block" value="submit" name="submit">Eintrag hinzufügen</button>
			</div>
	</form>
	</div>
</body>
</html>
