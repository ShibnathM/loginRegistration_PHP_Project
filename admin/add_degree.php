<?php
  require_once "db_con.php";
  include_once "navbar.php";
  include_once "sidebar.php";

  $slNo=0;

  $selectDegree="SELECT * FROM degrees WHERE status='Y'";
  $queyDegree=$conn->query($selectDegree);

  if(isset($_POST['submit'])){
        $degree=$_REQUEST['degree'];

        $insertDegree="INSERT INTO degrees SET name='".$degree."', status='Y'";
        $degreeQuery=$conn->query($insertDegree);
  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Degrees<span id="txt"> Control panel</span> </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item">Manage Degrees</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ADD</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="product">Add Degrees</label>
                      <input type="text" class="form-control" name="degree" id="degree" placeholder="Enter Degree">
                      <!-- <div class="msg" id="product_alert"></div> -->
                    </div>
                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                <!-- /.card-body -->

                  <div class="card-footer">
                  <table id="example1" class="table table-striped table-hover table-bordered">
                  <thead>
                  <tr>
                      <th>Sl No</th>
                      <th>Degree</th>
                      <th>Status</th>
                      <th>Delete</th>
                      <!-- <th>ACTIONS</th> -->
                  </tr>
                  </thead>
                </form>
                <tbody>
                  <?php while($row=mysqli_fetch_array($queyDegree)){
                  ?>
                    <tr>
                      <td><?php echo ++$slNo?></td>
                      <td><?php echo $row['name']?></td>
                      <td>Status</td>
                      <td>
                        <a href="delete_degree.php?id=<?php echo $row['id']?>" class="delete" title="delete" data-toggle="tooltip">
                          <i class="fa fa-times d-flex justify-content-center pr-1 text-danger" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                 
                </tbody>
                <!-- <tfoot>
                <th>
                  Student Data
                </th>
                      
                </tfoot> -->
              </table>
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