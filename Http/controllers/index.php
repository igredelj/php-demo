<?php

$_SESSION['name'] = 'Igor';
$heading = "Home";

view("index.view.php", ['heading' => 'Home']);