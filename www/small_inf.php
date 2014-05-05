<?
include $_SERVER['DOCUMENT_ROOT']."/managers/functions.php";


SELECT small_inf.id, picture.path, area.name , area.town , concert.date, concert.time FROM small_inf,picture,area,concert WHERE small_inf.pic_id=picture.id and small_inf.area_id=area.id and small_inf.concert_id = concert.id 

function GetSmallInf(){
	
	$date ="";
	$town ="";
	$club ="";
	$name ="";
	$pic  ="";

	$query = "SELECT * FROM Small_inf ";
	$result = queryDB($query);
	$row =mysql_fetch_array( $result);
	$ipic = $row["pic_id"];
	$iarea = $row["area_id"];
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
			