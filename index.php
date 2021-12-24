<?php
require "connection.php";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"/>
</head>
    <body>
        <div class="wrapper">
        <?php
        switch ($page) {
            case "homepage":
                require "./public/menutop/menutop.php";
                require "./public/menuleft/menuleft.php";
                require "pages/home/home.php";
                break;
            case "calendar":
                require "./public/menutop/menutop.php";
                require "./public/menuleft/menuleft.php";
                require "pages/calendar/calendar.php";
                break;
            case "newappointment":
                require "pages/appointment/newappointment.php";
                break;
            default:
                require "./public/menutop/menutop.php";
                require "./public/menuleft/menuleft.php";
                require "pages/home/home.php";
            }
        ?>
        </div>
        <!-- <script>
            function getNextday(){
                var day = document.getElementById('day').getAttribute('value');
                document.getElementById('day').innerText= $test;
            }
            function getPrevday(){
                var day = document.getElementById('day').getAttribute('value');
            }
        </script> -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>