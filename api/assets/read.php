<?php 

//Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../config/database.php";
include_once "../../models/assets.php";

//Instantiate DB & Connect

$database = new Database();

$db = $database->connect();

//Instantiate Asset object

$asset = new Assets($db);


//Asset Query
$result = $asset->read();
//Get row count
$num = $result->rowCount();

//Check if any assets

if($num>0){
    $assets_arr= array();
    $assets_arr['data']= array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $asset_item = array(
            'organization'=>$organization
        );

        //Push to data

        array_push($assets_arr['data'],$asset_item);
    }
    //Turn to JSON & Output
    echo json_encode($assets_arr);
}else{
    echo json_encode(
        array("Message"=>"No Assets Found")
    );
}