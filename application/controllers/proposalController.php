<?php

class ProposalController extends Controller {
    
    function beforeAction () {
        //$this->controllerScope = 'public';
    }

    function new($stage = 'settings'){
        $this->doNotRenderContentHeader = 1;
        $stage_perc = array("settings" => "0", "template" => "25", "offer" => "50", "preview" => "75", "send" => "100");
        $this->set('page_header', 'Add New Proposal');
        $this->set('page_description', 'Add a New Proposal');
        $this->set('stage', $stage);
        $this->set('stage_perc', $stage_perc);
        $Client = $this->loadController('Client');
        $this->set('clients',$Client->Client->selectAll());
        $Product = $this->loadController('Product');
        $this->set('products',$Product->Product->selectAll());
        $this->set('countries', explode(',',Application::getConfig('country.list')));
        //if ($stage == 'template') {
            $Protemplate = $this->loadController('Protemplate');
            $this->set('protemplate',$Protemplate->Protemplate->selectAll());
        //}
    }
    
    function view($id = null,$name = null) {
        $this->set('page_header', 'Proposal profile');
        $this->set('page_description', 'Proposals');
        $this->set('level_url', 'client/viewall');
        $this->set('level', 'Proposals');
        $this->Proposal->id = $id;
        $client = @array_shift($this->Proposal->select($this->Proposal->id));
        $this->set('client', $client);
    }
     
    function viewall() {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Proposals');
        $this->set('page_description', 'Proposals');
        $result = $this->Proposal->query("SELECT proposal.id, proposal.name, CONCAT (client.name, ' ', client.lastname) AS client
                                            FROM proposal
                                            INNER JOIN client ON proposal.client = client.id;");
        $this->set('todo',$result);
    }
     
    function add($stage = 'settings') {
        $this->doNotRenderHTML = 1;
        
        $stage = $_POST['stage'];

        switch ($stage) {
            case 'settings':
                session_start();
                $Client = $this->loadController('Client');
                $Client->id = $_POST['client_id'];
                $client_row = @array_shift($Client->Client->select($Client->id));
                $values = "'".$_POST['proposal_name']."','".$Client->id."','1','".$_POST['due_date']."','".$_POST['prop_notes']."','".$_POST['prob_range']."'";
                $result = ($this->Proposal->query("INSERT INTO proposal (name, client, user, due, notes, probability) VALUES (".$values.")", 1) == true ) 
                            ? true : false;
                $_SESSION['proposal']['settings'] = array('proposal_name' => $_POST['proposal_name'], 'client_id' => $_POST['client_id'],
                                                          'client_name' => $client_row['name'], 'client_lastname' => $client_row['lastname'], 
                                                          'client_email' => $client_row['email'], 'due_date' => $_POST['due_date'], 
                                                          'prop_notes' => $_POST['prop_notes'], 'prob_range' => $_POST['prob_range'],
                                                          'proposal_id' => $this->Proposal->getLastInsertID());
                echo $result;
                break;
            case 'template':
                session_start();
                $_SESSION['proposal']['template'] = array('template_id' => $_POST['template_id']);
                //$values = "'".$_POST['proposal_name']."','".$Client->id."','1','".$_POST['due_date']."','".$_POST['prop_notes']."','".$_POST['prob_range']."'";
                $result = ($this->Proposal->query("UPDATE proposal SET template = ".$_POST["template_id"]." WHERE id = '".$_SESSION['proposal']['settings']['proposal_id']."'", 1) == true ) 
                            ? true : false;
                echo $result;
                //echo "UPDATE proposal SET template = ".$_POST["template_id"]." WHERE id = '".$_SESSION['proposal']['settings']['proposal_id']."'";
                //echo $_SESSION['proposal']['settings']['proposal_id'];
                break;
            case 'offer':
                session_start();
                $_SESSION['proposal']['offer'] = array('product_id' => $_POST['product_id']);
                $Product = $this->loadController('Product');
                $Product->id = $_SESSION['proposal']['offer']['product_id'];
                $product_row = @array_shift($Product->Product->select($Product->id));
                $Protemplate = $this->loadController('Protemplate');
                $Protemplate->id = $_SESSION['proposal']['template']['template_id'];
                $content = $Protemplate->Protemplate->select($Protemplate->id);

                $fields = array('%proposal-initial-invoice%', '%proposal-approved-design-invoice%', '%proposal-final-invoice%');
                $values = array( ($product_row['price'] * Application::getConfig('proposal.initial-invoice-perc')/100),
                                 ($product_row['price'] * Application::getConfig('proposal.approved-design-invoice-perc')/100),
                                 ($product_row['price'] * Application::getConfig('proposal.final-invoice-perc')/100)
                                );
                $total = array_sum($values);
                $content = str_replace( $fields, $values, $content[0]['content']);
                $content = str_replace( '%proposal-total-cost%', $total, $content);
                $_SESSION['proposal']['template']['content'] = $content;//[0]['content'];

                $result = ($this->Proposal->query("UPDATE proposal SET product = ".$_POST["product_id"]." WHERE id = '".$_SESSION['proposal']['settings']['proposal_id']."'", 1) == true ) 
                            ? true : false;
                echo $result;
                break;
            case 'complete':
                session_start();
                $content = "hola";
        }
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->Proposal->query('DELETE FROM client WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
    }

    function edit($id = null) {
        $this->Proposal->id = $id;
        $this->set('page_header','Edit Proposal');
        $this->set('countries', explode(',',Application::getConfig('country.list')));
        $client = @array_shift($this->Proposal->select($this->Proposal->id));
        $this->set('client', $client);
    }

    function update($id = null) {
        $this->doNotRenderHTML = 1;
        $values = 'name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].
                  '",phone="'.$_POST['phone'].'",address="'.$_POST['address'].'",country="'.$_POST['country'].
                  '",company_name="'.$_POST['company_name'].'",company_about="'.$_POST['company_about'].
                  '",budget="'.$_POST['budget'].'",target_audience="'.$_POST['target_audience'].
                  '",website="'.$_POST['website'].'",webhost_company="'.$_POST['webhost_company'].
                  '",use_existing_website_content="'.$_POST['use_existing_website_content'].'",intended_domain="'.$_POST['intended_domain'].'"';
        
        $result = ($this->Proposal->query('UPDATE client SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? 'true' : 'false' ;
        echo $result;
    }

    function public_action(){
        $this->actionVisibility = 'public';
        $this->doNotRenderHTML = 1;
        $this->setLayout('frontend');
        echo "publicAction";
    }
    
    function afterAction() {

    }
}