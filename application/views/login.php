<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pemilihan Wisata Terbaik</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/sweetalert.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>
<body style="background-image:url(<?php echo base_url() ?>assets/images/bg.jpeg);background-size:cover;">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="<?php echo base_url() ?>Auth/login" method="POST">
					<div class="panel panel-dark login-box">
						<div class="panel-heading"><h3 class="text-center">LOGIN USER</h3></div>
						<div class="panel-body">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" class="form-control" placeholder="Username" autofocus="on">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" class="btn btn-dark raised btn-block">Login</button>
							<a href="<?php echo base_url() ?>" class="btn btn-success raised btn-block">halaman website</a>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<script src="<?php echo base_url() ?>assets/js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
</body>
</html>