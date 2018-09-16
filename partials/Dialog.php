<li
	uuid="<?= $ViewBag["DialogUUID"]; ?>"
	did="<?= $ViewBag["DialogID"]; ?>"
	cid="<?= $ViewBag["CharacterID"]; ?>"
>
	<div class="collapsible-header" style="background-color: rgba(<?= $ViewBag["CharacterColor"]; ?>);">
		<span class="b center-align"><?= $ViewBag["CharacterName"]; ?></span>
		<span class="b new badge blue lighten-4 blue-text text-darken-4" data-badge-caption=""><?= $ViewBag["Version"]; ?></span>
	</div>
	<div class="collapsible-body pa3">
		<div class="ba br1 b--black-10 pa2 mb2"><?= $ViewBag["Text"]; ?></div>

		<div class="fl w-100 mb3">
			<div class="fl w-100 pa2 center-align">
				<div class="fl w-50">
					<div class="fl w-20 br1 b right-align ph2">Start</div>
					<div class="fl w-80 br1"><?= $ViewBag["StartFrame"]; ?></div>
				</div>
				<div class="fl w-50">
					<div class="fl w-20 br1 b right-align ph2">End</div>
					<div class="fl w-80 br1"><?= $ViewBag["EndFrame"]; ?></div>
				</div>
			</div>
			<div class="fl w-100 pa2 center-align">
				<div class="fl w-50">
					<div class="fl w-20 br1 b right-align ph2">Color</div>
					<div class="fl w-80 br1 white-text" style="background-color: rgba(<?= $ViewBag["CharacterColor"]; ?>);"><?= $ViewBag["CharacterColor"]; ?></div>
				</div>			
				<div class="fl w-50">
					<div class="fl w-20 br1 b right-align ph2">Version</div>
					<div class="fl w-80 br1"><?= $ViewBag["Version"]; ?></div>
				</div>
			</div>
		</div>

		<div class="center-align">
			<button class="btn deep-purple lighten-3 deep-purple-text text-darken-4">
				<i class="material-icons">music_note</i>
			</button>
			<button class="btn orange lighten-3 orange-text text-darken-4">
				<i class="material-icons">videocam</i>
			</button>
			<button class="btn light-blue lighten-3 light-blue-text text-darken-4">
				<i class="material-icons">brush</i>
			</button>
			<button class="btn green lighten-3 green-text text-darken-4">
				<i class="material-icons">edit</i>
			</button>
			<button class="btn red lighten-3 red-text text-darken-4">
				<i class="material-icons">close</i>
			</button>
		</div>
	</div>
</li>