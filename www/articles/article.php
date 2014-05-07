<?
include $_SERVER['DOCUMENT_ROOT']."/functions/functions1.php";



$pic = $_GET["logo"];
$iarea = $_GET["iarea"];
$iconcert = $_GET["iconcert"];
$icontent = $_GET["icontent"];

$query = "SELECT * FROM `concert` WHERE id=".$iconcert;
$result = queryDB($query);
$row = mysql_fetch_array( $result);

$name = $row["name"];
$day  = $row["date"];
$time = $row["time"];

$query = "SELECT * FROM `area` WHERE id="."\"".$iarea."\"";
$result = queryDB($query);
$row = mysql_fetch_array( $result);

$name_area = $row["name"];
$town = $row["town"];
$addr = $row["address"];

$query = "SELECT content FROM `content` WHERE id="."\"".$icontent."\"";
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

	<!--Menu-->
	<?		PrintMenu();	?>
<!--End Menu--> 
   			   			
	<div class="inf" >
		<div class="line1">

			<div class="left">
				<img src=<? echo "\"".$pic."\"";?>>

			</div>
			<div class="right">
				<? echo $name;?>
				<br>
				<? echo $day; ?>
				<br>
				<? echo $time;?>
				<br>
				<? echo $name_area;?>
				<br>
				<? echo $town;?>
				<br>
				<? echo $addr ?>
			</div>
		</div>
		<div class="line2">
			<div class="left">
				<?
					echo $content;
				?>	
			</div>

			<div class="right">
				<p>Осталось билетов</p>
				<p>Купленно билетов</p>
				<button>Купить</button>
			</div>
		</div>
		
	</div>

	<!--Menu-->
	<?		PrintFooter();	?>
<!--End Menu--> 
	
	<style type="text/css">
	.inf{
	
		min-height: 600px;
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