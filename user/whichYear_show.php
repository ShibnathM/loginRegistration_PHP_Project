<?php
require_once "db_con.php";

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
            <input class="form-check-input" type="radio" name="wh_year" id="first" value="<?php $row['id']?>">
            <label class="form-check-label" for="first"><?php echo $row['name'] ?></label>
      <?php
      }
      ?>
      </div>

      <!-- <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="wh_year" id="second" value="2">
            <label class="form-check-label" for="second">2nd Year</label>
      </div>

      <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="wh_year" id="third" value="2">
            <label class="form-check-label" for="third">3rd Year</label>
      </div> -->
</div>