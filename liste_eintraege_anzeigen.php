<?php session_start(); ?>

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
				<h1 class="page-header">MEINE TODOS</h1></div>
				<div  class="col-xs-12 col-sm-12" >
<?php
error_reporting(E_ALL);

require_once ('db_connect.php');
$db_link = mysqli_connect (MYSQL_SERVER, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
mysqli_set_charset( $db_link, 'utf8');
$liste= $_SESSION["liste"];


$sql = "SELECT *  FROM EinzelneListen WHERE Liste like '$liste'";

$db_erg = mysqli_query( $db_link, $sql );

echo '<table class="table">';
  echo '<tr>';
	echo '<th class="col-xs-2">Task</th>';
	echo '<th class="col-xs-2">Kategorie</th>';
	echo '<th class="col-xs-2">Priorität</th>';
	echo '<th class="col-xs-4">Notiz</th>';
	echo '<th class="col-xs-2"></th>';
  echo '</tr>';

while ($zeile = mysqli_fetch_assoc($db_erg))
{
  echo '<tr>';
	echo '<td>'. $zeile['ToDo'] . '</td>';
	echo '<td>'. $zeile['Kategorie'] . '</td>';
	echo '<td>'. $zeile['Prio'] . '</td>';
	echo '<td>'. $zeile['Notiz'] . '</td>';
	echo '<td><button type="button" class="btn btn-info  btn-group-xs" value="edit" style="margin-bottom:1px;">Bearbeiten</button></br><button type="button" class="btn btn-success btn-group-xs" value="delete" name="delete">ERLEDIGT</button></td>';
  echo '</tr>';
}
echo '</table>';

mysqli_free_result( $db_erg );
?>
</div>


	<div class="col-xs-12">
			<a href="liste_eintraege_formular.php" style="text-decoration: none;"><button type="button" class="btn btn-lg btn-primary center-block">Task hinzufügen</button></a>
</br></br>
	</div>
	<div class="col-xs-12">
			<a href="index.php" style="text-decoration: none;"><button type="button" class="btn btn-lg btn-primary center-block">Zurück zu meinen Listen</button></a>
	</br></br>
	</div>
</form>
</div>
</body>
</html>
