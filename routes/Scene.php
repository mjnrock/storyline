<?php
	$Dialogs = API::$DB->TVF("GetSceneDialog", [
		$Request->Variables["SceneID"]
	], ["StartFrame ASC, Version ASC"]);
	$Characters = API::$DB->TVF("GetSceneCharacters", [
		$Request->Variables["SceneID"]
	], ["CharacterName ASC"]);
?>

<div class="row">
	<div class="col s3 grey lighten-2">
		<h5>Story Overview</h5>
		<br />
	</div>
	<div class="col s9 grey lighten-3">
		<h4>Act I, Scene <?= $Request->Variables["SceneID"]; ?></h4>
		<h6>3:53</h6>
		<br />

		<?php foreach($Dialogs as $Dialog): ?>
			<?php Display::Dialog($Dialog); ?>
		<?php endforeach; ?>

		<div>
			<a class="dropdown-trigger btn v-mid" href="#" data-target="new-dialog" cid="-1">
				<span id="new-dialog-character"></span>&nbsp;
				<i class="material-icons">keyboard_arrow_down</i>
			</a>
			<ul id="new-dialog" class="dropdown-content">
				<?php foreach($Characters as $Character): ?>
					<li cid="<?= $Character["CharacterID"]; ?>"><?= $Character["CharacterName"]; ?></li>
				<?php endforeach; ?>
			</ul>

			<input type="text" placehold="Text..." />
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#new-dialog > li").on("click", function(e) {
			$("#new-dialog-character").text($(this).text());
			$("#new-dialog-character").attr("cid", $(this).attr("cid"));
		});
	});
</script>