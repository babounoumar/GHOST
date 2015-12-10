<?php include_once("connect.php") ; ?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Projet-Ghost</title>
		
		  <link href="style.css" rel="stylesheet" media="all" type="text/css"/> 
	</head>

	<body>
		<section>
				<fieldset>
					<legend> Projet Ghost: </legend>
					<table>
							<tr>
								<td>Modifier la Valeur</td>
							</tr>
							<tr>
								<td>
									<?php
						
											$result = mysql_query("select * from machine where ip='".$_GET['ip']."'",$conn); // je recupere les information de la table machine
											if ($result) {
												$ip = mysql_fetch_array($result); // je recupere chaque ligne de la table
													echo "<form action='index.php' method='post'>";
													echo "<input type='text' name='ip' value='".$ip['ip']."'/><br/>"; // l'affichage de chaque ligne
													echo "<input type='submit' value='valider' name='modifier'>";
													echo "</form>";
											}
											else{
												echo "erreur d'execution";
												echo "le message:".mysql_error($conn);
											}
									?> 
																											
								</td>

							</tr>
						</table>
						<br><br>
						<table border="1">
					</table>
				</fieldset>
	</body>
</html>
