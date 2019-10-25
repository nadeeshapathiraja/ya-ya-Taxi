<?php 
error_reporting(0);

	if (isset($_POST['submit'])) {


		$pasengers = $_POST['pasengers'];
		$suitcases = $_POST['suitcases'];

	}
					 
?>

<html lang="en">
<head>
<title>Allocation</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

	<body>

		<div class="container">
			<form method="post" action="#">

				<div class="form-group">
					<h1>Choose Vehical</h1><br>
				</div>

				<div class="form-group">
					<label>Number of Passenger:</label>

					<select name="pasengers" class="form-control" id="pasengers">
			        		<?php 

								for($i=1; $i<=100; $i++)
								{
								    echo "<option value=".$i.">".$i."</option>";
								}
							?> 
							<option name="pasengers"> </option>
			        </select>

				</div>

				<div class="form-group">
					<label>Number Of Suitcases:</label>
					
			        <select name="suitcases" class="form-control" id="suitcases">
			        		<?php 

								for($i=1; $i<=10; $i++)
								{
								    echo "<option value=".$i.">".$i."</option>";
								}
							?> 
							<option name="suitcases"> </option>
			        </select>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" value="Submit"/> 
				</div>

				

		        <input type="button" name="select" value="Select Vehical" onclick="myFunction()" /> 

		        <script type="text/javascript">

		        	function myFunction(){
		        		var x = document.getElementById("vehicalTable");
						if (x.style.display === "none") {
						   x.style.display = "block";
						} else {
						    x.style.display = "none";
						}
		        	}
		        </script>

		        <div id="vehicalTable">
		        	<?php
		        	error_reporting(0);

						$hostname= "localhost";
						$username="root";
						$password="";
							
							$con = mysqli_connect($hostname,$username,$password);
							
							$dbconect=mysqli_select_db($con,"taxi");
							
							$sql="SELECT * FROM vehical";

							$result= mysqli_query($con,$sql);
							echo "
							<table border=1>
								<tr>
									<th>Image</th>
									<th>Price</th>
									<th>Passengers</th>
									<th>Suitcases</th>
								</tr>
							";
							
								
								while($row=mysqli_fetch_array($result)){

									if($row[3]>$pasengers){
										if($row[4]>$suitcases){
											echo "
												<tr>
										
													<td><img src=images/$row[1] width=100px height=100px/><br/></td>
													<td>$row[2]</td>
													<td>$row[3]</td>
													<td>$row[4]</td>
												</tr>
											";
										}

									}
									
								
							}
								
							echo "</table>";
						?>
		        </div>

		</form>
		</div>

		

		
	</body>
</html>
