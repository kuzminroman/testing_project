<?php
namespace controllers;
use vendor\Controller;
use models\DataBase;

class UserController extends Controller{
	
	public function indexAction(){
		
		$this->view->render('Users');
	}
	public function registAction(){
		
		$db = new DataBase();
	
		$phones = [
		'mobile' => $_POST['mobile'],
		'home' => $_POST['home'],
		'work' => $_POST['work'],
		'basic' => $_POST['phone'],
		];
		
		$email = [
		'first_email' => $_POST['first_email'],
		'second_email' => $_POST['second_email'],
		];
		
		$vars = [
		'name' => $_POST['name'],
		'surname' => $_POST['surname'],
		'patronymic' => $_POST['patronymic'],
		'phone' => $db->findMaxPhoneId(),
		'email' => $db->findMaxEmailId(),
		'pass' => $_POST['pass'],
		];
			
		$db->addPhones($phones);
		$db->addEmail($email);
		$db->regist($vars);
		
	$this->view->render('Регистрация');
}
    public function loginAction(){
		
		$login = $_POST['email'];
		$password = $_POST['pass'];
		
		$db = new DataBase();
	
		if($db->login($login, $password) == true){
	
			$id = $db->getId($login, $password);
			$_SESSION['id'] = $id;

			$this->view->redirect('/profile/show');
		}
		
		$this->view->render('Логин');
		
	}
	
	public function showAction(){

		
		$this->view->redirect('/profile/edit');
		
	}
}
?>