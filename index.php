<?php
session_start();
if(isset($_SESSION["id"])) {
	$id = $_SESSION["id"];
} else {
	$id = "";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>foo</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href="style.css">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
				  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
				  crossorigin="anonymous"></script>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


	</head>
	<body>
		<!--nav bar not sure if needed -->
		<header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
								  data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.php"><img src="unsatisfaction.png" class="top-logo"></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form class="navbar-form navbar-left">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="money.php?id=<?php echo $id; ?>">Add-Card</a></li>
							<li><a href="cash.php?id=<?php echo $id; ?>">Pay</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>


		<main class="container">
			<div class="row">
				<img class="com-img" src="comcash.png">
				<div class="form-wrap row">
					<div class="col-sm">

					</div>
					<div class="col-sm col-sm-offset-4">
						<h1>please sing up</h1>

						<div id="response">
							<pre></pre>
						</div>

						<!-- signup form here -->
						<form id="signup" method="POST">
							<!-- name input -->
							<div class="form-group">
								<label for="name">Name</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<!-- email goes here-->
									<div class="form-group">
										<label for="email">email</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<input class="form-control" type="text" name="email" id="email"
													 placeholder="cashMe@outside.cm">
										</div>
									</div>

									<!-- password goes here -->
									<div class="form-group">
										<label for="password">password</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-user"></i>
											</div>
											<input class="form-control" type="text" name="password" id="password"
													 placeholder="fly pass words go here">
										</div>
									</div>
									<button class="btn btn-info" id="signup" type="submit">Submit</button>
						</form>

						<script>
							(function($) {
								function processForm(e) {
									$.ajax({
										url: 'ajax-signup.php',
										dataType: 'text',
										type: 'post',
										contentType: 'application/x-www-form-urlencoded',
										data: $(this).serialize(),
										success: function(data, textStatus, jQxhr) {
											$('#response pre').html(data);
										},
										error: function(jqXhr, textStatus, errorThrown) {
											console.log(errorThrown);
										}
									});
									e.preventDefault();
								}
								$('#signup').submit(processForm);
							})(jQuery);
						</script>
					</div>
				</div>
			</div>
			<div class="form-wrap row">
				<div class="col-sm-f">
					<form id="signin" method="post" action="ajax-signin.php">
						<h1>signin</h1>

						<div id="response1">
							<pre></pre>
						</div>

						<div class="form-group">
							<label for="email">email</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<!-- email field -->
								<input class="form-control" type="text" name="email" id="email" placeholder="cashMe@outside.cm">
							</div>
						</div>
						<!-- password goes here -->
						<div class="form-group">
							<label for="password">password</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user"></i>
								</div>
								<input class="form-control" type="text" name="password" id="password"
										 placeholder="fly pass words go here">
							</div>
						</div>
						<button class="btn btn-info" type="submit">Submit</button>

					</form>

					<script>
						(function($) {
							function processForm1(e) {
								$.ajax({
									url: 'ajax-signin.php',
									dataType: 'text',
									type: 'post',
									contentType: 'application/x-www-form-urlencoded',
									data: $(this).serialize(),
									success: function(data, textStatus, jQxhr) {
										$('#response1 pre').html(data);
									},
									error: function(jqXhr, textStatus, errorThrown) {
										console.log(errorThrown);

									}

								});
								e.preventDefault();

							}

							$('#signin').submit(processForm1);
						})(jQuery);
					</script>

				</div>
			</div>

		</main>

	</body>
</html>
