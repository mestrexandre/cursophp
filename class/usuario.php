<?php

class usuario {


	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){


		return $this->idusuario;
	}

	public function setIdusuario($value){

		$this->idussuario =$value;
	}

public function getDeslogin(){


		return $this->deslogin;
	}

	public function setDeslogin($value){

		$this->deslogin =$value;
	}

	public function getDessenha(){


		return $this->dessenha;
	}

	public function setDessenha($value){

		$this->dessenha =$value;
	}


	public function getDtcadastro(){


		return $this->dtcadastro;
	}

	public function setDtcadastro($value){

		$this->dtcadastro =$value;
	}

	public function loadByID($id){


		$sql = new Sql();
		$results = $sql->select("select * from tb_usuarios where idusuario = :ID", array(":ID"=>$id));

		if (count($results)>0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));





		}
	}

	public function getList(){

		$sql = new Sql();
		return $sql->select("select * from tb_usuarios order by deslogin");
	}

	public static function search($Login){

		$sql = new Sql();
		return $sql->select("select * from tb_usuarios where deslogin like :SEARCH order by deslogin", array (':SEARCH'=>"%".$Login."%"));
	}

	public function login($login, $password){
		$sql = new Sql();

		$results = $sql->select("select * from tb_usuarios where deslogin = :LOGIN and dessenha = :PASSWORD", array(
			":LOGIN"=>$login,
			":PASSWORD"=>$password));

		if (count($results)>0){

			$row = $results[0];

			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));

	} else{

		throw new Exception("Login e/ou senha inválidos");
	}
}

	public function __toString(){
		return json_encode(array(
			"idususario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtCadastro()->format("d/m/Y H:i:s")
									));
	}



}







?>