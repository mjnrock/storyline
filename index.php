<?php
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/routes/peripheral/header.php";
	
	Router::SetServer($_SERVER);

	Router::QuickGet("/scene/:SceneID", "Scene");

	require_once "{$_SERVER["DOCUMENT_ROOT"]}/routes/peripheral/footer.php";
?>