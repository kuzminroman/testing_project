<?php
namespace models;
use PDO;
class DataBase{
    
	protected $db;
	
	public function __construct(){
		
		$config = require_once __DIR__ .'/../config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['user'], $config['password']);
		
	}
	
	public function regist($vars = []){
		
		$query = 
		$this->db
		->prepare("INSERT INTO User
		(name, surname, patronymic, phone, email, password) VALUES
		(:name, :surname, :patronymic, :phone, :email, :password)");
		
		return $query->execute(array(
		":name" => $vars['name'], 
		":surname" => $vars['surname'],
		":patronymic" => $vars['patronymic'],
		":phone" => $vars['phone'],
		":email" => $vars['email'],
		":password" => $vars['pass'],
		));
	}
	
	public function login($email, $password){
		
		$query = $this->db->query("SELECT first_email FROM User INNER JOIN Email ON Email.id = User.email WHERE Email.first_email = '$email' AND User.password = '$password'");
		return $result = $query->fetchAll();
		
	}
	
	public function getId($email, $password){
		
		$query = $this->db->query("SELECT User.id AS id FROM User INNER JOIN Email ON Email.id = User.email WHERE Email.first_email = '$email' AND User.password = '$password'");
		foreach($result = $query->fetchAll() as $id){
			
			$id = (int)$id['id'];
		}
		return $id;
	}
	
	public function findById($id){
		
		$query = $this->db->query("SELECT * FROM User WHERE id = '$id'");
		return $result = $query->fetchAll();
		
	}
	
	public function updateUser($id, $name, $surname, $patronymic){
		
		$query = 
		"UPDATE User SET
        name = :name,
        surname = :surname, 
		patronymic = :patronymic	
		WHERE id = :id";
		$action = $this->db->prepare($query);
		$action->bindParam(":name", $name, PDO::PARAM_STR);
		$action->bindParam(":surname", $surname, PDO::PARAM_STR);
		$action->bindParam(":patronymic", $patronymic, PDO::PARAM_STR);
		$action->bindParam(":id", $id, PDO::PARAM_STR);
		
		return $action->execute();
	}


    public function updateImg($id, $img)
    {

        $query =
            "UPDATE User SET
        img = :img	
		WHERE id = :id";
        $action = $this->db->prepare($query);
        $action->bindParam(":img", $img, PDO::PARAM_STR);
        $action->bindParam(":id", $id, PDO::PARAM_STR);
        return $action->execute();
    }
	
	public function addPhones($phones = []){
		
		$query = 
		$this->db
		->prepare("INSERT INTO Phones
		(mobile, home, work, basic) VALUES
		(:mobile, :home, :work, :basic)");
		
		return $query->execute(array(
		":mobile" => $phones['mobile'], 
		":home" => $phones['home'],
		":work" => $phones['work'],
		":basic" => $phones['basic'],
		));
	}
	
	public function updatePhones($mobile, $home, $work, $basic, $id){
		
		$query = 
		"UPDATE Phones SET
        mobile = :mobile,
        home = :home,
		work = :work,
		basic = :basic
		WHERE id = $id";
		$action = $this->db->prepare($query);
		$action->bindParam(":mobile", $mobile, PDO::PARAM_STR);
		$action->bindParam(":home", $home, PDO::PARAM_STR);
		$action->bindParam(":work", $work, PDO::PARAM_STR);
		$action->bindParam(":basic", $basic, PDO::PARAM_STR);
		
		return $action->execute();
	}
    public function deleteProfile($id){
		
		$sql = "DELETE FROM User WHERE id = $id";
		$query = $this->db->prepare($sql);
		return $query->execute();
		
	}
	public function updateEmail($first_email, $second_email, $basic, $id){
		
		$query = 
		"UPDATE Email SET
        first_email = :first_email,
        second_email = :second_email,
		basic = :basic
		WHERE id = $id";
		$action = $this->db->prepare($query);
		$action->bindParam(":first_email", $first_email, PDO::PARAM_STR);
		$action->bindParam(":second_email", $second_email, PDO::PARAM_STR);
		$action->bindParam(":basic", $basic, PDO::PARAM_STR);
		
		return $action->execute();
	}

	
	public function findMaxPhoneId(){
		
		$query = $this->db->query("SELECT MAX(`id`) AS idi FROM `Phones`");
		$vars = $query->fetchAll();
		foreach($vars as $var){
		
		   $id = (int)$var['idi'];
		}
		return $id + 1;
	}
	
	public function findMaxEmailId(){
		
		$query = $this->db->query("SELECT MAX(`id`) AS idi FROM `Email`");
		$vars = $query->fetchAll();
		foreach($vars as $var){
		
		   $id = (int)$var['idi'];
		}
		return $id + 1;
	}
	
	public function showPhones($id){
		
		$query = $this->db->query("SELECT mobile, home, work, basic FROM Phones INNER JOIN User ON User.phone = Phones.id WHERE User.id = $id");
		return $result = $query->fetchAll();
	}
	public function showEmails($id){
		
		$query = $this->db->query("SELECT first_email, second_email FROM Email INNER JOIN User ON User.email = Email.id WHERE User.id = $id");
		return $result = $query->fetchAll();
	}
	
	public function showPhoneId($id){
		
		$query = $this->db->query("SELECT phone FROM User WHERE id = $id");
		foreach( $result = $query->fetchAll() as $id){
			$_SESSION['phoneId'] = (int)$id['phone'];	
		}
	}
	
	public function showEmailId($id){
		
		$query = $this->db->query("SELECT email FROM `User` WHERE id = $id");
		foreach( $result = $query->fetchAll() as $id){
			$_SESSION['emailId'] = (int)$id['email'];	
		}
	}
	
	
	public function addEmail($email = []){
		
		$query = 
		$this->db
		->prepare("INSERT INTO Email
		(first_email, second_email) VALUES
		(:first_email, :second_email)");
		
		return $query->execute(array(
		":first_email" => $email['first_email'], 
		":second_email" => $email['second_email'],
		));
	}
public function showUsers($id)
{
    $query = $this->db->query("SELECT * FROM `User` WHERE id != ".$id);
    return $query->fetchAll();
}

    public function addToBlock($id)
    {
        $query =
            "UPDATE User SET
        status = :status	
		WHERE id = :id";
        $action = $this->db->prepare($query);
        $action->bindParam(":status", $status, PDO::PARAM_STR);
        $action->bindParam(":id", $id, PDO::PARAM_STR);
        return $action->execute();
    }
}
?>