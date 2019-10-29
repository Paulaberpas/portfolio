<!DOCTYPE html>
<html>
	<head>
		<title>Scrum tutorial</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<style type="text/css">
			
		</style>
	</head>
	<body>
		
		<?php require_once 'Model.php'; ?>
		<?php require_once 'process.php'; ?>

		<div class="container">

			<?php
				if( isset($_SESSION['message'])){
					?>

					<div class="alert alert-<?php echo $_SESSION['msg_type']; ?>">
						<?php 
							echo $_SESSION['message']; 
							unset($_SESSION['message']); 
						?>
							
					</div>

			<?php
				}
			?>

			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Location</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>

					<?php

						$users = $myModel->getUsers();

						foreach ($users as $user) {
							echo getUserId($user);
							
							?>
							<tr>
								<td><?php echo $user['name']; ?></td>
								<td><?php echo $user['location']; ?></td>
								<td colspan="2">
									<a href="index.php?delete=<?php echo getUserId($user); ?>" class="btn btn-danger">Delete</a>
									<a href="edit.php?edit=<?php echo getUserId($user); ?>" class="btn btn-info">Edit</a>
								</td>
							</tr>

							<?php
						} ?>
	
				
				</table>
			</div>

			<div class="row justify-content-center">
				<form method="POST" action="index.php">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter your name">
					</div>
					<div class="form-group">
						<label>Location</label>
						<input type="text" name="location" class="form-control" placeholder="Enter your location">
					</div>
					<div class="form-group">
						<button type="submit" name="save" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>

		</div>
		
		

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</body>
</html>