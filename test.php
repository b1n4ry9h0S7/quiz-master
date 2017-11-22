
<?php
if(!isset($_COOKIE["team_name"])) {
     echo "Cookie is not set!";
} else {
     echo "Cookie is set!<br>";
     echo "Value is: " . $_COOKIE['team_name'];
}
?>