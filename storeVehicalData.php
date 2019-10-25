<html>
<head>
<title>vehical</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

	<body>

		<div class="container">
			<form method="post" name="form" action="#" enctype="multipart/form-data">

				<div class="form-group">
					<h1>Add Vehical Details</h1>
				</div>

				<div class="form-group">
					<label>Image:</label>
					<input name="imgfile" type="file" placeholder="Browse" class="form-control">
				</div>

				<div class="form-group">
					<label> Price:</label>
					<input name="price" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Max Pasengers:</label>
					<input name="pasengers" type="text" class="form-control">
				</div>

				<div class="form-group">
					<label>Max Suitcases:</label>
					<input name="suitcases" type="text" class="form-control">
				</div>
			    
			  	<div class="form-group">
					<input name="submit" type="submit" value="Submit" >
				</div>
		
			<script>history.pushState({}, "", "")</script>

		</form>
		</div>

		
	</body>
</html>

<?php
	if(isset($_POST['submit'])){
	
		$image=$_FILES['imgfile']["name"];	
		$price=$_POST['price'];
		$pasengers=$_POST['pasengers'];
		$suitcases=$_POST['suitcases'];

		
		$hostname= "localhost";
		$username="root";
		$password="";
		
		$con = mysqli_connect($hostname,$username,$password);
		
		$database=mysqli_select_db($con,"taxi");

		$sql="INSERT INTO vehical(image,price,pasengers,suitcases) VALUES('$image','$price','$pasengers','$suitcases')";
		
		$result=mysqli_query($con,$sql);

		echo "Number of records Inserted: $result<br/>";
		
		mysqli_close($con);

		if($result==1){
			//uplord file to server
		//make file uplord path
			$path="images/".$_FILES["imgfile"]["name"];
		//uplord
			move_uploaded_file($_FILES["imgfile"]["tmp_name"],$path);
	
		}
		
	}
?>

