<?
include $_SERVER['DOCUMENT_ROOT']."/managers/functions.php";

//echo "string = ".$_GET["id_con"];
//echo "string = ".$_GET["id_pic"];

$query = "SELECT ` path` as p FROM `picture` WHERE id="."\"".$_GET["id_pic"]."\"";
$result = queryDB($query);
$row =mysql_fetch_array( $result);

$pic = $row["p"];

$query = "SELECT * FROM `concert` WHERE id="."\"".$_GET["id_con"]."\"";
$result = queryDB($query);
$row = mysql_fetch_array( $result);

$name = $row["name"];
$day  = $row["date"];
$time = $row["time"];

$query = "SELECT * FROM `area` WHERE id="."\"".$_GET["id_ar"]."\"";
$result = queryDB($query);
$row = mysql_fetch_array( $result);

$name_area = $row["name"];
$town = $row["town"];
$addr = $row["address"];

$query = "SELECT * FROM `article` WHERE id="."\"".$_GET["id_con"]."\"";
$result = queryDB($query);
$row = mysql_fetch_array( $result);

$query = "SELECT * FROM `content` WHERE id="."\"".$row["content_id"]."\"";
$result = queryDB($query);
$row = mysql_fetch_array( $result);
$content = $row["content"];

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
		   				<li class="l11"><a href="">Rock</a></li>
		   				<li class="l12"><a href="">Pop</a></li>
		   				<li class="l13"><a href="">Classic</a></li>
		   			</ul>

	   				</li>
	   		</div>
	   		<div class="l4"><li><a href="../search/index.php"> Поиск</a></li></div>
	   	</ul>
	</div>
   			   			
	<div class="inf" >
		<div class="top">
			<form>
				<input type="text" name="town" size="15">
				<input type="submit" value="Поиск">
			</form>
		</div>
		<div class="bot">
			йцу			
		</div>

	</div>
	<style type="text/css">
	.inf{
	
		height: 600px;
		background: linear-gradient(to top, #fefcea, #979595);
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