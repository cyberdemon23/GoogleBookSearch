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
					var author = item.volumeInfo.authors;
					var smallThumbnail = item.volumeInfo.imageLinks;
					var previewLink = item.volumeInfo.previewLink;

					if (typeof previewLink === "undefined"){
						previewLink="";
					}
					else{
						previewLink = "Click <a href='" + previewLink + "'> here </a> to preview this book.";
					}

					if(typeof smallThumbnail === "undefined"){
						smallThumbnail = "";
					}
					else{
						smallThumbnail = "<img src='" + smallThumbnail.smallThumbnail + "'></img>"
					}


					if(typeof  author === "undefined"){
						author = "";
					}
					
					if(itemDescription == undefined){
						itemDescription = "No description."
					}
						// in production code, item.text should have the HTML entities escaped.
						document.getElementById("content").innerHTML +=
						"<div class='row'><div class='span12'><h5>" + item.volumeInfo.title + "</h5></div></div>"
						+ "<div class='row'><div class='span8'><h6>"+ author +"</h6></div></div>"
						 +	"<div class='span4'>" + smallThumbnail + "</div>"
						 + "<div class='row'><div class='span12'><p>"
						 + itemDescription
						 + "</p></div></div>"
						 +"<div class='row'></div class='span12'><p>" + previewLink + "</p></div></div>";
						}

						document.getElementById("content").innerHTML += "<div class='row'>"
						+ "<div class='span3' style='text-align: right;'><p><a href'#' style='cursor: pointer; cursor: hand;' onclick='pageBack()'>Previous 10</a></p></div>"
						+ "<div class='span6' style='text-align: center;'><p>" + response.totalItems + " book(s) found.</p></div>"
						+ "<div class='span3'><p><a href'#' style='cursor: pointer; cursor: hand;' onclick='pageForward()'>Next 10</a></p></div>"
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

					$queryString = $_SERVER["QUERY_STRING"];

					$startIndexForward = $startIndex + 10;
					$startIndexBack = $startIndex - 10;

					$pos = strrpos($queryString, "StartIndex", -1);

					$queryString = substr($queryString, 0, $pos) . "StartIndex=";

					$hiddenHtml = "<input type='hidden' id='startIndex' Name='StartIndex' Value='". $startIndex ."'></input>";

					$pageForwardJS = "<script type='text/javascript'>
					function pageForward(){ window.location.href='/GoogleBookSearch/Search.php?" . $queryString 
					. $startIndexForward . "' } </script>";

					$pageBackJS = "<script type='text/javascript'>
					function pageBack(){ window.location.href='/GoogleBookSearch/Search.php?" . $queryString 
					. $startIndexBack . "' } </script>";

					echo $hiddenHtml;

					echo $pageForwardJS;

					echo $pageBackJS;
					echo $js;
					?>
				</div>

				<form>
				</body>

				</html>