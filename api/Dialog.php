<?php
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/lib/index.php";
	require_once "{$_SERVER["DOCUMENT_ROOT"]}/models/index.php";

	if(isset($_GET["Action"]) && isset($_GET["Payload"])) {
		$Payload = json_decode($_GET["Payload"]);

		if($_GET["Action"] === "UpdateDialogText") {
			UpdateDialogText($Payload);
			// print_r($Payload);
		}
	}

	function UpdateDialogText($Payload) {
		if(	
			isset($Payload->SceneID)
			&& isset($Payload->CharacterID)
			&& isset($Payload->StartFrame)
			&& isset($Payload->EndFrame)
			&& isset($Payload->Text)
		) {
			$Dialog = API::$DB->PDOStoredProcedure("CreateDialog", [
				[$Payload->SceneID, PDO::PARAM_INT],
				[$Payload->CharacterID, PDO::PARAM_INT],
				[NULL, PDO::PARAM_NULL],
				[$Payload->StartFrame, PDO::PARAM_INT],
				[$Payload->EndFrame, PDO::PARAM_INT]
			]);

			if(count($Dialog[0]) > 0) {
				$result = API::$DB->PDOStoredProcedure("UpdateDialogText", [
					[$Dialog[0]["DialogID"], PDO::PARAM_INT],
					[$Payload->Text, PDO::PARAM_STR]	
				]);
			}

			echo json_encode($result);
		}
	}

// 	function UpdateDialogText($Payload) {
// 		$Payload->Name = str_replace("'", "''", $Payload->Name);

// 		$SQL = <<<SQL
// 		EXEC Storyline.UpdateDialogText
// 		SET
// 			Name = '{$Payload->Name}',
// 			ModifiedDateTime = GETDATE()
// 		OUTPUT
// 			Inserted.CardID,
// 			Inserted.Name
// 		WHERE
// 			CardID = {$Payload->CardID}
// SQL;
// 		if(isset($Payload->CardID) && isset($Payload->Name)) {
// 			$result = API::query($SQL);

// 			echo json_encode($result);
// 		}
// 	}
?>