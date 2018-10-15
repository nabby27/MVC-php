<?php
require_once (Settings::PATH['entities'].'/user.entity.php');

class User {
	private $pdo;

	public function __CONSTRUCT() {
		try {
			$this->pdo = Database::StartUp();  		
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getAll() {
		try {
            $sql = "SELECT * FROM CMS_USERS";
			$stm = $this->pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_CLASS, 'UserEntity');
		}
		catch(Exception $e) {
			die($e->getMessage());
		}
	}

	public function getOne($id) {
		try {
            $sql = "SELECT * FROM CMS_USERS WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);          
			$stm->execute(array($id));
			$stm->setFetchMode(PDO::FETCH_CLASS, 'UserEntity');
			return $stm->fetch();
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function delete($id) {
		try {
            $sql = "DELETE FROM CMS_USERS WHERE user_id = ?";
			$stm = $this->pdo->prepare($sql);			          
            $stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function update($data) {
		try {
			$sql = "UPDATE CMS_USERS SET 
						username		= ?,
						name            = ?, 
						surname         = ?,
						email			= ?,					
						telephon		= ?,
						address         = ?,
						password        = ?,
						type_id         = ?
				    WHERE user_id 		= ?";
            $stm = $this->pdo->prepare($sql);
			$stm->execute(array(
					$data->getUsername(),                        
					$data->getName(),
                    $data->getSurname(),
                    $data->getEmail(), 
					$data->getTelephon(),
					$data->getAddress(),
					$data->getPassword(),
					$data->getIdType(),
					$data->getId()
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function insert($data) {
		try {
            $sql = "INSERT INTO CMS_USERS (name, surname, email, telephon, address, password, idType) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
					$data->getName(),                        
                    $data->getSurname(),
                    $data->getEmail(), 
					$data->getTelephon(),
					$data->getAddress(),
					$data->getPassword(),
					$data->getIdType(),
                ));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	  
}
