<?php
include_once("connect.php");
?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Projet-Ghost</title>
		
		  <link href="style.css" rel="stylesheet" media="all" type="text/css"/>
	</head>

	<body>
		<section>
			<form  id="monForm" action="ajout.php" method="post">
				<fieldset>
					<legend> Projet Ghost: </legend>
					<table>
						<thead>
							<tr>
								<td> Saisir Adresse IP:</td>
								<td>
									<input id="adresseIp" type="text" placeholder="Entrez votre adresse Ip" name="ip" autofocus/>
								</td>
								<td> </td>
								<td> </td>
							</tr>
						</thead>
						<tbody>
							<?php
									if (isset($_POST["ip"])) {
										$ip = htmlspecialchars($_POST['ip']);
										if(preg_match("#^[a-zA-Z0-9._-]+@[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$#", $ip)) {
										$sql = "INSERT INTO machine (`ip`) VALUES ('".$_POST['ip']."')";
											if ($conn->query($sql) === TRUE) {
												    echo "";} 
										    else {
												    echo "Error: " . $sql . "<br>" . $conn->error;
												 }					
							        }
							        	else
										{
											echo "Veuillez Saisir une Adresse Valide";
										}
							    }
							?>
							<tr>
								<td> </td>
								<td>
									<input id="ajouter" type="submit" value="Ajouter" />
								</td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td rowspan="2" class="ListeIP"> Liste Adresses IP:</td>
								<td rowspan="2">
									<textarea id="listesIp" cols="30" rows="20">
										<?php
											$sql = "SELECT ip FROM machine";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
												    while($row = $result->fetch_assoc()) {
												        $var = "".$row["ip"]."";
												        /// la 
												        echo $var;
												        echo "\n";
												    }
												} else {
												    echo "0 results";
												}
										?> 



	<?php
						function ip_machine(){
	 $fich="nom_ip.txt";
	 $ip=$_POST['ip']."\r\n";
	 if($fp=fopen($fich,"a+"))
	{
	 fputs($fp,$ip);
	
	 fclose($fp);
	}
	
	else
	echo "Fichier inaccessible !!!";
	 
	}
 ip_machine() ;
						?>








									</textarea>
								</td>
				
								<td>
									<input id="envoyer" type="submit" value=">" />
								</td>
				
								<td rowspan="2" class="ListeIP"> Liste IP Sélectionner:</td>
								<td rowspan="2">
									<textarea id="listesIp" cols="30" rows="20"> </textarea>
								</td>
				
							</tr>
							<tr>
								<td>
									<input id="modifier" type="reset" value=">>" />
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td> </td>
								<td>
									<input id="envoyer" type="submit" value="Envoyer" />
									<input id="modifier" type="reset" value="Modifier" />
								</td>
								<td> </td>
								<td> </td>
								<td> </td>
							</tr>
						</tfoot>
					</table>
				</fieldset>
		</form>
	</body>
</html>
