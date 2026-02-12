<?php

$userMail = $_POST["user-mail"];
$adminMail = $_POST["admin"];

$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];

$headers = "From: $userMail";


mail($adminMail, $asunto, $mensaje, $headers);

header("Location: ./../pages/dashboard.php");

?>