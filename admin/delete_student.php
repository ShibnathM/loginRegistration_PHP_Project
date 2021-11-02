<?php
      require_once "db_con.php";

      $id=$_REQUEST['id'];

      $imageDelete="SELECT image FROM students WHERE id=$id";
      $imageQuery=$conn->query($imageDelete);
      while($imgName=mysqli_fetch_array($imageQuery)){
            unlink("../user/upload/".$imgName['image']);
            echo "Delete Image";
      }

      $StudentData="DELETE FROM students WHERE id=$id";
      $queryStudent=$conn->query($StudentData);

      $StudentSubject="DELETE FROM student_subject WHERE student_id=$id";
      $querySubject=$conn->query($StudentSubject);
      
      $deleteStream="DELETE FROM student_stream WHERE student_id=$id";
      $queryStream=$conn->query($deleteStream);
      
      $deleteHobby="DELETE FROM student_hobby WHERE student_id=$id";
      $queryHobby=$conn->query($deleteHobby);

      header("location:students.php");
?>