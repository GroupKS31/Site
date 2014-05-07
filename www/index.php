<?
include $_SERVER['DOCUMENT_ROOT']."/functions/functions1.php";

?>

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

<!--Menu-->
	<?		PrintMenu();	?>
<!--End Menu-->   			
	   		</div>
  		</ul>
	</div>
	<div class="banners">
	
		
		<div id="rotator">
  			<ul>
  				<?
					$banners = GetBanners();
					for( $i=0; $i< count($banners);$i++ ) {
						if($i == 0)	echo   "<li class=\"show\"><a href=".$banners[$i]["href"]."=><img src=\"".$banners[$i]["path"]."\" alt=\"pic".$i."\" /></a></li>";
						else	    echo   "<li><a href=".$banners[$i]["href"]."=><img src=\"".$banners[$i]["path"]."\" alt=\"pic".$i."\" /></a></li>";
					}
  				?>
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
		<?
	
		GetSmallInf("WHERE article.flag = 1\n");		
		?>
		</div>

	<!--<div class="footBar">

	</div>-->
</body>
</html>