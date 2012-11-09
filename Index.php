<!DOCTYPE html>
<html>
	<head>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<title>Book Search</title>
	</head>

	<body>
		<div class="container">
			<br/>
			<div class="span5"></div>
			<div class="span7">
				<form action="Search.php" action="post">
					<input type="text" placeholder="Enter book title..." name="SearchString" style="width:250px;">
					</input>
					<button class="btn" type="submit" value="Search" style="width: 100px;">
						<i class="icon-book"></i>
					</button>
				</form>
			</div>
		</div>
	</body>

</html>