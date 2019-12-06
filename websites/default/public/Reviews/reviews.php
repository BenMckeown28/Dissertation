<?php
/*If the user is logged into the system they will be granted access to the system*/
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
/*Page loads up other pages in order to run*/
require '../functions/loadTemplate.php';
require '../config.php';
require '../header.php';

require '../templates/reviewsmenu.html.php';
}
else{
    header("location:../login.php");
}
?>
</div>
</div>
