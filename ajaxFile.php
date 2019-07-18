<?php
include"connection.php";
  
  if (isset($_POST['dd_id'])) {
        echo'<option value="">select district</option>';
          $sql="select * from district where division_id=".$_POST['dd_id']." AND status=1";
          $stmt=$DB->prepare($sql);
          $stmt->execute();
          $table=$stmt->fetchAll();
                foreach($table as $row){
                	echo'<option value="'.$row['district_id'].'">'.$row['district_name'].'</option>';
                }
  }

   if (isset($_POST['diss_id'])) {
        echo'<option value="">select thana</option>';
          $sql="select * from thana where district_id=".$_POST['diss_id']." AND status=1";
          $stmt=$DB->prepare($sql);
          $stmt->execute();
          $table=$stmt->fetchAll();
                foreach($table as $row){
                	echo'<option value="'.$row['thana_name'].'">'.$row['thana_name'].'</option>';
                }
  }

?>