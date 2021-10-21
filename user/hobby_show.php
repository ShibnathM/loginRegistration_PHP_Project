<?php
require_once "db_con.php";

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