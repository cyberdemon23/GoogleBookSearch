<!DOCTYPE html>
<html>

	<head>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

		<script type="text/javascript">
			function BindButtons() {
				var btns = ['btn-author', 'btn-title'];
				var input = document.getElementById('btn-input');
				for (var i = 0; i < btns.length; i++) {
					document.getElementById(btns[i]).addEventListener('click', function() {
						input.value = this.value;
					});
				}
			}
		</script>

		<title>Book Search</title>

	</head>

	<body onload="BindButtons();">
		<div class="container">
			<br/>
			<div class="span5"></div>
			<div class="span7">
				<form action="Search.php" action="post" class="form-inline">
					<div class="control-group">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-book"></i></span>
							<input type="text" placeholder="Enter book title..." name="SearchString" id="inputIcon" class="span3">
							<button class="btn" type="submit" value="Search" class="span2">
								<!-- <i class="icon-book"></i> -->
								Search
							</button>
						</div>
						<div class="btn-group" data-toggle="buttons-radio">
							<button id="btn-author" class="btn" type="button" value="Author">
								Author
							</button>
							<button id="btn-title" class="btn" type="button" value="Title">
								Title
							</button>
						</div>
						<input type="hidden" id="btn-input" name="SearchBy" value="">
						</input>

					</div>
				</form>
			</div>
		</div>
	</body>

</html>