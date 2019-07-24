<?php
namespace controllers;
use vendor\Controller;
use models\DataBase;

class ProfileController extends Controller{
	
	public function indexAction(){
		
		$this->view->render('Профиль');
		
	}

    public function showMyProfileAction(){

        $db = new DataBase;
        $id = $_SESSION['id'];
        $uploaddir = __DIR__ . '../src/img/profile/';
        $file_name =  basename($_FILES['img_profile']['name']);
        $uploadfile = $uploaddir . basename($_FILES['img_profile']['name']);

        if (isset($_FILES['img_profile'])){
            move_uploaded_file($_FILES['img_profile']['tmp_name'], $uploadfile);
            if ($_POST['upd_img'])
            {
                $db->updateImg($id, $file_name);
            }
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $patronymic = $_POST['patronymic'];

        $vars = $db->findById($id);

        if($_POST['edit']){

            $db->updateUser($id, $name, $surname, $patronymic);

            $vars = $db->findById($id);

        }

        $this->view->render('Пользователь', $vars);
    }


	public function showAction(){

		$db = new DataBase;
		$id = $_POST['user_id'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$patronymic = $_POST['patronymic'];

		$vars = $db->findById($id);

	    if($_POST['edit']){

			$db->updateUser($id, $name, $surname, $patronymic);
			
			$vars = $db->findById($id);
			
			}

        if($_POST['delete']){
            $id_us = $_POST['is_us'];
            $db->addToBlock($id_us);
        }

		$this->view->render('Пользователь', $vars);
	}
	
	public function deleteAction(){
		
		$db = new DataBase();
		$id = $_SESSION['id'];
		$db->deleteProfile($id);
		session_unset();
		$this->view->redirect("/");
	}
	
	public function logoutAction(){
		
		session_unset();
		$this->view->redirect("/");
	}
		
	public function phoneAction(){
	
		$db = new DataBase;
		
		$id = $_SESSION['id'];
		$mobile = $_POST['mobile'];
		$home = $_POST['home'];
		$work = $_POST['work'];
		$basic = $_POST['phone'];
		
		$vars = $db->showPhones($id);
	
	    if($_POST['update_phone']){
				
			$db->showPhoneId($id);
			
			$Phone = $_SESSION['phoneId'];
			
			$db->updatePhones($mobile, $home, $work, $basic, $Phone);
			
			$vars = $db->showPhones($id);
			
		}
	    $this->view->render('Контакты', $vars);
	}
	
    public function emailAction(){
	
		$db = new DataBase;
		
		$id = $_SESSION['id'];
		$first_email = $_POST['first_email'];
		$second_email = $_POST['second_email'];
		$basic = $_POST['email'];
		
		$vars = $db->showEmails($id);
	
	    if($_POST['update_email']){
				
			$db->showEmailId($id);
			
			$Email = $_SESSION['emailId'];
			
			$db->updateEmail($first_email, $second_email, $basic, $Email);
			
			$vars = $db->showEmails($id);
			
		}
	    $this->view->render('Контакты', $vars);
	}

    public function usersAction()
    {
        $db = new DataBase;
        $vars = $db->showUsers($_SESSION['id']);
        $this->view->render('Справочник пользователей', $vars);

    }

    public function testAction()
    {

        $this->view->render('Тест');
    }

	}
?>