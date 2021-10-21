<?php
require_once "db_con.php";

if(isset($_POST['submit'])){
      $hobby=$_REQUEST['gender'];

      $sql="INSERT INTO hobbies (id, name, status) VALUES (NULL, '".$hobby."', 'Y')";

      $conn->query($sql);
      $id = mysqli_insert_id($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
      <form action="" method="get">
             <div class="form-group">
                  <label for="email">Hobby</label> <input type="text" class="form-control" id=" hobby" placeholder="Enter hobby" name="hobby">
             </div>
             <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
      </form>
</body>
</html>