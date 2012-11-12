<!DOCTYPE html>
<html lang="en">
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
	})()

	</script>

	<script type="text/javascript">
		function pageForward(){
			//alert(document.getElementById('startIndex').value);
			//alert(document.getElementById('startIndex').value);
		}
	</script>
		<title>Search Results</title>
	</head>
	<body>
		<div class="container">
			<br/>
			<div class="row">
			<div class="span12" id="content">
				<!--Results content goes here. -->
			</div></div><br/>
			<a href="Index.php">Back to search.</a>
			<script type="text/javascript">
				function handleResponse(response) {
					
					for (var i = 0; i < response.items.length; i++) {
						var item = response.items[i];
						var id = item.id;
						var itemDescription = item.volumeInfo.description;

						if(itemDescription == undefined){
							itemDescription = "No description."
						}
						// in production code, item.text should have the HTML entities escaped.
						document.getElementById("content").innerHTML +=
						  "<div class='row'><div class='span12'><h5>" + item.volumeInfo.title + "</h5></div></div>"
						 + "<div class='row'><div class='span12'><h6>"+ item.volumeInfo.authors +"</h6></div></div>"
						 + "<div class='row'><div class='span12'><p>"
						 + itemDescription
						 + "</p></div></div>";
					}

					document.getElementById("content").innerHTML += "<div class='row'>"
					+ "<div class='span3'></div>"
					+ "<div class='span6' style='text-align: center;'><p>" + response.totalItems + " book(s) found.</p></div>"
					//+ "<div class='span3'><a href'#' style='cursor: pointer; cursor: hand;' onclick='pageForward()'>Next 10</a></p></div>"
					+ "</div>";
				}
			</script>
			<?php
			$firstValue = true;
			$js .= '<script src="https://www.googleapis.com/books/v1/volumes?q=';

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

			$startIndex = $_REQUEST["StartIndex"];

			$js .= '&callback=handleResponse&printType=books&startIndex=' . $startIndex . '"></script>';

			$startIndex += 10;
			$hiddenHtml = "<input type='hidden' id='startIndex' Name='StartIndex' Value='". $startIndex ."'></input>";
			echo $hiddenHtml;

			echo $js;
			?>
		</div>

		<form>
	</body>

</html>