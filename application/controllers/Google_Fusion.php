<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google_Fusion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
    }

    public function get_data($parameter = null)
    {
        if($parameter == null OR $parameter == 0){

            echo json_encode($parameter);

        }else{

            require_once(APPPATH.'../vendor/autoload.php');

            putenv('GOOGLE_APPLICATION_CREDENTIALS='.APPPATH.'libraries/google_api_creds/credentials.json');

            $client = new Google_Client();
            $client->useApplicationDefaultCredentials();
            $client->setScopes('https://www.googleapis.com/auth/fusiontables');

            function combineColumnsAndRows($result) {
                // use column names to create associative arrays in $rows
                $columns = $result->getColumns();
                $rows = $result->getRows();
                array_walk($rows, function(&$row) use ($columns) {
                    $row = array_combine($columns, $row);
                });
                return $rows;
            }

            $service = new Google_Service_Fusiontables($client);

            $selectQuery = "select * from 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB where cartodb_id = ".$parameter;

            $result = $service->query->sql($selectQuery);

            echo json_encode(combineColumnsAndRows($result));
            //echo $parameter;
        }


    }

}