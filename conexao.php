<?php
// $conexao = mysqli_connect(
//     hostname: "localhost:3306", 
//     username: "root", 
//     password: "", 
//     database: "cafeimetro");

$conexao = new mysqli('localhost:3306','root','','cafeimetro');
$conexao->set_charset('utf8');
?>