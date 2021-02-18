<?php

class ProtemplateController extends Controller {
    
    function beforeAction ($id = null) {
        /*$this->Protemplate->id = $id;
        $protemplate = @array_shift($this->Protemplate->select($this->Protemplate->id));
        $sidebar_menu = explode(',', $protemplate['sections']);
        $this->set('sidebar_menu', $this->getSideMenu($sidebar_menu));*/
    }

    function new(){
        $this->set('page_header', 'Add New Protemplate');
        $this->set('page_description', 'Add a New Protemplate');
        $this->set('countries', explode(',',Application::getConfig('country.list')));
    }
    
    function view($id = null,$name = null) {
        $this->set('level_url', 'protemplate/viewall');
        $this->set('level', 'Protemplates');
        $this->Protemplate->id = $id;
        $protemplate = @array_shift($this->Protemplate->select($this->Protemplate->id));
        $this->set('page_header', $protemplate['name'] . ' <small>Proposal template preview</small>');
        $this->set('protemplate', $protemplate);
        $sidebar_menu = explode(',', $protemplate['sections']);
        $this->set('sidebar_menu', $this->getSideMenu($sidebar_menu));
    }
     
    function viewall() {
        $this->set('page_header', 'Templates');
        $this->set('page_description', 'Proposal Templates');
        $this->set('todo',$this->Protemplate->selectAll());
    }
     
    function add() {
        $this->doNotRenderHTML = 1;
        $website = (empty($_POST['intended_domain'])) ? $_POST['website'] : '';
        $webhost_company = (empty($_POST['intended_domain'])) ? $_POST['webhost_company'] : '';
        $values = '"'.$_POST['name'].'","'.$_POST['lastname'].'","'.$_POST['email'].'","'.$_POST['phone'].'","'.
                      $_POST['address'].'","'.$_POST['country'].'","'.$_POST['company_name'].'","'.$_POST['company_about'].'","'.
                      $_POST['budget'].'","'.$_POST['target_audience'].'","'.$website.'","'.$webhost_company.'","'.
                      $_POST['use_existing_website_content'].'","'.$_POST['intended_domain'].'"';

        $result = ($this->Protemplate->query('INSERT INTO protemplate (name, lastname, email, phone, address, country, company_name, company_about, budget, target_audience, website, webhost_company, use_existing_website_content, intended_domain) VALUES ('.$values.')', 1) == true ) 
                  ? 'true' : 'false' ;
        echo $result;
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->Protemplate->query('DELETE FROM protemplate WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
    }

    function edit($id = null) {
        $this->Protemplate->id = $id;
        $this->set('page_header','Edit Protemplate');
        $this->set('countries', explode(',',Application::getConfig('country.list')));
        $protemplate = @array_shift($this->Protemplate->select($this->Protemplate->id));
        $this->set('protemplate', $protemplate);
    }

    function update($id = null) {
        $this->doNotRenderHTML = 1;
        $values = 'name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].
                  '",phone="'.$_POST['phone'].'",address="'.$_POST['address'].'",country="'.$_POST['country'].
                  '",company_name="'.$_POST['company_name'].'",company_about="'.$_POST['company_about'].
                  '",budget="'.$_POST['budget'].'",target_audience="'.$_POST['target_audience'].
                  '",website="'.$_POST['website'].'",webhost_company="'.$_POST['webhost_company'].
                  '",use_existing_website_content="'.$_POST['use_existing_website_content'].'",intended_domain="'.$_POST['intended_domain'].'"';
        
        $result = ($this->Protemplate->query('UPDATE protemplate SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? 'true' : 'false' ;
        //echo('UPDATE protemplate SET '.$values.' WHERE id = "'.$_POST['id'].'"');
        echo $result;
    }
    
    function afterAction() {

    }
}