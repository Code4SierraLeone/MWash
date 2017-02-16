<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fusion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('community_model');
    }

    private function fusion_service()
    {
        require_once(APPPATH.'../vendor/autoload.php');

        putenv('GOOGLE_APPLICATION_CREDENTIALS='.APPPATH.'libraries/google_api_creds/credentials.json');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes('https://www.googleapis.com/auth/fusiontables');

        $service = new Google_Service_Fusiontables($client);

        return $service;

    }

    private function combineColumnsAndRows($result)
    {
        // use column names to create associative arrays in $rows
        $columns = $result->getColumns();
        $rows = $result->getRows();
        array_walk($rows, function(&$row) use ($columns) {
            $row = array_combine($columns, $row);
        });
        return $rows;
    }

    public function get_data($parameter = null)
    {
        if($parameter == null OR $parameter == 0){

            echo json_encode($parameter);

        }else{

            $service = $this->fusion_service();

            $selectQuery = "select rowid,mechanic,manager,chlorine,qual from 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB where cartodb_id = ".$parameter;

            $result = $service->query->sql($selectQuery);

            echo json_encode($this->combineColumnsAndRows($result));

        }


    }

    /**
     * $parameter1 => column name (e.g. mechanic)
     * $parameter2 => row id
     * $paramter3 => row update (e.g yes,no,clean,empty)
     **/

    public function update_row($parameter1 = null, $parameter2 = null, $parameter3 = null)
    {
        $service = $this->fusion_service();

        if($parameter1 == 'mechanic'){

            $selectQuery = "UPDATE 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB SET mechanic = '".$parameter3."' WHERE ROWID = '".$parameter2."'";

            $result = $service->query->sql($selectQuery);

            $this->create_contribution($parameter2, $parameter1, $parameter3);

            echo json_encode($this->combineColumnsAndRows($result));

        }elseif ($parameter1 == 'manager'){

			$eachword = preg_split('/(?=[A-Z])/',$parameter3);

            $selectQuery = "UPDATE 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB SET manager = '".$eachword[1]." ".$eachword[2]."' WHERE ROWID = '".$parameter2."'";

            $result = $service->query->sql($selectQuery);

            $this->create_contribution($parameter2, $parameter1, $parameter3);

            echo json_encode($this->combineColumnsAndRows($result));

        }elseif ($parameter1 == 'chlorine'){

            $selectQuery = "UPDATE 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB SET chlorine = '".$parameter3."' WHERE ROWID = '".$parameter2."'";

            $result = $service->query->sql($selectQuery);

            $this->create_contribution($parameter2, $parameter1, $parameter3);

            echo json_encode($this->combineColumnsAndRows($result));

        }elseif ($parameter1 == 'qual'){

<<<<<<< HEAD
            //@todo find a solution for codeigniter url error for disallowed characters

            $service = new Google_Service_Fusiontables($client);

=======
>>>>>>> d5634b3... created feature to add a new water point
            $selectQuery = "UPDATE 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB SET qual = '".$parameter3."' WHERE ROWID = '".$parameter2."'";

            $result = $service->query->sql($selectQuery);

            $this->create_contribution($parameter2, $parameter1, $parameter3);

            echo json_encode($this->combineColumnsAndRows($result));

        }

    }

    public function create_contribution($waterpointid, $column, $condition)
    {

        $this->community_model->contribution($waterpointid, $column, $condition);

    }

    public function get_lastrow()
    {
        $service = $this->fusion_service();

        $selectQuery = "select cartodb_id from 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB ORDER BY cartodb_id DESC LIMIT 1";

        $result = $service->query->sql($selectQuery);

        echo json_encode($this->combineColumnsAndRows($result));
    }

}