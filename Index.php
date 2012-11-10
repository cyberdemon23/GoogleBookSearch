<!DOCTYPE html>
<html>

	<head>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

		<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-36174852-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	</script>

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

		<style type="text/css">
			.row12{
				text-align: center;
			}
		</style>

		<title>Book Search</title>

	</head>

	<body onload="BindButtons();">
		<div class="container">
			<div class="hero-unit" style="text-align: center;">
				<h1>Google Book Search</h1>
				<h4>Work in progress</h4>
			</div>
			<br/>
			<div class="span12" style="text-align:center;">
				<form action="Search.php" action="post" class="form-inline">
					<div class="control-group">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-book"></i></span>

							<input type="text" placeholder="Enter book author or title..." name="SearchString" id="inputIcon" class="span3">
							<button class="btn" type="submit" value="Search" class="span2">
								<!-- <i class="icon-book"></i> -->
								Search
							</button>
						</div>
						
						<input type="hidden" id="btn-input" name="SearchBy" value="Author">
						</input>

					</div>
				</form>
				<div class="btn-group" data-toggle="buttons-radio">
						<button id="btn-author" class="btn active" type="button" checked="true" value="Author" style="width:100px;">
							Author
						</button>
						<button id="btn-title" class="btn" type="button" value="Title" style="width:100px;">
							Title
						</button>
					</div>
			</div>
		</div>
	</body>

</html>