<?php include "php/read.php"; ?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

	<div class="container">

		<div class="box">
			<h4 class="display-4 text-center">Register Customer</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		   <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		   <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-hover">
						  <thead>
						    <tr>
						      
						      <th scope="col">ID</th>
						      <th scope="col">Name</th>
						      <th scope="col">Email</th>
						      <th scope="col">Action</th>
						      
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		while($rows = mysqli_fetch_assoc($result)){

						  			
						  			
			  			  	?>
						    <tr>
						      
						      <td><?=$rows['id']?></td>
						      <td><?=$rows['name']?></td>
						      <td><?php echo $rows['email']; ?></td>
						      <td><a href="update.php?id=<?=$rows['id']?>"class="btn btn-success" onClick="confirm('Do you want to update')">Update</a></td>	
						      <td><a href="php/delete.php?id=<?=$rows['id']?>"class="btn btn-danger" onClick="confirm('Do you want to delete')">Delete</a></td>
						      
						    </tr>
						    <?php } ?>
						    
						  </tbody>
            </table>
            <?php } ?>
            <div class="link-right">
            	<a href="customer.php" class="link-primary">Add</a>
            </div>

            <button onclick="window.print()">Print this page</button>
		</div>	

    </div> 

</body>
</html>