<?
include $_SERVER['DOCUMENT_ROOT']."/managers/functions.php";

//"where band.band_name like \'%to%\'\n"

	$arri = array();




?>
<html>
<title>
	Buying tickets
</title>
<head>
<meta charset="utf-8">
	<link type='text/css' rel='stylesheet' href='scheme.css' />
</head>
<body style="background-color:#ffffff">

	<div class="menu" >
		<ul class="nav" >
  			<div class="l1"><li><a href="../index.php">Главная</a></li></div>
   			<div class="l2"><li><a href=""> О нас</a></li></div>
   			<div class="l3"><li><a href=""> Жанр</a>

		   			<ul >
		   				<li class="l11"><a href="../search/genre.php?genre=rock">Rock</a></li>
		   				<li class="l12"><a href="../search/genre.php?genre=pop">Pop</a></li>
		   				<li class="l13"><a href="../search/genre.php?genre=classic">Classic</a></li>
		   			</ul>

	   				</li>
	   		</div>
	   		<div class="l4"><li><a href="../search/index.php"> Поиск</a></li></div>
	   	</ul>
	</div>
   			   			
	<div class="inf" >
		<div class="top">
			<form method = "post" id="form">
				<input id="INtown" type="text" name="search" size="50">
				<input id="INfind" type="submit" value="Поиск"><br>
				<input type="radio" name="band" >Группа
				<input type="radio" name="town" >Город
			</form>
		</div>
		<div class="bot">
			<?
			if($_POST["search"]!=""){
				if ($_POST["band"] = "on") {
					$sql_where = "where band.band_name like '%".$_POST["search"]."%'\n";
					GetSmallInf( $sql_where);

				}
				
				if ($_POST["town"]="on") {
					$query = "SELECT id FROM area where area.town like '%".$_POST["search"]."%'\n";
					$result = queryDB($query);
					while ($row = mysql_fetch_row($result)) {
						$sql_where = "where concert.area_id=".$row[0];
					    GetSmallInf( $sql_where);
					}
				}
			}
		


		 	?>	
		</div>

	</div>
	<style type="text/css">
	.inf{
	
		height: 600px;
		background: linear-gradient(to top, #fefcea, #979595);
	}
	.inf .top{
		width: 920px;
		height: 50px;
		padding-top: 20px;
		margin: 0px auto;
		margin-top: 10px;
		background-color: #D3D3D3;
	}
	#form{
		margin: 0px,auto;
	}
	#INfind{
    	font-size:25px;
    }
	#INtown{
		font-size:25px;
	}
	.inf .line1{
		position: relative;
	}
	.inf .line1 .left{
		position: absolute;
		top:10px;
 		left:10px;
		height:219px;
		width: 219px;
		
		padding-left: 5px;
		background-color: #D3D3D3;
	}
	.inf .line1 .right{
		position: absolute;
		top:10px;
 		right:10px;

		height:219px;
		width: 700px;
		background-color: #8B8989;

		white-space:nowrap;
		display: inline;
	
		text-align: center;
		color: #ffffff;
		
		font-size: 20px;

	}

	.inf .line2{
		position: absolute;
	}
	.inf .line2 .left{
		position: absolute;
		top:0;
 		left:10px;
		height:400px;
		width: 714px;


		display: inline;
	
		text-align: left;
font-size: 20px;
		background-color: #8B8989;
	}
	.inf .line2 .right{
		position: absolute;
		top:0;
 		right:10px;

		height:200px;
		width: 200px;

		padding-right: 10px;
		
		background-color: #D3D3D3;
	}

	</style>
</body>
</html>