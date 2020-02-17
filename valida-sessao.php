<?php

session_start();

if (isset($_SESSION['login'])){
//print_r($_SESSION);
} else {
	echo "<script>alert('Acesso indevido')</script>";
	echo "<script>window.location.href='signin.html'</script>";
}

?>