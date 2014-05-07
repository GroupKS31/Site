<?
include $_SERVER['DOCUMENT_ROOT']."/functions/functions1.php";

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

<!--Menu-->
	<?		PrintMenu();	?>
<!--End Menu-->   
   			   			
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
		padding-bottom: 10px;
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