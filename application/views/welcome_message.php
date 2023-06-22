<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


</head>
<body>


<div id="container">
			<div class="row">
				<div class="col-md-7">
						<h4> Form Register<h4>
						<form method="post" action="<?php echo site_url('api/auth/register');?>" class="form-horizontal">
							<div class="form-group row">
								<div class="col-sm-2 control-label">Username</div>
								<div class = "col-sm-7">
								<input type = "text" name="username" class="form-control">
								</div>

							</div>
							<div class="form-group row">
								<div class="col-sm-2 control-label">Password</div>
								<div class = "col-sm-7">
								<input type = "text" name="password" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<div class = "col-sm-4">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>


</body>
</html>