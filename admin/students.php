<?php
      require_once "db_con.php";
      include_once "navbar.php";
      include_once "sidebar.php";

      $slNo=0;

      $student="SELECT * FROM  students";
      $studentQuery=$conn->query($student);
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
              <table id="example1" class="table table-striped table-hover table-bordered">
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
                ?>
                  <tr>
                    <td><?php echo ++$slNo?> </td>
                    <td><img src="assets/upload_images/>" alt="student_img" style="width: 6rem; height: 6rem;"></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone']?></td>
                    <td><?php echo $row['address']?></td>
                    <td><?php echo $row['gender_id']?></td>
                    <td>
                      <a href="" class="edit" title="Edit" data-toggle="tooltip"><i
                          class="far fa-edit"></i></a>
                      <a href="" class="delete" title="Delete" data-toggle="tooltip"><i
                          class="far fa-trash-alt"></i></a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tfoot>
                <th>
                  Student Data
                </th>
                      
                </tfoot>
              </table>
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