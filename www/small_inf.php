<?
include $_SERVER['DOCUMENT_ROOT']."/managers/functions.php";



function GetSmallInf(){
	
	$date ="";
	$town ="";
	$club ="";
	$name ="";
	$pic  ="";

	$query = "SELECT * FROM article ";
	$result = queryDB($query);
	$row =mysql_fetch_array( $result);
	$ipic = $row["pic_id"];			/*byltrc*/
	$iband=$row["band_id"];
	$icon = $row["concert_id"];
	
	$query = "SELECT `name`,`town` FROM `area` where id=".$iarea;
	$result = queryDB($query);
	$row =mysql_fetch_array( $result);
	$town = $row["town"];
	$club = $row["name"];

	$query = "SELECT `name` FROM `concert` where id=".$icon;
	$result = queryDB($query);
	$row =mysql_fetch_array( $result);
	$name = $row["name"];
	$date = "12.13.14";

	$query = "SELECT ` path` as p FROM `picture` WHERE id="."\"".$ipic."\"";
	$result = queryDB($query);
	$row =mysql_fetch_array( $result);
	$pic = $row["p"];

	echo "  <div class=\"col11\">
				<a href=\"\"><img src=\"".$pic."\"></a>
				<div class=\"txt\">
					<h3>\"".$name."\"</h3>
					\"".$town."\"<br>
					\"".$date."\"<br>
					\"".$club."\"<br>
					<a href=\"\"><u>Подробнее</u></a>
				</div>
			</div>
		 ";
}




?>
			