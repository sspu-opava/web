<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<title>Základy PHP</title>
</head>
<body>
	<h1>Základy PHP</h1>
	<h2>Proměnné a konstanty</h2>
	<h2>Výstupy</h2>
	<h2>Podmíněné příkazy</h2>
	<?php 	
		function partOfDay($t = null) {
			$time = ($t == null) ? time() : $t;
			$hod = date("H",$time);
			$min = date("i",$time);
			if ($hod == 0 && $min == 0) 
				return "midnight";
			elseif ($hod <=11)
				return "morning (a.m.)";
			elseif (($hod == 12) && ($min == 0)) 
				return "noon";
			else 
				return "afternoon (p.m.)";
		}		

		function season($t = null) {
			$time = ($t == null) ? time() : $t;
			$day = date("j",$time);
			$month = date("n",$time);
			if (($month == 3 && day >= 21) || ($month == 4) || ($month == 5) || ($month == 6 && $day < 21)) {
				return "spring";
			} elseif (($month == 6 && day >= 21) || ($month == 7) || ($month == 8) || ($month == 9 && $day < 23)) {
				return "summer";
			} elseif (($month == 9 && day >= 23) || ($month == 10) || ($month == 11) || ($month == 12 && $day < 21)) {
				return "autumn";
			} else {
				return "winter";
			}
		}

		function czechDay($t = null){
			$time = ($t == null) ? time() : $t;
			$day = date("N",$time);
			switch ($day) {
				case 1 : return "pondělí";
				case 2 : return "úterý";
				case 3 : return "středa";
				case 4 : return "čtvrtek";
				case 5 : return "pátek";
				default: return "víkend";
			}

		}

		echo partOfDay();
		echo season();
		echo czechDay();
	 ?>
	<h2>Cykly</h2>
	<?php 
		function powTable($rows=5,$cols=5){
			$output = "<table border='1'>";
			for ($r = 0; $r <= $rows; $r++) {
				$output .= "<tr>";
				for ($c = 0; $c <= $cols; $c++) {
					if ($r == 0) {
						$output .= "<th>$c</th>";
					} else {
						if ($c==0) {
							$output .= "<th>$r</th>";
						} else {
							$output .= "<td onclick=\"alert(this.innerHTML)\">".pow($r,$c)."</td>";
						}
					}
				}	
				$output .= "</tr>";	
			}
			$output .= "</table>";
			return $output;
		}


		function searchNum($key, $min=0, $max=100) {
			$num = 0;
			do {
			   $rnd = rand($min,$max);
			   $num++;
			} while ($key != $rnd);
			return $num;
		}

		function generatePassword($len=8,$upper=2,$spec=2) {
			$specialchars = array('!','@','#','$','%','^','&','*','?','_');
			$pass = array();
			for ($s=0;$s<$spec;$s++) {
				$pass[] = $specialchars[rand(0,9)];
			}
			for ($u=0;$u<$upper;$u++) {
				$pass[] = chr(rand(65,90));
			}
			for ($l=0;$l<($len-$upper-$spec);$l++) {
				$pass[] = chr(rand(97,122));
			}
			shuffle($pass);
			return implode($pass);
		}

		function str_split_unicode($str, $l = 0) {
		    if ($l > 0) {
		        $ret = array();
		        $len = mb_strlen($str, "UTF-8");
		        for ($i = 0; $i < $len; $i += $l) {
		            $ret[] = mb_substr($str, $i, $l, "UTF-8");
		        }
		        return $ret;
		    }
		    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
		}

		function enigma($word) {
			$cryptArray = str_split_unicode($word);
			var_dump($cryptArray);
			shuffle($cryptArray);
			return implode($cryptArray);
		}

		function morse($word){
			$morseCode = array(
			    "a"=>".-",
			    "b"=>"-...", 
			    "c"=>"-.-.", 
			    "d"=>"-..", 
			    "e"=>".", 
			    "f"=>"..-.", 
			    "g"=>"--.", 
			    "h"=>"....", 
			    "i"=>"..", 
			    "j"=>".---", 
			    "k"=>"-.-", 
			    "l"=>".-..", 
			    "m"=>"--", 
			    "n"=>"-.", 
			    "o"=>"---", 
			    "p"=>".--.", 
			    "q"=>"--.-", 
			    "r"=>".-.", 
			    "s"=>"...", 
			    "t"=>"-", 
			    "u"=>"..-", 
			    "v"=>"...-", 
			    "w"=>".--", 
			    "x"=>"-..-", 
			    "y"=>"-.--", 
			    "z"=>"--..", 
			    "0"=>"-----",
			    "1"=>".----", 
			    "2"=>"..---", 
			    "3"=>"...--", 
			    "4"=>"....-", 
			    "5"=>".....", 
			    "6"=>"-....", 
			    "7"=>"--...", 
			    "8"=>"---..", 
			    "9"=>"----.",
			    "."=>".-.-.-",
			    ","=>"--..--",
			    "?"=>"..--..",
			    "/"=>"-..-.",
			    " "=>" ");
			$wordArray = str_split(strtolower($word));
			$transMorse = array();
			foreach ($wordArray as $char) {
				$transMorse[] = $morseCode[$char];
			}
			return implode(' ',$transMorse);
		}

		echo powTable(20,10);
		echo (searchNum(1,0,10));
		echo "<h1>".generatePassword()."</h1>";
		echo "<h1>".enigma("miloš")."</h1>";
		echo "<h1>".morse("Marek")." | ".morse("pije")."</h1>";
	 ?>
	<h2>Funkce</h2>
	<h2>Práce s řetězci</h2>
	<?php 
		function csvToTable($csvfile){
			//$array = array_map('str_getcsv', file($csvfile));
			$array = file($csvfile);
			$header = array_shift($array);
			$header = explode(";",$header);
			var_dump($array);
			$output = "<table border=1>";
			$output .= "<thead><tr>";
			$i = 0;			
			foreach($header as $th) {
				$i++;
				if ($i < count($header)-3)
				$output .= "<th class=\"text-center\">".$th."</th>";
			}
			$output .= "</tr></thead>";
			$output .= "<tbody>";
			$row = 30;
			foreach($array as $tr) {
				$i = 10;
				$output .= "<tr id=\"tr-$row\">";	
				$tr = explode(";",$tr);
				foreach ($tr as $td) {
					if ($i == 10)
						$output .= "<th>".$td."</th>";
					else if ($i-10 < count($tr)-4)
						$output .= "<td class=\"td-$i text-right\">".$td."</td>";

					$i++;
				}
				$output .= "</tr>";	
				$row--;
			}
			$output .= "</tbody>";			
			$output .= "</table>";
			return $output;
		}
		echo csvToTable('normy.csv');
	 ?>
	<h2>Pole v PHP</h2>
	<h2>Superglobální proměnné</h2>
</body>
</html>