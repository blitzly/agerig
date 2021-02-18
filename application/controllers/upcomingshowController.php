<?php

class UpcomingshowController extends Controller {
    
    function beforeAction () {
        //$this->setLayout('frontend');
        $this->set('user_img','/img/user/default.jpg');
        $this->set('user_name', 'John Doe');
        //$this->set('sidebar_menu', '      ');
    }
 
    function index(){
        $this->set('page_header', 'Shows');
        $this->set('page_description', 'Shows index page');
        $this->set('intro', 'User');
        $this->set('content', 'Hello World');
    }

    function new(){
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Add New User');
        $this->set('page_description', 'Add a New User');        
    }
    
    function view($id = null,$name = null) {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'User profile');
        $this->set('page_description', 'Shows');
        $this->set('level_url', 'show/viewall');
        $this->set('level', 'Shows');
        $this->User->id = $id;
        $show = @array_shift($this->User->select($this->User->id));
        $this->set('show', $show);
        $this->set('profile_img', file_exists('img/user/'.$user['id'].'.jpg') ? '/img/user/'.$user['id'].'.jpg'  : '/img/user/default.jpg');
    }
     
    function viewall() {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Shows');
        $this->set('page_description', 'Shows');
        $this->set('todo',$this->Upcomingshow->selectAll());
        $this->set('show','Lorem Ipsum User');
    }
     
    function add() {
        $this->doNotRenderHTML = 1;
        $values = '"'.$_POST['name'].'","'.$_POST['lastname'].'","'.$_POST['email'].'","'.$_POST['phone'].'","'.
                      $_POST['address'].'","'.$_POST['username'].'","'.hash('md5', $_POST['password']).'"';
        //$values = $this->User->_link->real_escape_string($values);
        $result = ($this->User->query('INSERT INTO show (name, lastname, email, phone, address, username, password) VALUES ('.$values.')', 1) == true ) 
                  ? '{"result":"true", "last_id" : "' . $this->User->getLastInsertID() . '" }' : '{"result":"false"}' ;
        echo json_encode($result);
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->User->query('DELETE FROM show WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
        //echo 'DELETE FROM show WHERE id = \''.$_POST['id'].'\'';
    }

    function edit($id = null) {
        $this->doNotRenderContentHeader = 1;
        $this->User->id = $id;
        $this->set('page_header','Edit User');
        $show = @array_shift($this->User->select($this->User->id));
        $this->set('show', $show);
    }

    function update() {
        $this->doNotRenderHTML = 1;
        $values = 'name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].
                  '",phone="'.$_POST['phone'].'",address="'.$_POST['address'].'",username="'.$_POST['username'].
                  '", password="'.hash('md5', $_POST['password']).'"';
        
        $result = ($this->User->query('UPDATE show SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) 
                  ? '{"result":"true"}' : '{"result":"false"}' ;
            
        echo json_encode($result);
    }
    
    function afterAction() {

    }
}