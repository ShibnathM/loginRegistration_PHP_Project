<?php
require_once "db_con.php";

if(isset($_POST['submit'])){
      $con=new Connection();
      $db=$con->openConnection();

      $gender=$_REQUEST['gender'];

      $sql="INSERT INTO genders VALUES (NULL, '".$gender."', 'Y')";

      $query=$db->prepare($sql);
      $query->execute();
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
      <form action="" method="post">
             <div class="form-group">
                  <label for="email">Gender</label>
                  <input type="text" class="form-control" id="gender" placeholder="Enter gender" name="gender">
             </div>
             <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
      </form>
</body>
</html>