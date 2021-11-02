<?php  
require_once "db_con.php";

// Insert
if( isset($_POST['submit']) && $_POST['submit'] == 'Submit' ) {

    $fileName=$_FILES["image"]["name"];
    $tempName=$_FILES["image"]["tmp_name"];
    $uploadFileName=time()."_".$fileName;
    $fileDirectory="upload/".$uploadFileName;

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
    $stream = $_POST['StreamHonours'];

    $query = "INSERT INTO students SET  name ='".$name."', 
                                        email = '".$email."', 
                                        phone = '".$phone."',  
                                        address = '".$address."',
                                        image='".$uploadFileName."',
                                        gender_id=".$gender.",
                                        year_id='".$year."',
                                        password ='".md5($password)."'";

    //echo $query; die();
    $conn->query($query);
    $id = $conn->insert_id;
//Insert hobbies   
    if(count($hobbies) > 0 ) {
        foreach ($hobbies as $key => $hobby) {
            
            $sql = "INSERT INTO student_hobby SET student_id =".$id." , 
                                                  hobby_id =".$hobby."";

           $conn->query($sql);
        }
    }

//Insert subject
            $sql="INSERT INTO student_subject SET student_id='".$id."',
                                                  subject_id='".$subject."'";

            $conn->query($sql);

//Insert Stream/Honours
            $streamSql="INSERT INTO student_stream SET streams_id='".$stream."',student_id='".$id."'";

            $conn->query($streamSql);
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
                        <div class="row">
                            <div class="col text-center">
                                <div class="btn-group btn-group-lg">
                                    <button type="button" class="btn btn-primary" id="loginBtn" onclick="login()">Login</button>
                                    <button type=" button" class="btn btn-primary" id="regBtn" onclick="register()">Registation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card Header End -->
                    <!-- Card Body Start -->
                    <div class="card-body">
                        <div class="row mx-2 d-flex justify-content-center">
                            <div class="col-8" id="login">
                                <!-- Fieldset Start -->
                                <fieldset class="form-group border p-2">
                                    <legend>
                                        <strong>Login</strong>
                                    </legend>
                                    <!-- Login Form Start -->
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>
                                    <!-- Login Form End -->
                                </fieldset>
                                <!-- Fieldset End -->
                            </div>

                            <div class="col-10" id="register">
                                <!-- Fieldset Start -->
                                <fieldset class="form-group border p-2">
                                    <legend>
                                        <strong>Registration</strong>
                                    </legend>
                                    <!-- Registration Form Start -->
                                    <form action="login_registration.php" method="post" enctype="multipart/form-data">
                                        <!-- Name Input Start -->
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                                        </div>
                                        <!-- Name Input End -->
                                        <!-- Email Input Start -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                                        </div>
                                        <!-- Email Input End -->
                                        <!-- Phone Input Start -->
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter phone no" name="phone">
                                        </div>
                                        <!-- Phone Input End -->
                                        <!-- Address Input Start -->
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                        </div>
                                        <!-- Address Input End -->
                                        <!-- Gender Input Start -->
                                        <?php 
                                        $gender="SELECT * FROM genders WHERE status = 'Y'";
                                        $query=$conn->query($gender);
                                        ?>

                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                                <select id="gender" class="form-control" name="gender">
                                                    <option selected disabled value="">Select Gender</option>
                                                        <?php 
                                                            while($row=mysqli_fetch_array($query)){
                                                        ?>
                                                            <option value="<?php echo $row["id"]?>"><?php echo $row["name"]?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                </select>
                                        </div>
                                        <!-- Gender Input End -->
                                        <!-- Which Year Input Start -->
                                        <?php
                                            $sql="SELECT * FROM years WHERE status='Y'";
                                            $yearSet=$conn->query($sql);
                                            ?>
                                            <div>
                                                <label for="whichYear">Which Year</label>
                                                <div class="form-check form-check-inline ml-3" id="whichYear">
                                                <?php 
                                                while($row=mysqli_fetch_array($yearSet))
                                                {
                                                ?>
                                                        <input class="form-check-input" type="radio" name="wh_year" id="wh_year" value="<?php echo $row['id']?>">
                                                        <label class="form-check-label" for="wh_year"><?php echo $row['name'] . "&nbsp &nbsp"?></label>
                                                <?php
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        <!-- Which Year Input end -->
                                        <!-- Subject Input Start -->
                                        <?php
                                           
                                            ?>
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <select multiple class="form-control" id="subject" name="subject">
                                                    <?php
                                                        $sql="SELECT * FROM  subjects WHERE status='Y'";
                                                        $subjectSet=$conn->query($sql);
                                                        while($row=mysqli_fetch_array($subjectSet)){
                                                    ?>
                                                            <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                                    <?php
                                                    };
                                                    ?>
                                                </select>
                                            </div>
                                        <!-- Subject Input End -->
                                        <!-- Stream/Honours Input Start -->
                                        
                                        <div class="form-group">
                                            <label for="StreamHonours">Stream/Honours</label>
                                            <select name="StreamHonours" id="StreamHonours" class="form-control">
                                                <optgroup>
                                                    <option disabled selected value="">Select Stream / honours</option>
                                                </optgroup>
                                                    <?php
                                                        $streamSql="SELECT * FROM  streams WHERE parent_id=0";
                                                        $streamSet=$conn->query($streamSql);
                                                        while($row=mysqli_fetch_array($streamSet)){
                                                    ?>
                                                <optgroup label="<?php echo $row['name']?>">
                                                    <?php
                                                        $Sql="SELECT * FROM  streams WHERE parent_id=".$row['id'];
                                                            $Set=$conn->query($Sql);
                                                            while($row2=mysqli_fetch_array($Set)){
                                                    ?>
                                                    <option value="volvo"><?php echo $row2['name']?></option>
                                                    <?php }?>
                                                </optgroup>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <!-- Stream/Honours Input End -->
                                        <!-- Hobbies Input Start -->
                                        <?php
                                            $sql = "SELECT * from hobbies WHERE status = 'Y'";
                                            $hobbySet = $conn->query($sql);
                                            ?>
                                            <div class="form-group">
                                                <label for="hobbyHading" class="mt-2">Hobbies</label>

                                                    <?php 
                                                        while( $row = mysqli_fetch_array( $hobbySet, MYSQLI_ASSOC)) {
                                                    ?>
                                                        <div class="form-check" id="hobbyHading">
                                                            <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
                                                        </div>
                                                </label>
                                                    <?php 
                                                    }
                                                    ?>
                                            </div>
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
                        <p>Student Online Login And Registation</p>
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
    <script>
        var logForm = document.getElementById("login");
        var regForm = document.getElementById("register");

        regForm.style.display = "none";
        document.getElementById("loginBtn").disabled = true;

        function login() {
            regForm.style.display = "none";
            logForm.style.display = "inline";
            document.getElementById("loginBtn").disabled = true;
            document.getElementById("regBtn").disabled = false;
        }

        function register() {
            logForm.style.display = "none";
            regForm.style.display = "inline";
            document.getElementById("regBtn").disabled = true;
            document.getElementById("loginBtn").disabled = false;
        }
    </script>
</body>

</html>