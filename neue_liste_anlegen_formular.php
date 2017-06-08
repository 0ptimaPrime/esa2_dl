	 } else {
	     echo "Error: " . $sql . "<br>" . $db_link->error;
	 }
}
 }


}

?>

<!DOCTYPE html>
<html lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="./css/bootstrap.min.css" rel="stylesheet">
<title>Neue Liste</title>
</head>
<body>
 <div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" />

			<div class="col-xs-12">
				<h1 class="page-header">Neue Liste erstellen</h1>
				<p>
			</div>



                <div class="col-xs-12">
                    <div class="form-group">
						<label class="smallLabel">Bezeichnung der ToDo-Liste:</label>
						<input class="form-control" type="text" id="liste_name" maxlength="35" name="liste_name" placeholder="Listenname" data-error="" value="<?php echo htmlentities($liste_name); ?>" required>
						<?php echo htmlentities($err); ?>	<?php echo htmlentities($err1); ?>
					</div>
				</div>

		<div class="col-xs-12">
<!-- kann sein dass statt button wieder input hin muss-->
			<button type="submit" class="btn btn-lg btn-primary center-block" value="submit" name="submit">Liste anlegen</button>
		</div>
	</form>
</div>
</body>
</html>
