<?

/*
SELECT * FROM article 
LEFT JOIN concert ON concert.id = article.concert_id
LEFT JOIN content ON content.id = article.content_id
LEFT JOIN band on band.id =article.band_id
where band.genre = "%rock%"
*/

function PrintMenu(){
	echo    "<div class=\"menu\" >
				<ul class=\"nav\" >
		  			<div class=\"l1\"><li><a href=\"../index.php\">Главная</a></li></div>
		   			<div class=\"l2\"><li><a href=\"../articles/minfo.php\"> О нас</a></li></div>
		   			<div class=\"l3\"><li><a href=\"\"> Жанр</a>

				   			<ul >
				   				<li class=\"l11\"><a href=\"../search/genre.php?genre=rock\">Rock</a></li>
				   				<li class=\"l12\"><a href=\"../search/genre.php?genre=pop\">Pop</a></li>
				   				<li class=\"l13\"><a href=\"../search/genre.php?genre=classic\">Classic</a></li>
				   			</ul>

			   				</li>
			   		</div>
			   		<div class=\"l4\"><li><a href=\"../search/index.php\"> Поиск</a></li></div>
			   	</ul>
			</div>";
}
function PrintFooter(){

	echo "	<div class=\"footBar\">
			</div>";
}

function PrintRotator(){

		echo 	"<script type=\"text/javascript\">
				 
				function theRotator() {
					// Устанавливаем прозрачность всех картинок в 0
					$('div#rotator ul li').css({opacity: 0.0});
				 
					// Берем первую картинку и показываем ее (по пути включаем полную видимость)
					$('div#rotator ul li:first').css({opacity: 1.0});
				 
					// Вызываем функцию rotate для запуска слайдшоу, 5000 = смена картинок происходит раз в 5 секунд
					setInterval('rotate()',5000);
				}
				 
				function rotate() {	
					// Берем первую картинку
					var current = ($('div#rotator ul li.show')?  $('div#rotator ul li.show') : $('div#rotator ul li:first'));
				 
					// Берем следующую картинку, когда дойдем до последней начинаем с начала
					var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('div#rotator ul li:first') :current.next()) : $('div#rotator ul li:first'));	
				 
					// Подключаем эффект растворения/затухания для показа картинок, css-класс show имеет больший z-index
					next.css({opacity: 0.0})
					.addClass('show')
					.animate({opacity: 1.0}, 1000);
				 
					// Прячем текущую картинку
					current.animate({opacity: 0.0}, 1000)
					.removeClass('show');
				};	
				$(document).ready(function() {		
				// Запускаем слайдшоу
				theRotator();
				});
		</script>";

}
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

function GetSmallInf( $sql_where){

	$banners = array();
	$sql = "SELECT * FROM article \n"
    . "LEFT JOIN concert ON concert.id = article.concert_id \n"
    . "LEFT JOIN content ON content.id = article.content_id \n"
    . "LEFT JOIN band on band.id =article.band_id \n"
    . $sql_where;

	$result = queryDB($sql);
	while($row =mysql_fetch_row( $result)){

		$ipicl = $row[20];			
		$ipicb = $row[21];			
		$iarea = $row[10];
		$iarticle = $row[0];
		$iconcert = $row[4];
		$icontent = $row[3];
		

		$band_name= $row[17];
		$date = $row[11];
		$time = $row[12];
		$content = $row[15];
		$genre   = $row[18];

			
		$query = "SELECT `name`,`town` FROM `area` where id=".$iarea;
		$result1 = queryDB($query);
		$row1 =mysql_fetch_array( $result1);
		$town = $row1["town"];
		$club = $row1["name"];

		$query = "SELECT `path` FROM `picture` WHERE id="."\"".$ipicl."\"";
		$result1 = queryDB($query);
		$row =mysql_fetch_array( $result1);
		$logo = $row["path"];


		$query = "SELECT `path` FROM `picture` WHERE id="."\"".$ipicb."\"";
		$result1 = queryDB($query);
		$row =mysql_fetch_array( $result1);
		$banner = $row["banner"];
		$href =  "\"../articles/article.php?id=".$iarticle."&logo=".$logo."&icontent=".$icontent."&iarea=".$iarea."&iconcert=".$iconcert."\"";
	
		array_push($banners,array("path"=> $banner, 
								  "href"=> $href  ,));

		echo "  <div class=\"col11\">
					<a href=".$href."><img src=".$logo."></a>
					<div class=\"txt\">
						<h3>".$band_name."</h3>
						".$town."<br>
						".$date."<br>
						".$club."<br>
					<a href=".$href."><u>Подробнее</u></a>
					</div>
				</div>";
		}
	return $banners;
}
function GetBanners( ){

	$banners = array();
	$sql = "SELECT * FROM article \n"
    . "LEFT JOIN concert ON concert.id = article.concert_id \n"
    . "LEFT JOIN content ON content.id = article.content_id \n"
    . "LEFT JOIN band on band.id =article.band_id \n";
 
	$result = queryDB($sql);
	while($row =mysql_fetch_row( $result)){

		$ipicl = $row[20];			
		$ipicb = $row[21];			
		$iarea = $row[10];
		$iarticle = $row[0];
		$iconcert = $row[4];
		$icontent = $row[3];
		

		$band_name= $row[17];
		$date = $row[11];
		$time = $row[12];
		$content = $row[15];
		$genre   = $row[18];

			
		$query = "SELECT `name`,`town` FROM `area` where id=".$iarea;
		$result1 = queryDB($query);
		$row1 =mysql_fetch_array( $result1);
		$town = $row1["town"];
		$club = $row1["name"];

		$query = "SELECT `path` FROM `picture` WHERE id="."\"".$ipicl."\"";
		$result1 = queryDB($query);
		$row =mysql_fetch_array( $result1);
		$logo = $row["path"];


		$query = "SELECT `path` FROM `picture` WHERE id="."\"".$ipicb."\"";
		$result1 = queryDB($query);
		$row =mysql_fetch_array( $result1);
		$banner = $row["path"];
		$href =  "\"../articles/article.php?id=".$iarticle."&logo=".$logo."&icontent=".$icontent."&iarea=".$iarea."&iconcert=".$iconcert."\"";
	
		array_push($banners,array("path"=> $banner, 
								  "href"=> $href  ,));
		}
	return $banners;
}