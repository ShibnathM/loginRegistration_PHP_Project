<?php
      require_once "db_con.php";

      $id=$_REQUEST["id"];

      $genderDelete="DELETE FROM subjects WHERE id='$id'";
      $genderQuery=$conn->query($genderDelete);
      header("location:add_subject.php");
?>