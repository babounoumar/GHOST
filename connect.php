<?php
											define ('serveur',"localhost"); // le nom du serveur
											define('username',"root"); // le nom de l'utilisateur
											define('password',""); // le mot de passe de l'utilisateur
											define('dbname',"Install"); // le nom e la base de donnée

											$conn = mysql_connect(serveur,username,password);
											if (!$conn) { 
											    echo "impossible de se connecter";
											    exit;
											} 
											if(!mysql_select_db(dbname,$conn)){
												echo "impossible de se connecter à la BDD";
											}
											else{
												//echo "connexion etablie";
											}

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
?>