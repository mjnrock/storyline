<?php
	class Act {
		public $ActID;
		public $StoryID;
		public $Title;
		public $SubTitle;
		public $Synopsis;
		public $Description;
		public $Ordinality;
		public $UUID;
		public $CreatedDateTimeUTC;
		public $ModifiedDateTimeUTC;
		public $DeactivatedDateTimeUTC;

		public function __construct($Act) {
			$reflect = new ReflectionClass($this);
			$props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
			foreach($props as $prop) {
				if(isset($Act[$prop->name])) {
					$this->{$prop->name} = $Act[$prop->name];
				}
			}
		}
	}
?>