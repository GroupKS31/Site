<html>
<title>
	Buying tickets
</title>
<head>
<meta charset="utf-8">
	<link type='text/css' rel='stylesheet' href='scheme.css' />
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 
</head>
<body style="background-color:#ffffff">

	<div class="menu" >
		<ul class="nav" >
  			 <div class="l1"><li><a href="../index.php">Главная</a></li></div>
   			<div class="l2"><li><a href=""> О нас</a></li></div>
   			<div class="l3"><li><a href=""> Жанр</a>

		   			<ul >
		   				<li class="l11"><a href="">Rock</a></li>
		   				<li class="l12"><a href="">Pop</a></li>
		   				<li class="l13"><a href="">Classic</a></li>
		   			</ul>

	   				</li>
	   		</div>
	   		<div class="l4"><li><a href="../search/index.php"> Поиск</a></li></div>
	   			
	   		</div>
  		</ul>
	</div>
	<div class="banners">
	
		
		<div id="rotator">
  			<ul>
  			<li class="show"><a href="" ><img src="img/banners/lp.png" alt="pic1" /></a></li>
   			<li ><a href="" ><img src="img/banners/30Seconds.png" alt="pic2" /></a></li>
   			<li ><a href="" ><img src="img/banners/korn.png" alt="pic3" /></a></li>
   			<li ><a href="" ><img src="img/banners/rhcp.png" alt="pic4" /></a></li>	
			</ul>
			<script type="text/javascript">
				 
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
		</script>
	</div>
	<div class="inf" >
		<div class="line1">
			<div class="col11">
				<a href=""><img src="img/pic1.png"></a>
				<div class="txt">
					<h3>Linkin Park</h3>
					20.04.2015<br>
					Харьков<br>
					Палац Спорта<br>
					<a href=""><u>Подробнее</u></a>
				</div>
			</div>
			<div class="col12">

				<?
				include $_SERVER['DOCUMENT_ROOT']."/managers/functions.php";

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
				$query = "SELECT ` path` as p FROM `picture` WHERE id="."\"".$ipic."\"";
				$result = queryDB($query);
				$row =mysql_fetch_array( $result);
				$pic = $row["p"];
				?>

				<a href=<? echo "../articles/article.php?id_con=".$icon."&id_pic=".$ipic."&id_ar=".$iarea;?>><img src=<? echo "\"".$pic."\"";?>></a>
				<div class="txt">
					<h3><?echo $name; ?></h3>
					<? echo $date; ?><br>
					<? echo $town; ?><br>
					<? echo $club; ?><br>
					<a href=<? echo "index1.php?id_con=".$icon."&id_pic=".$ipic."&id_ar=".$iarea;?>><u>Подробнее</u></a>
				</div>
			</div>
		</div>
		<div class="line2">
			<div class="col21">
				<a href=""><img src="img/pic3.png"></a>
				<div class="txt">
					<h3>RHCP</h3>
					17.05.2014<br>
					Харьков<br>
					Палац Спорта<br>
					<a href=""><u>Подробнее</u></a>
				</div>
			</div>
			<div class="col22">
				<a href=""><img src="img/pic4.png"></a>
				<div class="txt">
					<h3>Korn</h3>
					17.10.2014<br>
					Харьков<br>
					Палац Спорта<br>
					<a href=""><u>Подробнее</u></a>
				</div>
			</div>
		</div>
	</div>
	<div class="footBar">

	</div>
</body>
</html>