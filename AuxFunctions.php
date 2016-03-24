<?php

class AuxFunctions
{
	public $model;

	public function setModel($name_module , $name_model = null)
	{
		$archive = '../application/modules/' . $name_module . '/models/class.' . $name_module . '.php';
		if($name_model !== null) { $archive = '../application/modules/' . $name_module . '/models/class.' . $name_model . '.php'; }

		if(file_exists($archive))
		{
			require_once $archive;
			$class = (is_null($name_model)) ? ucfirst($name_module) : ucfirst($name_model);

			try { $this->model = new $class; }
			catch (Exception $e) { return false; }

			return true;
		}
		return false;
	}
}