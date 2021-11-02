<?php
      require_once "db_con.php";
      include_once "navbar.php";
      include_once "sidebar.php";

      $slNo=0;

      $studentData="SELECT S.id, S.name,S.phone, S.email,G.name AS gender_name,S.address,S.image,S.gender_id,S.year_id FROM students AS S JOIN genders AS G ON G.id=S.gender_id";
      $studentQuery=$conn->query($studentData);

      //Show Year
      $yearSql="SELECT S.id,Y.name FROM students AS S JOIN years AS Y ON S.year_id=Y.id";
      $yearQuery=$conn->query($yearSql);
?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="mt-1">Manage Students<span id="txt"> Control panel</span> </h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item">Manage Students</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <div class="container">
            <div class="table-wrapper">
              <div class="table-title">
                <div class="row d-flex justify-content-end">
                  <!-- <div class="col-sm-8">
                    <button class="btn btn-primary mb-3"><a href="add_student.php" id="addBtn">
                    <i class="far fa-plus-square"></i> ADD
                    </a>
                     </button>
                  </div> -->
                  <div class="col-sm-4 mb-3">
                    <form method="POST">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search here" name="search">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary" name="submit" type="submit" type="button">Search</button>
                        </div>
                      </div>
                                            
                     </form>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col" style="overflow-x:auto">
                <table id="table" class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email Id</th>
                      <th>Phone Number</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th>Which Year</th>
                      <th>Subject</th>
                      <th>Stream/Honours</th>
                      <th>Hobbies</th>
                      <th>ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while($row=mysqli_fetch_array($studentQuery)){

                    //Show Stream/Honours
                     $streamSql="SELECT * FROM streams AS Str JOIN degrees AS Deg ON Str.parent_id=Deg.id";

                     $streamQuery=$conn->query($streamSql);
                  ?>
                    <tr>
                      <td><?php echo ++$slNo?> </td>
                      <td>
                      <img src="../user/upload/<?php echo $row['image']?>" alt="student_img" style="width: 6rem; height: 6rem;">
                      <td><?php echo $row['name']?></td>
                      <td><?php echo $row['email']?></td>
                      <td><?php echo $row['phone']?></td>
                      <td><?php echo $row['address']?></td>
                      <td>
                        <?php echo $row['gender_name']?>
                      </td>
                      <td>
                      <?php
                          $yearSql="SELECT * FROM years WHERE id=".$row['year_id'];
                          
                          $yearQuery=$conn->query($yearSql);
                          while($rowYear=mysqli_fetch_array($yearQuery)){
                             echo $rowYear['name'];
                          }
                      ?>
                      </td>
                      <td>
                       <?php $subSql="SELECT S.id,S.name,SS.id,SS.student_id,SS.subject_id FROM subjects AS S JOIN student_subject AS SS ON S.id=SS.subject_id WHERE SS.Student_id=".$row['id'];
                        $subQuery=$conn->query($subSql);
                        while($rowSub=mysqli_fetch_array($subQuery)){
                             echo $rowSub['name'];
                        }
                        ?>
                      </td>
                      <td>
                       <?php 
                       //$degreeSql="SELECT name FROM streams WHERE id=parent_id";
                       $steamSql="SELECT * FROM student_stream AS SS JOIN streams AS S ON SS.streams_id=S.id WHERE SS.student_id=".$row['id'];
                       $steamQuery=$conn->query($steamSql);
                       while($steam=mysqli_fetch_array($steamQuery)){
                             echo $steam['name'];
                        }
                       ?>
                      </td>
                      <td>
                        <ul>
                           <?php
                           $hobbySql = "SELECT H.name FROM student_hobby AS SB JOIN hobbies AS H ON SB.hobby_id = H.id  WHERE SB.student_id=".$row['id'];
                            $hobbyQuery=$conn->query($hobbySql);
                            while($row2=mysqli_fetch_array($hobbyQuery)){?>
                            <li><?php echo $row2['name']; ?></li> 
                          <?php } ?>
                        </ul>
                      </td>
                      <td>
                        <a href="edit_student.php?id=<?php echo $row['id']?>" class="edit" title="Edit" data-toggle="tooltip"><i
                            class="far fa-edit"></i></a>
                        <a href="delete_student.php?id=<?php echo $row['id']?>" class="delete" title="Delete" data-toggle="tooltip"><i
                            class="far fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                  <tfoot>
                  <th colspan="12" class="text-center">
                    <strong>Student Data</strong>
                  </th>
                  </tfoot>
                </table>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
      include_once "footer.php";
    ?>