<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$json = file_get_contents('php://input');

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

            $data = array();
            $data["data"] = array();    
            $data["status"];
            $data["message"];

            if(!$organization){
                $data["status"] = 404;
                $data["message"] = "Not Found!";

                http_response_code(404);
                echo json_encode($data);
                die;
            }

            extract($organization);

            $data = array();
            $data["data"] = array("id"=>$ID,"organization_name"=>$name,"address"=>$address,"website"=>$website,"email"=>$email,"mobile"=>$mobile,"logo"=>$logo);    
            $data["status"] = 200;
            $data["message"] = "Success";

            http_response_code(200);
            echo json_encode($data);

            die;
        }
    }
    break;
    case "POST":{
        $data = json_decode($json);

        $payload = array("name"=>$data->name,"address"=>$data->address,"website"=>$data->website,"email"=>$data->email,"mobile"=>$data->mobile,"logo"=>$data->logo);

        $organizations->add_new_organization($payload);

        $data = array();
        $data["data"] = $payload;    
        $data["status"] = 201;
        $data["message"] = "New Organization Added";

        http_response_code(201);
        echo json_encode($data);
        die;
    }
    break;
    case "PATCH":{
        if(!isset($_GET["id"])){
            http_response_code(304);
            die;
        }
        $data = json_decode($json);
        
        $payload = array("name"=>$data->name,"address"=>$data->address,"website"=>$data->website,"email"=>$data->email,"mobile"=>$data->mobile,"logo"=>$data->logo);

        $response=  $organizations->update_organization($_GET["id"],$payload);


        if($response){
            $data = array();
            $data["payload"] = $payload;    
            $data["status"] = 200;
            $data["message"] = "Organization Updated";
    
            http_response_code(200);
            echo json_encode($data);
            die;
        }else{
            $data = array();
            $data["payload"] = $payload;    
            $data["status"] = 304;
            $data["message"] = "Not Modified";
    
            http_response_code(200);
            echo json_encode($data);
        }
    }
    break;
    case "DELETE":{
        if(!isset($_GET["id"])){
            http_response_code(304);
            die;
        }
        $response = $organizations->delete_organization($_GET["id"]);

        if($response){
            $data = array();
            $data["data"] = [];    
            $data["status"] = 200;
            $data["message"] = "Organization Deleted";
    
            http_response_code(200);
            echo json_encode($data);
            die;
        }else{
            $data = array();
            $data["data"] = [];    
            $data["status"] = 304;
            $data["message"] = "Not Modified";
    
            http_response_code(200);
            echo json_encode($data);
        }
    }
    break;
    default:{
        http_response_code(400);
        echo json_encode(array("data"=>[],"message"=>"Invalid Request"));
        die;
    }
}

