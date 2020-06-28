<?php 

function redirect($url = 'index.php') {
    header("location: $url");
    die();
}