<?php include 'php/update.php'; ?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

	<div class="container">

		 <form action="php/update.php" method="post">

		  <h4 class="display-4 text-center">Update Customer</h4><hr><br>
		  
		  <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>

		   <div class="form-group">
	        <label for="id">ID</label>
	        <input type="id" class="form-control" id="id" name="id" value="<?=$row['id'] ?>"   >
	      </div>

	      <div class="form-group">
	        <label for="name">Name</label>
	        <input type="name" class="form-control" id="name" name="name" value="<?=$row['name'] ?>"   >
	      </div>

	       <div class="form-group">
	        <label for="email">Email</label>
	        <input type="email" class="form-control" id="email" name="email"  value="<?=$row['email']  ?>"  >
	      </div>

	      <input type="text" name="id" value="<?=$row['id']?>"hidden>

	  
	      <button type="submit" class="btn btn-primary" name="update" onClick="confirm('Do you want to update')">Update</button>
	      <a href="read.php" class="link-primary">View</a>
	     </form>

    </div> 

</body>
</html>