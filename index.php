<?php include_once("connect.php") ; ?>
<html>
	<head>
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
							</tr><br/><br/>

						    <table border="1" cellpadding="10" align="left">
								<tr>
									<td> Liste Adresses IP:</td>
									<td colspan="2">Action</td>
									<td>Selection</td>&nbsp; &nbsp;&nbsp; &nbsp;
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
													echo "<td><input type='checkbox' name='options[]' value='".$req['ip']."'><br></td></tr>";

												}
											}
											else{
												echo "erreur d'execution";
												echo "le message:".mysql_error($conn);
											}
										
										?>	
							</table>
						</tbody>								

							<table border="1" cellpadding="10" align="center">
								<tbody>
									<tr>
										<td> Liste Adresses IP Selectionner :</td>
									</tr>
										
										<?php 
											if(isset($_POST['valider'])){
												if(!empty($_POST['options']))
												{
													foreach($_POST['options'] as $val){
														echo "<tr><td>".$val."</td></tr>";
														}
												}
											}

										?>
												
								</tbody>								
							</table>
				</fieldset><br/>
							<input type="submit" value="Valider La Selection" name='valider' /><br/><br/>
							<input type="button" value="Executer" onClick="document.location.href='#" />
		</form>
	</body>
</html>
