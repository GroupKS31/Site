
<html>

<title></title>
<body>
	<?
	include "functions.php";
	if( count($_POST) == 0 ){
	?>
		<div class=\"main\"><DIV>
		    <h1> Необходима авторизация!  </h1> <br/>
		    <p></p>
		    <table class="tauth">
		    <form method="post">
		        <tr><td>Логин:</td>
		        <td><input type="text" name="login" size="32" value=""/></td>
		        </tr>
		        <tr><td>Пароль:</td>
		        <td><input type="password" name="psw" size="32" value=""/></td>
		        </tr>
		        <tr><td></td><td><input type="submit" value="Вход" /></td></tr>
		    </form>
		    </table>
		</div></div>
	<?
	}
	else{

		$query = "SELECT * FROM users WHERE cat =\"manager\" and name = "."\"".(string)$_POST["login"]."\" and pswd = \"".(string)$_POST["psw"]."\"";
		$result = queryDB($query);
		$row =mysql_fetch_array( $result);
		$name = $row["name"];
		$id = $row["id"]
	?>
		<div class ="Top">
			<P>Hello <? echo $name; ?> </p>				
		</div>	
		<div class = "LPanel">
		</div>
		<div class = "Rpanel">
		</div>
	<?			


		}
	?>
</body>
</html>
