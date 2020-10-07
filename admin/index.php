<?php session_start();

if (isset($_SESSION['usuario']) AND $_SESSION['usuario'] === '666') {
	header('Location: menu_admin.php');
} else{
	header('Location: ../menu.php');
}

?>