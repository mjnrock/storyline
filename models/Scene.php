<?php
	class Scene {
		public $SceneID;
		public $ActID;
		public $Title;
		public $SubTitle;
		public $Synopsis;
		public $Description;
		public $Ordinality;
		public $UUID;
		public $CreatedDateTimeUTC;
		public $ModifiedDateTimeUTC;
		public $DeactivatedDateTimeUTC;

		public function __construct($Scene) {
			$reflect = new ReflectionClass($this);
			$props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
			foreach($props as $prop) {
				if(isset($Scene[$prop->name])) {
					$this->{$prop->name} = $Scene[$prop->name];
				}
			}
		}
	}
?>