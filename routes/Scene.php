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
	<div id="scene-dialog" class="col s9 grey lighten-3" sid="<?= $Request->Variables["SceneID"]; ?>">
		<h4>Act I, Scene <?= $Request->Variables["SceneID"]; ?></h4>
		<h6>3:53</h6>
		<br />

		<!-- Add 'Expand All' and 'Collape All' button -->
		<ul class="collapsible">
			<?php foreach($Dialogs as $Dialog): ?>
				<?php Display::Dialog($Dialog); ?>
			<?php endforeach; ?>
		</ul>

		<div class="row">
			<div class="col s4">			
				<a class="m1 dropdown-trigger btn v-mid" href="#" data-target="new-dialog" cid="-1">
					<span id="new-dialog-character"></span>&nbsp;
					<i class="material-icons">keyboard_arrow_down</i>
				</a>
				<ul id="new-dialog" class="dropdown-content valign-wrapper">
					<?php foreach($Characters as $Character): ?>
						<li cid="<?= $Character["CharacterID"]; ?>"><?= $Character["CharacterName"]; ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="col s4">
				<input id="ajax-startFrame" class="m1 center-align" type="number" min="0" value="<?= $Dialogs[count($Dialogs) - 1]["EndFrame"]; ?>" placeholder="Start Frame" />
			</div>
			<div class="col s4">
				<input id="ajax-endFrame" class="m1 center-align" type="number" min="0" value="<?= $Dialogs[count($Dialogs) - 1]["EndFrame"] + $Dialogs[count($Dialogs) - 1]["FramesPerSecond"]; ?>"  placeholder="End Frame" />
			</div>
		</div>
		<div class="row">			
			<div class="col s12">
				<textarea id="ajax-dialogText" class="ba br1" type="text" rows="10" placeholder="Enter Dialog Text" style="resize: none; height: 100px;"></textarea>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#new-dialog > li").on("click", function(e) {
			$("#new-dialog-character").text($(this).text());
			$("#new-dialog-character").attr("cid", $(this).attr("cid"));
		});

		$("#ajax-dialogText").on("keyup", function(e) {
			if(e.keyCode === 13  && e.shiftKey === false && (
				$("#new-dialog-character").attr("cid") !== void 0
				&& $("#new-dialog-character").attr("cid") !== null
				&& +$("#new-dialog-character").attr("cid") !== -1
			)) {
				AJAX("Dialog", "UpdateDialogText", {
					SceneID: +$("#scene-dialog").attr("sid"),
					CharacterID: +$("#new-dialog-character").attr("cid"),
					// Label: "",
					StartFrame: +$("#ajax-startFrame").val(),
					EndFrame: +$("#ajax-endFrame").val(),
					Text: $(this).val()
				}, (e) => {
					if(e !== null && e !== void 0) {
						console.log(e);
						// window.location.href = `/scene/1?uuid=${ $(this).closest("p").attr("uuid") }`;
					}
				});
			}
		});
	});
</script>