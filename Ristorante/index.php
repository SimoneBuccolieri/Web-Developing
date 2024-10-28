<?php
require 'classes.php';
include 'connectDB.php';



if (!isset($_COOKIE["cellulare"])) {
    include 'view/welcome.html';
} else {
    include 'view/controlpanel.php';
}

include 'view/footer.html';    
