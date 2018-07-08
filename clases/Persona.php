<?php
	class Persona{
		public static $cedula;
		private $nombre;
		private function setCedula($ced){self::$cedula=$ced;}
		public function getCedula(){return self::$cedula;}
		private function setNombre($nom){$this->nombre=$nom;}
		public function getNombre(){return $this->nombre;}
		public static function caminar(){}
	}
?>
