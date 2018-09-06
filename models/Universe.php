<?php
	class Universe {
		public $UniverseID;
		public $Title;
		public $SubTitle;
		public $Description;
		public $UUID;
		public $CreatedDateTimeUTC;
		public $ModifiedDateTimeUTC;
		public $DeactivatedDateTimeUTC;

		public function __construct($Universe) {
			$reflect = new ReflectionClass($this);
			$props = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
			foreach($props as $prop) {
				if(isset($Universe[$prop->name])) {
					$this->{$prop->name} = $Universe[$prop->name];
				}
			}
		}
	}
?>