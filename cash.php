Last login: Mon Dec  3 16:46:14 on ttys000
cbe-mbp:~ chamisaedmo$ ssh cedmo@bootcamp-coders.cnm.edu
Welcome to Ubuntu 18.04.1 LTS (GNU/Linux 4.15.0-39-generic x86_64)

* Documentation:  https://help.ubuntu.com
* Management:     https://landscape.canonical.com
* Support:        https://ubuntu.com/advantage


* MicroK8s is Kubernetes in a snap. Made by devs for devs.
One quick install on a workstation, VM, or appliance.

- http://bit.ly/microk8s


Use 'dpkg --get-selections > selections.txt' to save a selection and 'dpkg
--set-selections < selections.txt && apt-get dselect-upgrade' to restore.

* Canonical Livepatch is available for installation.
- Reduce system reboots and improve kernel security. Activate at:
https://ubuntu.com/livepatch

23 packages can be updated.
12 updates are security updates.


Last login: Mon Dec  3 23:46:22 2018 from 10.46.2.231

System information as of Tue Dec  4 00:01:03 UTC 2018

System load:  0.0                 Processes:           230
Usage of /:   37.7% of 119.91GB   Users logged in:     4
Memory usage: 22%                 IP address for eno1: 10.132.59.253
Swap usage:   2%
cedmo@bootcamp-coders:~$ ls
cedmo.ini  cedmo.php  public_html
cedmo@bootcamp-coders:~$ cd ..
cedmo@bootcamp-coders:/home$ ls
agarcia707  cgentry14     gkephart     rbecker8        wargames_team1
amoreno28   checkendorn   gklein       rlewis37        wargames_team2
anikitina   cryan17       jisbell1     rluna41         wargames_team3
bgray11     daugustson    jjain2       shanly          wargames_team4
bhuffman1   dmcdonald21   jjennings22  sheckendorn     web
bjack2      dnakitare     jlambert13   sim             yjohnson6
bkie3       dsanderson3   jmiller156   slackbot
bshafii     dwilliams157  mbonacci     spelot
cedeal      ecorsi        mbovee       sromero130
cedmo       fmunoz11      mpeseke      wargames_team0
cedmo@bootcamp-coders:/home$ cd gkephart
cedmo@bootcamp-coders:/home/gkephart$ ls
bin  gkephart.ini  gkephart.php  mysql-config  public_html  sec-lib  security
cedmo@bootcamp-coders:/home/gkephart$ cd public_html
cedmo@bootcamp-coders:/home/gkephart/public_html$ ls
aaaa             ddc-twitter          ng-templating     snap-bootstrap
angular5         ddc-twitter-scratch  nm-outdoors       snap-fetch
angular-example  dog                  oh-snap           snap-repo
art              dom                  outside           snap-unit-test
assessment       example              pubnub            street-art
beer             hex                  pwp-contact-form  uuid
color-picker     interaction          q-review          wargames
contact-form     lost-paws            quote-test        webpack-dev
css-challenge    misquote             random-student
css-demo         nerd-nook            snap-boot
cedmo@bootcamp-coders:/home/gkephart/public_html$ cd wargames
cedmo@bootcamp-coders:/home/gkephart/public_html/wargames$ ls
ajax-cash.php    cash.php          index.php  style.css
ajax-money.php   comcash.png       LICENSE    unsatisfaction.png
ajax-signin.php  comcash.sql       money.php
ajax-signup.php  form-uploader.js  README.md
cedmo@bootcamp-coders:/home/gkephart/public_html/wargames$ vim ajax-cash.php
cedmo@bootcamp-coders:/home/gkephart/public_html/wargames$ vim ajax-money.php
cedmo@bootcamp-coders:/home/gkephart/public_html/wargames$ vim ajax-signin.php
cedmo@bootcamp-coders:/home/gkephart/public_html/wargames$ vim ajax-money.php
cedmo@bootcamp-coders:/home/gkephart/public_html/wargames$ vim ajax-signup.php
cedmo@bootcamp-coders:/home/gkephart/public_html/wargames$ vim cash.php

<?php
session_start();
if(isset($_SESSION["id"])) {
	$id = $_SESSION["id"];
} else {
	$id = "";
}

$db = mysqli_connect("127.0.0.1", "__TEAM__", "__PASSWORD__", "__TEAM__");
if(!$db) {
	echo "cannot connect to mySQL";
}

$cards = null;
if(isset($_GET["id"])) {
	$query = "SELECT * FROM card WHERE clientId = " . $_GET["id"];
	$result = mysqli_query($db, $query);
	if(!$result) {
		echo "cannot query to mySQL";
	}

	$cards = [];
	while(($row = mysqli_fetch_assoc($result)) != null) {
		$cards[] = $row;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
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
	</head>

	<body>
		<header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
								  data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
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
			<?php if($cards != null) { ?>
			<div class="row">
				<div class="form-wrap row">

					<div class="col-sm-offset-2 col-med-f">
						<a></a>
					</div>
					<div class="col-med-f col-sm-offset-2">

						<h1>Pay Up</h1>

						<div id="response2">
							<pre></pre>
						</div>

						<form id="cash" method="POST" action="cash.php">
							<div class="form-group">
								<label for="cardId">Card Number</label>
								<select class="form-control" name="cardId">
									<?php foreach ($cards as $card) {
										echo "<option value=\"" . $card["id"] . "\">" . $card["cardNo"] . "</option>";
									} ?>
								</select>
							</div>
							<div class="form-group">
								<label for="name">FU pay me</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<!--payment amount -->
									<input class="form-control" type="text" name="amount" id="amount"
											 placeholder="pay me or else">
								</div>
							</div>

							<div class="form-group">
								<label for="name">confirm like you have a choice</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<!-- confirmation # -->
									<input class="form-control" type="text" name="confirmation" id="confirmation"
											 placeholder="confirm at own risk">
								</div>
							</div>
							<button class="btn btn-info" type="submit">Submit</button
						</form>
						<script>
							(function($) {
								function processForm(e) {
									$.ajax({
										url: 'ajax-cash.php',
										dataType: 'text',
										type: 'post',
										contentType: 'application/x-www-form-urlencoded',
										data: $(this).serialize(),
										success: function(data, textStatus, jQxhr) {
											$('#response2 pre').html(data);
										},
										error: function(jqXhr, textStatus, errorThrown) {
											console.log(errorThrown);

										}

									});
									e.preventDefault();

								}

								$('#cash').submit(processForm);
							})(jQuery);
						</script>

					</div>
				</div>
			</div>
			<?php } else { ?>
			<div class="row">
				<div class="col-med-f col-sm-offset-2">
					<h2>Please Sign in first</h2>
					113,1-8       94%
					</div>
				</div>
				<?php } ?>
		</main>
	</body>
</html>
