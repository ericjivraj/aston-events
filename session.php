<?php

session_start();
if($_SESSION['username']) {
	echo "";
}else {
	header ("Location: /astonevents/error_session.php");
}

?>
