<?php include_once("connect.php") ; ?>
<html>
	<head>
		<meta meta http-equiv="Refresh" content="5; url=index.php" />
		<title>Projet-Ghost</title>
	</head>

	<body>
		<section>
			<form  id="monForm" action="index.php" method="post">
				<fieldset>
					<legend> Projet Ghost: </legend>
						<thead>
							<tr>
								<td> Saisir Adresse IP:</td>
								<td>
									<input id="adresseIp" type="text" placeholder="Entrez votre adresse Ip" name="ip" autofocus/>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									&nbsp; &nbsp; <input id="ajouter" type="submit" value="Ajouter" name='ajouter'/>
								</td>
							</tr>
								<br/><br/>
						    <table>
								<tr>
									<td> Liste Adresses IP:</td>
									<td colspan="2">Action</td>
									<td>Selection</td>
								</tr>
										<?php
											if (isset($_POST['ajouter'])) { // s'il sagit d'une mise à jour
												$ip = htmlspecialchars($_POST['ip']);
												if(preg_match("#^[a-zA-Z0-9._-]+@[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$#", $ip)) {
												if(!isset($_POST['modifier'])){
												$req1 = "insert into machine (ip) values ('".$_POST['ip']."')";
												$res1 = mysql_query($req1,$conn);}
												if (!$res1) {
													echo "erreur".mysql_error($conn);
													}				
												}
											}
											elseif (isset($_POST['modifier'])) {
												$requ = "update machine set ip ='".$_POST['ip']."'";
												$res = mysql_query($requ,$conn);
												if (!$res) {
													echo "erreur".mysql_error($conn);}	
												
											 }
											elseif(isset($_GET['ip'])){
												$requ2 = "delete from machine where ip ='".$_GET['ip']."'";
												$res2 = mysql_query($requ2,$conn);
												if (!$res2) {
													echo "erreur".mysql_error($conn);}		
											}

											$result = mysql_query("select * from machine",$conn); // je recupere les information de la table machine
											if ($result) {
												while ($req = mysql_fetch_array($result)) { // je recupere chaque ligne de la table
													echo "<tr><td>".$req["ip"]."</td>"; // l'affichage de chaque ligne
													echo "<td colspan='2'><a href='modifier.php?ip=".$req['ip']."'>Modifier</a>&nbsp;  &nbsp;";
													echo "<a href='index.php?ip=".$req['ip']."' >Supprimer</a></td>";
													echo "<td>case a cocher</td></tr>";
												}
											}
											else{
												echo "erreur d'execution";
												echo "le message:".mysql_error($conn);
											}
										?>				
						</tbody>								
							</table>
							<br/>
							<tr>
								<td>
									<input id="button" type="submit" value="Executer" />
									<!--<input id="modifier" type="reset" value="Modifier" />!-->
								</td>
							</tr>
				</fieldset>
		</form>
	</body>
</html>
