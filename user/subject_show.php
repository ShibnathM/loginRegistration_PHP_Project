<?php
require_once "db_con.php";

$sql="SELECT * FROM  subjects WHERE status='Y'";
$subjectSet=$conn->query($sql);
?>
<div class="form-group">
      <label for="subject">Subject</label>
      <select multiple class="form-control" id="subject" name="subject">
            <?php
            while($row=mysqli_fetch_array($subjectSet)){
            ?>
                  <option><?php echo $row['name']?></option>
            <?php
            };
            ?>
            <!-- <option>NumPy</option> -->
            <!-- <option>Anaconda</option> -->
            <!-- <option>NoteJs</option> -->
            <!-- <option>Java</option> -->
            <!-- <option>C++</option> -->
      </select>
</div>