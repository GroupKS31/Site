<?
include $_SERVER['DOCUMENT_ROOT']."/managers/functions.php";

	$arri = array();

	$query = "SELECT * FROM Small_inf where actuality=1";
	$result = queryDB($query);

	$count =0;
	while($row =mysql_fetch_array($result)) {
		$count++;
		array_push($arri, array("pic_id"	=>"".$row["pic_id"],
								"area_id"	=>"".$row["area_id"],
								"con_id"	=>"".$row["concert_id"],));
	}	

	$arrd = array();
	for ($i=0; $i <$count ; $i++) { 
		$arr = $arri[$i];
	
		$query = "SELECT `name`,`town` FROM `area` where id=".$arr["area_id"];
		$result = queryDB($query);
		$row =mysql_fetch_array( $result);
		$town = $row["town"];
		$club = $row["name"];

		$query = "SELECT `name` , `date` FROM `concert` where id=".$arr["con_id"];
		$result = queryDB($query);

		$row =mysql_fetch_array( $result);
		$name = $row["name"];
		$date = $row["date"];


		$query = "SELECT `path` FROM `picture` WHERE id=".$arr["pic_id"];
		$result = queryDB($query);
		$row =mysql_fetch_array( $result);
		$pic = $row["path"];

		array_push($arrd, array("town"	=>$town,
								"club"	=>$club,
								"name"	=>$name,
								"date"	=>$date,
								"pic"	=>$pic,));


	}

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
			<form id="form">
				<input id="INtown" type="text" name="town" size="50">
				<input id="INfind" type="submit" value="Поиск">
			</form>
		</div>
		<div class="bot">
			<?
			$i =$count;
			for ($i=0; $i <$count ; $i++) { 
				$arr = $arrd[$i];
				$arr1 = $arri[$i];
			
				echo "  <div class=\"col11\">
							<a href=\"../articles/article.php?id_con=".$arr1["con_id"]."&id_pic=".$arr1["pic_id"]."&id_ar=".$arr1["area_id"]."\"><img src=\"".$arr["pic"]."\"></a>
							<div class=\"txt\">
								<h3>".$arr["name"]."</h3>
								".$arr["town"]."<br>
								".$arr["date"]."<br>
								".$arr["club"]."<br>
								<a href=\"../articles/article.php?id_con=".$arr1["con_id"]."&id_pic=".$arr1["pic_id"]."&id_ar=".$arr1["area_id"]."\"><u>Подробнее</u></a>
							</div>";
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