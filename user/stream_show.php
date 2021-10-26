<?php
      require_once "db_con.php";

      $showStream="SELECT * FROM streams WHERE status-'Y'";
      $queryStream=$conn->query($showStream);

?>

<div class="form-group">
      <label for="StreamHonours">Stream/Honours</label>
            <select name="StreamHonours" id="StreamHonours" class="form-control">
                  <optgroup>
                        <option disabled selected value="">Select Stream / honours</option>
                  </optgroup>
                  <?php
                        while($row=mysqli_fetch_array($queryStream)){
                  ?>
                  <optgroup label="<?php echo $row['parent_id']?>">
                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                  </optgroup>
                  <?php
                        }
                  ?>
            </select>
</div>