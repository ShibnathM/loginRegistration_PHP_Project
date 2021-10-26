<?php
      require_once "db_con.php";

      $id=$_REQUEST["id"];

      $hobbyDelete="DELETE FROM hobbies WHERE id='$id'";
      $hobbyQuery=$conn->query($hobbyDelete);
      header("location:add_hobby.php");
?>