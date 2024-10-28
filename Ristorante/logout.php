<?php
require 'classes.php';
include 'connectDB.php';
setcookie("id","",time() - (86400 * 30),"/");
setcookie("nome","",time() - (86400 * 30),"/");
setcookie("indirizzo","",time() - (86400 * 30),"/");
setcookie("cellulare","",time() - (86400 * 30),"/");
session_unset(); // Rimuove tutte le variabili di sessione
session_destroy(); // Distrugge la sessione
header("Location: index.php");
?>