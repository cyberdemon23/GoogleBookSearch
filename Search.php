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
		<title>Search Results</title>
	</head>
	<body>
		<div class="container">
			<br/>
			<div id="content"></div><br/>
			<a href="Index.php">Back to search.</a>
			<script>
				function handleResponse(response) {
					for (var i = 0; i < response.items.length; i++) {
						var item = response.items[i];
						// in production code, item.text should have the HTML entities escaped.
						document.getElementById("content").innerHTML += 
						"<a href='#"+item.volumeInfo.id+"' role='button' class='btn' data-toggle='modal'>"+item.volumeInfo.title+"</a><br/>";	
					}
				}
			</script>
			<?php
			$firstValue = true;
			$js .= '<script src="https://www.googleapis.com/books/v1/volumes?q='; //. urlencode($_REQUEST["SearchString"]);

			$tokens = explode(" ", $_REQUEST["SearchString"]);

			if ($_REQUEST["SearchBy"] == "Author") {

				foreach ($tokens as $value){
					if($firstValue){
						$js .= 'inauthor:' . $value;
						$firstValue = false;
					}
					else{
						$js .= '+inauthor:' . $value;
					}
				}

			} elseif ($_REQUEST["SearchBy"] == "Title") {

				foreach ($tokens as $value){
					if($firstValue){
						$js .= 'intitle:' . $value;
						$firstValue = false;
					}
					else{
						$js .= '+intitle:' . $value;
					}
				}
			}

			$js .= '&callback=handleResponse&printType=books"></script>';

			echo $js;
			?>
			<div class="span5"></div>
			<div class="span7">

			</div>
		</div>
	</body>

</html>