<?php 

//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../config/database.php";
include_once "../../models/organizations.php";

//Instantiate DB

$database = new Database();
$db = $database->connect();

$organizations = new Organizations($db);

$method = $_SERVER["REQUEST_METHOD"];

switch($method){
    case "GET":{
        if(empty($_GET)){
            $results = $organizations->get_organizations();
            $organizations = $results->fetchAll(PDO::FETCH_ASSOC);
            $data = array();
            $data["data"]= array();
            $data["status"] = 200;
            $data["message"] = "success";
            foreach($organizations as $organization){
                extract($organization);
                $item = array("id"=>$ID,"organization_name"=>$name,"address"=>$address,"website"=>$website,"email"=>$email,"mobile"=>$mobile,"logo"=>$logo);
                array_push($data["data"],$item);
            }
            
            http_response_code(200); 
            echo json_encode($data);
        }
        if($_GET["id"]){
            $result= $organizations->get_organization_with_id($_GET["id"]);
            $organization = $result->fetch(PDO::FETCH_ASSOC);
            extract($organization);

            $data = array();
            $data["data"] = array("id"=>$ID,"organization_name"=>$name,"address"=>$address,"website"=>$website,"email"=>$email,"mobile"=>$mobile,"logo"=>$logo);    
            $data["status"] = 200;
            $data["message"] = "Success";
            
            http_response_code(200);
            echo json_encode($data);
        }
        die;
    }
    break;
    case "POST":{
        var_dump($_POST);
        echo $_POST;
    }
    break;
    default:{
        http_response_code(400);
        echo json_encode(array("data"=>[],"message"=>"Invalid Request"));
        die;
    }
}

