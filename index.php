<?php
  include"connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ajax Dropdown</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  

   


</head>
<body>
	<h2>select the menu item</h2>
	<form method="post" id="frm">
		<select name="division" id="division">
		<option value="">select division</option>
		<?php


           $sql="select * from division where status=1";
          $stmt=$DB->prepare($sql);
          $stmt->execute();
          $table=$stmt->fetchAll();
                foreach($table as $row){
                	echo'<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
                }
		?>
	 </select>
    <select name="district" id="district">
   	  <option value="">select district</option>
    </select>

    <select name="thana" id="thana">
   	  <option value="">select thana</option>
     </select><br>

    <table id="tbl">
    	<tr>
    		<td>
    			<input type="text" name="skill" id="skill">
    		</td>
    		<td>
    			<button type="button" id="add">Add More</button>
    		</td>
    	</tr>

    </table>
 </form>
	




</body>
</html>

 <script type="text/javascript">
	$(document).ready(function(){
       $("#division").on('change',function(){
          var divID=$(this).val();
          if(divID){
          	$.ajax({
          		type:"POST",
          		url:"ajaxFile.php",
          		data:"dd_id="+divID,
          		success:function(data){
          			$("#district").html(data);
          	
          		}
          	});
          }
       });

      $("#district").on('change',function(){
          var disID=$(this).val();
          if(disID){
          	$.ajax({
          		type:"POST",
          		url:"ajaxFile.php",
          		data:"diss_id="+disID,
          		success:function(data){
          			$("#thana").html(data);
          	
          		}
          	});
          }
       });  

$("#add").click(function(){
	$("#tbl").append('<tr><td><input type="text" name="skill" id="skill"></td><td><button type="button" id="del">Delete</button></td></tr>');
});
	});

$(document).on('click','#del',function(){
	$(this).closest("tr").remove();
})


</script>