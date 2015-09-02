<?php
	
	include('../DAO/MaterialesDAO.php'); 

	class MaterialesController {

		public $materialesDAO;

		
		public function getMateriales() {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getMateriales();
	    }

	    public function getMaterialId($q_material) {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getMaterialId($q_material);
	    }

	    public function getMaterialPropiedades($id_material) {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getMaterialPropiedades($id_material);
	    }

	    public function insertaMateriales($q_insertaMaterial) {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->insertaMateriales($q_insertaMaterial);
	    }

	    public function getPropiedades() {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getPropiedades();
	    }

	    public function getUniMedida() {
			$this->materialesDAO = new materiales();
	        return $this->materialesDAO->getUmedida();
	    }
	}

 ?>