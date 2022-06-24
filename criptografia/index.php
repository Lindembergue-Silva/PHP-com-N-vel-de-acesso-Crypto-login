<?php 
include('conexao.php');

if(!isset($_SESSION))
	session_start();

if(!isset($_SESSION['usuario']))
	die('Você não está logado <a href="login.php">Clique aqui</a> para logar.');


if(isset($_POST['email'])) {

	

	$email = $_POST['email'];
	$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


	$mysqli->query("INSERT INTO senhas (email , senha) VALUES('$email', '$senha')");
}

$id = $_SESSION['usuario'];
$sql_query = $mysqli->query("SELECT * FROM senhas WHERE id = '$id'") or die($mysqli->error);
$usuario = $sql_query->fetch_assoc();

if($usuario['nivel'] != 'admin')
	die("Você não tem acesso a está página.");

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<p>Bem vindo, <?php echo $usuario['nome']; ?></p>
	<h1>Cadastrar Usuários</h1>
	<form action="" method="post">
		<input type="text" name="email"> <br><br>
		<input type="text" name="senha"><br><br>
		<button type="submit">Cadastrar Senha</button>
	</form>
	<p><a href="logout.php">Sair</a></p>

</body>
</html>
