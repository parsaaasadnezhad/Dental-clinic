<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,600" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form action="action_schedule.php" method="POST">
							<div class="col-md-8">
								<div class="form-group">
									<input class="form-control" id="date" name="date" type="date">
									<span class="form-label">Check In</span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control">
										<option>1</option>
										<option>2</option>
										<option>3</option>
									</select>
									<span class="select-arrow"></span>
									<span class="form-label">Guests</span>
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<select class="form-control">
										<option>0</option>
										<option>1</option>
										<option>2</option>
									</select>
									<span class="select-arrow"></span>
									<span class="form-label">Children</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input class="form-control" id="doctor" name="doctor" type="text" placeholder="Doctor's name">
									<span class="form-label">Doctor</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<input class="form-control" id="time" name="time" type="text" required>
									<span class="form-label">Time</span>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-btn">
									<button class="submit-btn" type="submit">Check availability</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    <a href="logout.php"> LOGOUT </a>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>