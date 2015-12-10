<?php
	define ('serveur',"localhost"); // le nom du serveur
	define('username',"root"); // le nom de l'utilisateur
	define('password',""); // le mot de passe de l'utilisateur
	define('dbname',"Install"); // le nom e la base de donnée

	$conn = mysql_connect(serveur,username,password);
		if (!$conn) 
		{ 
			echo "impossible de se connecter";
			exit;
		} 
		if(!mysql_select_db(dbname,$conn))
		{
			echo "impossible de se connecter à la BDD";
		}
		else{
			//echo "connexion etablie";
		}
?>