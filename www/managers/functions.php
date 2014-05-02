<?


function queryDB($query){
	$db_id =  mysql_connect("localhost", "manager", "") or die (mysql_error());
	$my_db = mysql_select_db("site", $db_id) or die (mysql_error()); 
	$result = mysql_query($query,$db_id) or die(mysql_error()); 
	mysql_close($db_id) or die (mysql_error());
	return $result;
}
function alert($str){
	echo"<script type=\"text/javascript\">
				alert(\"".$str."\");
			</script>";
}
function menu(){

	echo "
		<ul>
			<li><a href=\"index.php\">Главная</a></li>
			<li><a href=\"show.php\">Показать всю информацию</a></li>
			<li><a href=\"add.php\">Добавление</a></li>
			<li><a href=\"delete.php\">Удаление</a></li>
		<ul>";
}
?>