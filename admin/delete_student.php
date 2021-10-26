<?php
      require_once "db_con.php";

      $id=$_REQUEST['id'];
      $deleteStudent="DELETE FROM students WHERE id=$id";
      $queryStudent=$conn->query($deleteStudent);
      header("location:students.php");
?>