<?php
// se cierra la sesión y se borra la cookie de session name
$_SESSION = [];
session_unset();
session_destroy();
setcookie(session_name(), 1, time() - 1000, "/");

// se crea la cookie de la decha de última actividad con duración de un mes
setcookie("last_activity", date("d-m-Y H:i:s") , time() + 3600 * 730, "/");
header("Location: ./../index.php");