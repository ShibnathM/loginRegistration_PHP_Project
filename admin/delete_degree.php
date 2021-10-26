<?php
      require_once "db_con.php";

      $id=$_REQUEST["id"];

      $deleteDegree="DELETE FROM degrees WHERE id='$id'";
      $queryDegree=$conn->query($deleteDegree);
      header("location:add_degree.php");
?>