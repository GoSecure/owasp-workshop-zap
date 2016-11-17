<?php
$id = isset($_GET['id'])? $_GET['id'] : "MC1jZmNkMjA4NDk1ZDU2NWVmNjZlN2RmZjlmOTg3NjRkYQ==";

$title = "Annonce introuvable";
$description = "";

$dec = base64_decode($id);
//echo "Decode".$dec;
$parts = explode("-",$dec);
if(count($parts) != 2) {
	die("Valeur invalide");
}
if(md5($parts[0]) !== $parts[1]) {
	die("Valeur invalide");
}

$id = $parts[0];
//echo $id;

if($id == 1) {
  $title = "Atelier pratique ZAP";
  $description = "Ne manquer pas l'atelier pratique OWASP sur le d&eacute;veloppement d'extensions ZAP, le 16 novembre 2016.";
}
else if($id == 2) {
  $title = "Conf&eacute;rence OWASP";
  $description = "Ne manquer pas la conf&eacute;rence 'Histoire d'un Hack' par Bernard Bolduc, le 21 novembre 2016.";
}
else if($id == "362") {
  $title = "F&eacute;licitation.";
  $description = "F&eacute;licitation. En esp&eacute;rant que vous avez automatis&eacute; le tout. <!-- flag-Aut0mati0n_1s_Y0ur_Fr1ends -->";
}
else if($id == "804") {
  $title = "Lieu du prochain atelier";
  $description = "La prochaine atelier pratique aura lieu chez Google. Don't be evil.";
}

?>


<h1><?php echo $title; ?></h1>
<p><?php echo $description; ?></p>
<br/>
<a href="./">Retour la liste des annonces</a>