<?php
require_once "db_con.php";

$gender="SELECT * FROM genders WHERE status = 'Y'";
$query=$conn->query($gender);
?>

<div class="form-group">
    <label for="gender">Gender</label>
        <select id="gender" class="form-control" name="gender">
            <option disabled value="">Select Gender</option>
                <?php 
                    while($row=mysqli_fetch_array($query)){
                ?>
                    <option value="<?php echo $row["id"]?>"><?php echo $row["name"]?></option>
                <?php
                }
                ?>
        </select>
</div>