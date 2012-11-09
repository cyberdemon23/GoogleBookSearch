<!DOCTYPE html>
<html>
<head>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<title>Search Results</title>

</head>

<body>
	<div class="container">
		<br/>
		<div id="content"></div>
		<script>
		function handleResponse(response) {
			for (var i = 0; i < response.items.length; i++) {
				var item = response.items[i];
        // in production code, item.text should have the HTML entities escaped.
        document.getElementById("content").innerHTML += "<br>" + item.volumeInfo.title;
    }
}
</script>
	<?php 
	$js .= '<script src="https://www.googleapis.com/books/v1/volumes?q=' . urlencode($_REQUEST["SearchString"]) . '&callback=handleResponse"></script>';

	echo $js;

	?>

	
<div class="span5"></div>
<div class="span7">

</div>
</div>
</body>

</html>