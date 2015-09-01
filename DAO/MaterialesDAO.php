<?php 

	include_once 'GenericoDAO.php';

	class materiales extends GenericoDAO{

		/*-----------------------------*/
		//variables
		public $q_general;
		public $q_propiedades;

		public $q_inserta;		
		/*-----------------------------*/
		public function __construct(){
			//contruye la clase GenericoDAO
			parent::__construct();
		}

		/*-----------------------------*/
		//funciones
		public function getMateriales(){

			$this->q_general = "select * from material";				
			
			return GenericoDAO::EjecutarConsulta($this->q_general);
		}

		public function getMaterialPropiedades($id_material){

			$this->q_propiedades = "select propiedad.nombre, material_propiedad.valor, u_medida.abreviatura

									FROM `material_propiedad`

									inner join propiedad on propiedad.pkID = material_propiedad.fkID_propiedad

									inner join u_medida on u_medida.pkID = material_propiedad.fkID_uMedida

									where material_propiedad.fkID_material =".$id_material;			
			
			return GenericoDAO::EjecutarConsulta($this->q_propiedades);
		}

		public function insertaMateriales($q_insertaMaterial){						
			$this->q_inserta = $q_insertaMaterial;
			$generico = new GenericoDAO();
			return $generico->EjecutarConsulta($this->q_inserta);
		}
		/*-----------------------------*/
		
	}

 ?>