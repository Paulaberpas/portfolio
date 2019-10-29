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

			<div class="row justify-content-center">
				<form method="POST" action="index.php">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="<?php echo $user['name']; ?>">
					</div>
					<div class="form-group">
						<label>Location</label>
						<input type="text" name="location" class="form-control" value="<?php echo $user['location']; ?>">
					</div>
					<input type="hidden" name="id" value="<?php echo $_GET['edit'] ?>">
					<div class="form-group">
						<button type="submit" name="update" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>

		</div>
		
		

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</body>
</html>