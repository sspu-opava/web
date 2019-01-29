<?php 
function readTXT($filename) {
	$fp = fopen($filename, "r") 
		or die("Chyba: Soubor $filename nemohl být načten");
	$txt = fread($fp, filesize($filename));
	return $txt;
}

function readHTML($filename) {
	$html = htmlentities(readTXT($filename));
	return $html;
}

function readCSV($filename) {
	$fp = fopen($filename, "r") 
		or die("Chyba: Soubor $filename nemohl být načten");
	$data = array();
	$header = fgetcsv($fp, 8000, ";");
	while ($row = fgetcsv($fp, 8000, ";")) {
		$record = array();
		foreach ($header as $key => $value) {
			$record[$value] = $row[$key];
		}
		$data[$record['id']] = $record;	
	}
	fclose($fp);
	return $data;	
}

function readXML($filename) {
	$xmlObject = simplexml_load_file($filename) 
		or die("Chyba: Soubor $filename nemohl být načten");
	$data = array();
	foreach ($xmlObject as $row) {
		$record = array();
		foreach ($row as $key => $value) {
			$val = (array) $value;
			$record[$key] = $val[0];
		}
		$data[$record['id']] = $record;	
	}
	return $data;	
}

function readJSON($filename) {
	$fp = fopen($filename, "r") 
		or die("Chyba: Soubor $filename nemohl být načten");
	$json = fread($fp, filesize($filename));
	$rows = json_decode($json,true);
	$data = array();
	foreach ($rows as $row) {
	 	$data[$row['id']] = $row;
	} 
	return $data;
}

function dataTable($data, $columns = array(), $class="table", $id = "myTable"){
    $output = "<table id=\"".$id."\" class=\"".$class."\">";
   	$output .= "<thead><tr>";
   	foreach ($columns as $value) 
   	{
   		$output .= "<th>".$value."</th>";
   	}
   	$output .= "</tr></thead>";

   	$output .= "<tbody>";
   	foreach ($data as $row) 
   	{
   		$output .= "<tr id=\"".$row['id']."\">";
   		foreach ($columns as $key=>$value) 
   		{
   			if ($key != null)
   				$output .= "<td>".$row[$key]."</td>";
   			else 
   				$output .= "<td></td>";
   		}
   		$output .= "</tr>";
   	}
   	$output .= "</tbody>";        	
    $output .= "</table>";
    return $output;
}

?>