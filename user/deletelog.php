<?php

include '../user/db.php';

$id =  $_GET['id'];
$sql = "DELETE FROM `analyzer_results` WHERE `id`='$id'";

if ($conn->query($sql) === TRUE) {
  echo "<script>
alert('Record Deleted Successfully');
window.location.href='ailog.php';
</script>";
} else {
  echo "<script>
alert('Something went wrong');
window.location.href='ailog.php';
</script>";
}







?>