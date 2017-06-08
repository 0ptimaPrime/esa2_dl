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
		<div class="col-xs-12">
				<h1 class="page-header">Meine ToDo-Listen</h1></div>
				<div  class="col-xs-12 col-sm-12" >
<?php
error_reporting(E_ALL);

require_once ('db_connect.php');
$db_link = mysqli_connect (MYSQL_SERVER, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
$sql = "SELECT * FROM AlleListen";
$db_erg = mysqli_query( $db_link, $sql );

echo '<table class="table" style="border-top:#FFFFFF;">';
  echo '<tr>';
	echo '<th class="col-xs-4  col-sm-4">Listenname</th>';
	echo '<th class="col-xs-4 col-sm-4">Zuletzt bearbeitet</th>';
	echo '<th class="col-xs-4 col-sm-4"></th>';
  echo '</tr>';

while ($zeile = mysqli_fetch_assoc($db_erg))
{
  echo '<tr>';
	echo '<td>'. $zeile['Name'] . '</td>';
	echo '<td>'. $zeile['Datum'] . '</td>';
	echo '<td><a href="http://s656189401.online.de/internetserverprog2/liste_eintraege_anzeigen.php"><button type="button" class="btn btn-info" value="zurliste" style="margin-bottom:1px;">Zur Liste</button></a></br>
	<button type="button" class="btn btn-danger" value="delete" name="delete">Löschen</button></td>';
  echo '</tr>';
}
echo '</table>';
mysqli_free_result( $db_erg );
?>
</div>


	<div class="col-xs-12">
			<a href="neue_liste_anlegen_formular.php" style="text-decoration: none;"><button type="button" class="btn btn-lg btn-primary center-block">Neue Liste anlegen</button></a>
</br></br></br></br>
	</div>


</div>
</body>
</html>
