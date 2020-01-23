<?php
include("dbconnect.php");
if (isset ($_GET['event_id'])) {
  $eventid=$_GET['event_id'];
  $sql = "UPDATE event SET like_count= (like_count + 1) WHERE event_id=$eventid";
  $check=mysqli_query($connect, $sql);
  header("Location: eventliked.php");
}
