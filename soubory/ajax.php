<?php 
	include "inc/datafiles.php";
	$xml = readXML("film.xml");
	$ajax = "<h2>".$xml[$_GET['id']]['nazev']." (".$xml[$_GET['id']]['rok'].")</h2>";
	$ajax .= "<p>".$xml[$_GET['id']]['obsah']."</p>";
	echo $ajax;
?>