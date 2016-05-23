<?php
ini_set("display_errors","On");
include("retwis.php");

if (!isLoggedIn()) {
    include("header.php");
    include("welcome.php");
    include("footer.php");
} else {
    header("Location:home.php");
    exit;
}
?>
