<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password],input[type=submit] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}



.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
	
	<body>
		
		<?php
		$con= mysqli_connect('localhost','root','','course');
					$sql="select * from dept";
					$res=mysqli_query($con,$sql);
					?>
	<div class="container">
		 
  <form method="post" action="">
      <label for="dept">Select Department:</label>
      <select class="form-control" name="dept">
		  <?php
		  while($row=mysqli_fetch_array($res))
					{?>
        <option value= "<?php echo $row['id'];?>">
			<?php echo $row['dept_name'];?>
		  </option>
		  <?php } ?>
		
		
       
		  
      </select>
	   <label for="course_name"><b>Course Name</b></label>
		
	<input type="text" name="course_name"  placeholder="Enter course name">
		<input type="submit" name="submit">
			</form>
		<?php
		
		if(isset($_POST['submit']))
		{
		//$con1= mysqli_connect('localhost','root','','course');
			$dept_id= $_POST['dept'];
			$coursename=$_POST['course_name'];
			$sql1="insert into course values (null,$dept_id,'$coursename')";	
			$result1= mysqli_query($con,$sql1);
			
			if($result1==true)
			{
				echo "Sucess";
								 header('Location:index.php');
			}
			else
			{
				echo "failed";
			}
		}
		?>
	  </div>
		
		
	</body>
</html>