
<?
include "functions.php";

	if($_POST["login"] == "" || $_POST["psw"] == "" || count($_POST) > 0){

	echo "
		<html>

		<title></title>
			<body>
				<div class=\"main\"><div >
		    <h1> Необходима авторизация!  </h1> <br/>
		    <p></p>
		                    <table class=\"tauth\">
		            <form method=\"post\">
		                <tr><td>Логин:</td>
		                    <td><input type=\"text\" name=\"login\" size=\"32\" value=\"\"/></td>
		                </tr>
		                <tr><td>Пароль:</td>
		                    <td><input type=\"password\" name=\"password\" size=\"32\" value=\"\"/></td>
		                </tr>
		                                <tr><td></td><td><input type=\"submit\" value=\"Вход\" /></td></tr>
		            </form>
		        </table>
		</div></div>
			</body>
		</html>
		";
	}
	else{

	}
?>