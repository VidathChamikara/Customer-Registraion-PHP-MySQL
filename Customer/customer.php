<!DOCTYPE html>
<html>
<head>
	
	<title>Create</title>

	<!-- Bootstrap 4 CSS for styling -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

	<div class="container">

		<!-- Form sends data to php/create.php using POST method -->
		<form action="php/create.php" method="post">

		  <!-- Page heading -->
		  <h4 class="display-4 text-center">Add Customer</h4>
		  <hr><br>
		  
		  <!-- If there is an 'error' parameter in the URL, show it inside a Bootstrap danger alert -->
		  <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>

		   <!-- ID input field -->
		   <div class="form-group">
	        	<label for="id">ID</label>
	        	<!-- 
				 value is repopulated from URL (?id=...) if form was submitted with errors.
				 This avoids forcing the user to retype everything.
			 -->
	        	<input 
					type="number" 
					class="form-control" 
					id="id" 
					name="id" 
					value="<?php if(isset($_GET['id'])) echo($_GET['id']); ?>"   
					placeholder="Enter ID">
	      	</div>

	      	<!-- Name input field -->
	      	<div class="form-group">
	        	<label for="name">Name</label>
	        	<input 
					type="name" 
					class="form-control" 
					id="name" 
					name="name" 
					value="<?php if(isset($_GET['name'])) echo($_GET['name']); ?>"   
					placeholder="Enter Name">
	      	</div>

	      	<!-- Email input field -->
	       	<div class="form-group">
	        	<label for="email">Email</label>
	        	<input 
					type="email" 
					class="form-control" 
					id="email" 
					name="email"  
					value="<?php if(isset($_GET['email'])) echo($_GET['email']); ?>"  
					placeholder="Enter email">
	      	</div>

	  		<!-- 
			 Submit button:
			 - name="create" is important: in create.php you check isset($_POST['create'])
			 - onClick confirm() shows a JS confirmation dialog before submitting
			-->
	      	<button 
				type="submit" 
				class="btn btn-primary" 
				name="create" 
				onClick="confirm('Do you want to submit')">
				Submit
			</button>

	      	<!-- Link to view all records (read page) -->
	      	<a href="read.php" class="link-primary">View</a>

	    </form>

    </div> 

</body>
</html>
