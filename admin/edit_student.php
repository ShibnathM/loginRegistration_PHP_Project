<?php  
require_once "db_con.php";

      $id=$_REQUEST['id'];

//Show Data
      $studentShow="SELECT * FROM students WHERE id='".$id."'";
      $studentQuery=$conn->query($studentShow);
      $row=mysqli_fetch_array($studentQuery);

// Update
if( isset($_POST['submit']) &&  $_POST['submit'] == 'Submit' ) {

    $fileName=$_FILES["image"]["name"];
    $tempName=$_FILES["image"]["tmp_name"];
    $uploadFileName=time()."_".$fileName;
    $fileDirectory="../user/upload".$uploadFileName;

    move_uploaded_file($tempName,$fileDirectory);

    $name = $_POST['name'];
    $email = $_REQUEST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $hobbies = $_POST['hobbies'];
    $subject = $_POST['subject'];
    $year = $_POST['wh_year'];

    $query = "UPDATE students SET   name ='".$name."', 
                                    email = '".$email."', 
                                    phone = '".$phone."',  
                                    address = '".$address."',
                                    image='".$uploadFileName."',
                                    gender_id=".$gender.",
                                    year_id='".$year."',
                                    password ='".md5($password)."' 
                                    WHERE id=$id";

    //echo $query; die();
    $conn->query($query);
    $id = $conn->insert_id;
//update hobbies   
    if(count($hobbies) > 0 ) {
        foreach ($hobbies as $key => $hobby) {
            
            $sql = "UPDATE student_hobby SET student_id =".$id." , 
                                                  hobby_id =".$hobby."";

           $conn->query($sql);
        }
    }

//update subject
            $sql="UPDATE student_subject SET student_id='".$id."',
                                                  subject_id='".$subject."'";

            $conn->query($sql);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login_registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        legend {
            width: auto;
            color: green;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col mt-3">
                <div class="card">
                    <!-- Card Header Start -->
                    <div class="card-header">
                        <hr>
                    </div>
                    <!-- Card Header End -->
                    <!-- Card Body Start -->
                    <div class="card-body">
                        <div class="row mx-2 d-flex justify-content-center">
                            <div class="col-10" id="register">
                                <!-- Fieldset Start -->
                                <fieldset class="form-group border p-2">
                                    <legend>
                                        <strong>EDIT</strong>
                                    </legend>
                                    <!-- Registration Form Start -->
                                    <form action="login_registration.php" method="post" enctype="multipart/form-data">
                                        <!-- Name Input Start -->
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $row['name']?>">
                                        </div>
                                        <!-- Name Input End -->
                                        <!-- Email Input Start -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $row['email']?>">
                                        </div>
                                        <!-- Email Input End -->
                                        <!-- Phone Input Start -->
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter phone no" name="phone" value="<?php echo $row['phone']?>">
                                        </div>
                                        <!-- Phone Input End -->
                                        <!-- Address Input Start -->
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"><?php echo $row['address']?></textarea>
                                        </div>
                                        <!-- Address Input End -->
                                        <!-- Gender Input Start -->
                                        <?php  include "gender_show.php";?>
                                        <!-- Gender Input End -->
                                        <!-- Which Year Input Start -->
                                        <?php include_once "whichYear_show.php";?>
                                        <!-- Which Year Input end -->
                                        <!-- Subject Input Start -->
                                        <?php include_once "subject_show.php";?>
                                        <!-- Subject Input End -->
                                        <!-- Stream/Honours Input Start -->
                                        <?php include_once "stream_show.php"?>
                                        <!-- Stream/Honours Input End -->
                                        <!-- Hobbies Input Start -->
                                        <?php include_once "hobby_show.php";?>
                                        <!-- Hobbies Input End -->
                                        <!-- Image Upload Start -->
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Upload Image</label>
                                        </div>
                                        <!-- Image Upload End -->
                                        <!-- Password Input Start -->
                                        <div class=" form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        </div>
                                        <!-- Password Input End -->
                                        <!-- Conform Password Input Start -->
                                        <div class="form-group">
                                            <label for="conformPassword">Conform Password</label>
                                            <input type="password" class="form-control" id="conformPassword" placeholder="Password" name="conformPassword">
                                        </div>
                                        <!-- Conform Password Input End -->
                                        <!-- Submit Button Start -->
                                        <div class="form-group">
                                            <input type="submit" name="submit"class="btn btn-primary" value="Submit">
                                        </div>
                                        <!-- Submit Button End -->
                                    </form>
                                    <!-- Registration Form End -->
                                </fieldset>
                                <!-- Fieldset End -->
                            </div>
                        </div>
                    </div>
                    <!-- Card Body End -->
                    <!-- Card Footer Start -->
                    <div class="card-footer text-muted text-center">
                        <p>Student Data Edit</p>
                    </div>
                    <!-- Card Footer End -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>

</html>