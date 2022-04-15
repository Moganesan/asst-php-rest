<?php 

class Assets{
    //FOR DB
    private $conn;
    private $table = "assets";

    //ASSET PROPERTIES
    public $id;
    public $organization_id;
    public $building_id;
    public $branch_id;
    public $floor_id;
    public $category_id;
    public $sub_category_id;
    public $asset_tag;
    public $serial;
    public $model;
    public $status;
    public $asset_name;
    public $supplier;
    public $order_no;
    public $purchase_cost;
    public $working_condition;
    public $created_at;
    public $modified_at;

    //
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Get Assets

    public function read(){
        $query = "SELECT * FROM branches";

        //Prepare
        $stmt = $this->conn->prepare($query);

        //Execute

        $stmt->execute();

        return $stmt;
    }


}