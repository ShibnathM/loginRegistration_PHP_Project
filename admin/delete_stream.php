<?php
      require_once "db_con.php";

      $id=$_REQUEST['id'];
      $deleteStream="DELETE FROM streams WHERE id=$id";
      $queryStream=$conn->query($deleteStream);
      header("location:add_stream.php");
?>