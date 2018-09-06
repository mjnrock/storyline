<?php
	class Story {
		public $StoryID;
		public $UniverseID;
		public $Title;
		public $SubTitle;
		public $Synopsis;
		public $Description;
		public $FramesPerSecond;
		public $UUID;
		public $CreatedDateTimeUTC;
		public $ModifiedDateTimeUTC;
		public $DeactivatedDateTimeUTC;

		public function __construct($Story) {
			$reflect = new ReflectionClass($this);
			$props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
			foreach($props as $prop) {
				if(isset($Story[$prop->name])) {
					$this->{$prop->name} = $Story[$prop->name];
				}
			}
		}
	}
?>