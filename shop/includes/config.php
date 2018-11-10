<?php

if(!isset($_SESSION['lang']))
    $_SESSION['lang'] = "en";
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
    
    if ($_GET['lang'] == "en")
        $_SESSION['lang'] = "en";

    else if ($_GET['lang'] == "kr")
        $_SESSION['lang'] = "kr";

    else if ($_GET['lang'] == "jp")
        $_SESSION['lang'] = "jp";


     else if ($_GET['lang'] == "cn")
        $_SESSION['lang'] = "cn";


     else if ($_GET['lang'] == "my")
        $_SESSION['lang'] = "my";
}

require_once "languages/" . $_SESSION['lang'] . ".php";


define('DB_SERVER','127.0.0.1');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'inflightapp');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>