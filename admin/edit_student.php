<?php  
require_once "db_con.php";
include_once "navbar.php";
//include_once "sidebar.php";

//Show Data
$id=$_REQUEST['id'];
$studentData="SELECT S.name,S.email,S.phone,S.address,S.image,S.gender_id,S.year_id,SS.streams_id FROM students AS S JOIN student_stream AS SS ON SS.student_id=S.id WHERE S.id='$id'";
// echo $studentData;
// die();
$studentQuery=$conn->query($studentData);
$student=mysqli_fetch_array($studentQuery);
$arr=array();

// Update Data
if( isset($_POST['dataSubmit']) &&  $_POST['dataSubmit'] == 'dataSubmit' ) {

    $fileName=$_FILES["image"]["name"];
    $tempName=$_FILES["image"]["tmp_name"];
    $uploadFileName=time()."_".$fileName;
    $fileDirectory="../user/upload".$uploadFileName;

    move_uploaded_file($tempName,$fileDirectory);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $hobbies = $_POST['hobbies'];
    $subject = $_POST['subject'];
    $year = $_POST['wh_year'];

    $query = "UPDATE students SET  name ='".$name."', 
                                        email = '".$email."', 
                                        phone = '".$phone."',
                                        address = '".$address."',
                                        image='".$uploadFileName."',
                                        gender_id=".$gender.",
                                        year_id='".$year."' 
                                        WHERE id='".$id."'";

    // echo $query; die();
    $conn->query($query);
    $id = $conn->insert_id;
//Update hobbies   
    if(count($hobbies) > 0 ) {
        foreach ($hobbies as $key => $hobby) {
            
            $sql = "UPDATE student_hobby SET student_id =".$id." , 
                                                  hobby_id =".$hobby."
                                                  WHERE student_id='".$id."'";

           $conn->query($sql);
        }
    }

//Update subject
            $sql="UPDATE student_subject SET student_id='".$id."',
                                                  subject_id='".$subject."'
                                                  WHERE student_id='".$id."'";

            $conn->query($sql);
    
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Student<span id="txt"> Control panel</span> </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="students.php">Manage Students</a></li>
              <li class="breadcrumb-item">Edit Student</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center">
          <!-- left column -->
          <div class="col">
            <!-- general form elements -->
            <div class="container-fluid">
        <div class="row">
            <div class="col mt-3">
                <div class="card card-primary">
                    <!-- Card Header Start -->
                    <div class="card-header">
                        <h3 class="card-title">EDIT</h3>
                    </div>
                    <!-- Card Header End -->
                    <!-- Card Body Start -->
                    <div class="card-body">
                        <div class="row mx-2 d-flex justify-content-center">
                            <div class="col-10" id="register">
                                <!-- Fieldset Start -->
                                <fieldset class="form-group border p-2">
                                    <legend>
                                        <strong>Edit Register</strong>
                                    </legend>
                                    <!-- Registration Form Start -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <!-- Name Input Start -->
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $student['name']?>">
                                        </div>
                                        <!-- Name Input End -->
                                        <!-- Email Input Start -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $student['email']?>">
                                        </div>
                                        <!-- Email Input End -->
                                        <!-- Phone Input Start -->
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter phone no" name="phone" value="<?php echo $student['phone']?>">
                                        </div>
                                        <!-- Phone Input End -->
                                        <!-- Address Input Start -->
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3"><?php echo $student['address']?></textarea>
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
                                                            <option value="<?php echo $row["id"]?>" <?php if($student['gender_id']==$row['id']) {?>selected="selected"<?php }?>>
                                                                <?php echo $row["name"]?>
                                                            </option>
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
                                                        <input class="form-check-input" type="radio" name="wh_year" id="wh_year" value="<?php echo $row['id']?>" <?php if($student['year_id']==$row['id']) {?>checked="checked"<?php }?>>
                                                        <label class="form-check-label" for="wh_year">
                                                            <?php echo $row['name'] . "&nbsp &nbsp"?>
                                                        </label>
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
                                                <select multiple class="form-control" id="subject" name="subject[]">
                                                    <?php
                                                        $sql2= "SELECT * FROM student_subject WHERE student_id=".$student['id'];
                                                        $query2=$conn->query($sql2);
                                                        // $subArr=array();
                                                        // $subArr[]=$query2['subject_id'];
                                                         
                                                        $sql="SELECT * FROM subjects WHERE status='Y'";
                                                        $subjectSet=$conn->query($sql);
                                                        while($row=mysqli_fetch_array($subjectSet)){
                                                    ?>
                                                            <option value="<?php echo $row['id']?>" <?php if($row['id']==$query2['subject_id']) {?> selected="selected"<?php }?>><?php echo $row['name']?></option>
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
                                                            <option value="<?php echo $row2['id']?>" <?php if($student['streams_id']==$row2['id']) {?>selected="selected"<?php }?>><?php echo $row2['name']?></option>
                                                    <?php }?>
                                                    </optgroup>
                                                        <?php
                                                            }
                                                        ?>
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
                                                        $sql3 = "SELECT hobby_id from student_hobby where student_id=".$id;
                                                        
                                                        $sqlQuery=$conn->query($sql3); 
                                                        $arr =array();
                                                        while($row3=mysqli_fetch_array($sqlQuery) ) {
                                                            $arr[] = $row3['hobby_id'];
                                                        }
                                                        while( $row = mysqli_fetch_array( $hobbySet, MYSQLI_ASSOC)) {
                                                    ?>
                                                        <div class="form-check" id="hobbyHading">
                                                            <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" name="hobbies[]" <?php if(in_array($row['id'], $arr) == true) { ?>  checked="checked" <?php } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
                                                        </div>
                                                </label>
                                                    <?php 
                                                    }
                                                    ?>
                                            </div>
                                        <!-- Hobbies Input End -->
                                        <!-- Image Upload Start -->
                                         <img src="../user/upload/<?php echo $student['image']?>" alt="student_img" style="width: 6rem; height: 6rem;">
                                        <div class="custom-file mt-2">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Upload Image</label>
                                        </div>
                                        <!-- Submit Button Start -->
                                        <div class="form-group mt-3">
                                            <input type="submit" name="dataSubmit"class="btn btn-primary px-4" value="Update Data">
                                        </div>
                                        <!-- Submit Button End -->
                                        <!-- Image Upload End -->
                                        <!-- Password Input Start -->
                                        <div class=" form-group">
                                            <label for="password">Reset Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                        </div>
                                        <!-- Password Input End -->
                                        <!-- Conform Password Input Start -->
                                        <div class="form-group">
                                            <label for="conformPassword">Conform Password</label>
                                            <input type="password" class="form-control" id="conformPassword" placeholder="Password" name="conformPassword">
                                        </div>
                                        <!-- Conform Password Input End -->
                                        <!-- password reset Button Start -->
                                        <div class="form-group">
                                            <input type="submit" name="passSubmit"class="btn btn-primary" value="Change Password">
                                        </div>
                                        <!-- password reset Button End -->
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
                        <p>Student Edit Register</p>
                    </div>
                    <!-- Card Footer End -->
                </div>
            </div>
        </div>
    </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once "footer.php";?> 