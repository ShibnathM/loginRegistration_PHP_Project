<?php
      require_once "db_con.php";

      $id=$_REQUEST['id'];
      $yearDelete="DELETE FROM years WHERE id='$id'";
      $yearQuery=$conn->query($yearDelete);

      header("location:add_year.php");
?>