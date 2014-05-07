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
  		
		<?PrintRotator();?>
	</div>
	<div class="inf" >
		<?
	
		GetSmallInf("WHERE article.flag = 1\n");		
		?>
		</div>

	<!--Menu-->
	<?		PrintFooter();	?>
<!--End Menu--> 
</body>
</html>