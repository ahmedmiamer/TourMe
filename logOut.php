<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();    
session_unset();
$_SESSION['priv'] = 0;
echo "Successfully Logged Out !<br>";

header("location:mainindex.php");

