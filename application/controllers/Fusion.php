<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fusion extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');

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
        if($rows != null){
            array_walk($rows, function(&$row) use ($columns) {
                $row = array_combine($columns, $row);
            });
        }
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
     * $parameter1 => column name (e.g. mechanic,manager,chlorine,qual)
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

            $selectQuery = "UPDATE 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB SET qual = '".$parameter3."' WHERE ROWID = '".$parameter2."'";

            $result = $service->query->sql($selectQuery);

            $this->create_contribution($parameter2, $parameter1, $parameter3);

            echo json_encode($this->combineColumnsAndRows($result));

        }

    }

    public function create_contribution($waterpointid, $column, $condition)
    {
        $this->load->model('community_model');

        $this->community_model->contribution($waterpointid, $column, $condition);

    }

    public function get_lastrow()
    {
        $service = $this->fusion_service();

        $selectQuery = "select cartodb_id from 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB ORDER BY cartodb_id DESC LIMIT 1";

        $result = $service->query->sql($selectQuery);

        echo json_encode($this->combineColumnsAndRows($result));
    }

    /**
     * $param1 => province
     * $param2 => season
     **/

    public function count_waterpoints($param1 = null, $param2 = null, $param3 = null, $param4 = null, $param5 = null){

        $service = $this->fusion_service();

        if($param1 === 'all' && $param2 === 'all' && $param3 === 'all' && $param4 === 'all' && $param5 === 'all'){

            $selectQuery = "select count(rowid) as count from 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB";

            $result = $service->query->sql($selectQuery);

            echo json_encode($this->combineColumnsAndRows($result));

        }else{

            $preQuery = "select count(rowid) as count from 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB WHERE ";

            $conditions = array();

            if($param1 != 'all'){
                $conditions[] = "province = '$param1'";
            }

            if ($param2 == 'Unknown'){
                $conditions[] = "season = ''";
            }elseif ($param2 == 'Water'){
                $conditions[] = "season = 'Water year-round'";
            }elseif ($param2 == 'Dry'){
                $conditions[] = "season = 'Dry Always / Never water'";
            }elseif($param2 == 'Seasonal'){
                $conditions[] = "season = 'Seasonal'";
            }

            if($param3 == 'functional'){
                $conditions[] = "funct = 'Yes- functional'";
            }elseif ($param3 == 'bdown'){
                $conditions[] = "funct = 'No- broken down'";
            }elseif ($param3 == 'pdamaged'){
                $conditions[] = "funct = 'Yes- but partly damaged'";
            }elseif ($param3 == 'sucon'){
                $conditions[] = "funct = 'No- still under construction'";
            }

            if($param4 == 'yes'){
                $conditions[] = "mechanic = 'Yes'";
            }elseif ($param4 == 'no'){
                $conditions[] = "mechanic = 'No'";
            }elseif ($param4 == 'unknown'){
                $conditions[] = "mechanic = 'Unknown'";
            }

            if($param5 == 'm20'){
                $conditions[] = "parts = 'More than 20 miles'";
            }elseif ($param5 == 'wcom'){
                $conditions[] = "parts = 'In this community'";
            }elseif ($param5 == 'w20'){
                $conditions[] = "parts = 'Within 20 miles'";
            }

            if (count($conditions) > 0) {

                $consql = implode(' and ', $conditions);

                $selectQuery = $preQuery . $consql;

                $result = $service->query->sql($selectQuery);

                echo json_encode($this->combineColumnsAndRows($result));
            }

        }


    }

    public function insert_newrow()
    {
        $newid = $this->input->post('newid');
        $longitude = $this->input->post('nw_lon');
        $latitude = $this->input->post('nw_lat');
        $name = $this->input->post('nw_name');
        $used = $this->input->post('nw_used');
        $province = $this->input->post('nw_prov');
        $district = $this->input->post('nw_dist');
        $chiefdom = $this->input->post('nw_chief');
        $section = $this->input->post('nw_section');
        $parts = $this->input->post('nw_parts');
        $mechanic = $this->input->post('nw_mechanic');
        $money = $this->input->post('nw_money');
        $age = $this->input->post('nw_age');
        $manager = $this->input->post('nw_manager');
        $wtype = $this->input->post('nw_wtype');
        $funct = $this->input->post('nw_funct');
        $chlorine = $this->input->post('nw_chlorine');
        $season = $this->input->post('nw_season');
        $quality = $this->input->post('nw_quality');

        $service = $this->fusion_service();

        $selectQuery = "INSERT INTO 1aHLU3Qqsl9X_W_BEvZaPn_dkNV8UtXtJPnKedgKB (cartodb_id, used, sectionn, chiefdom, district, province, namee, parts, mechanic, money, manager, chlorine, qual, season, age, wtype, funct, lon, lat, y, x) VALUES ('$newid', '$used', '$section', '$chiefdom', '$district', '$province', '$name', '$parts', '$mechanic', '$money', '$manager', '$chlorine', '$quality', '$season', '$age', '$wtype', '$funct', '$longitude', '$latitude', '$latitude', '$longitude')";

        $result = $service->query->sql($selectQuery);

        echo json_encode($this->combineColumnsAndRows($result));
        //echo json_encode($selectQuery);
    }

}