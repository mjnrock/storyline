<?php
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/lib/index.php";
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/models/index.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

		<title>Storyline</title>
		
		<script>			
			function AJAX(domain, action, content, callback) {
				callback = !!callback ? callback : function(e){};
				$.ajax({
					url: `/api/${domain}.php`,
					data: {
						Action: action,
						Payload: JSON.stringify(content)
					},
					success: callback
				});
			}
		</script>
	</head>
	<body>
		<?php require_once "{$_SERVER["DOCUMENT_ROOT"]}/routes/peripheral/navbar.php"; ?>
		
		<div class="container">