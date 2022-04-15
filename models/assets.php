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
    public function __construct($db,
     $organization_id,
     $building_id,
     $branch_id,
     $floor_id,
     $category_id,
     $sub_category_id,
     $asset_tag,
     $serial,
     $model,
     $status,
     $asset_name,
     $supplier,
     $order_no,
     $purchase_cost,
     $working_condition,
     $created_at,
     $modified_at)
{
        $this->conn = $db;
        this->$id;
        this->$organization_id;
        this->$building_id;
        this->$branch_id;
        this->$floor_id;
        this->$category_id;
        this->$sub_category_id;
        this->$asset_tag;
        this->$serial;
        this->$model;
        this->$status;
        this->$asset_name;
        this->$supplier;
        this->$order_no;
        this->$purchase_cost;
        this->$working_condition;
        this->$created_at;
        public $modified_at;
    }

    //Get Assets

    public function read(){
        $query = "SELECT * FROM assets";

        //Prepare
        $stmt = $this->conn->prepare($query);

        //Execute

        $stmt->execute();

        return $stmt;
    }

    public function insert(){
        $query = "INSERT INTO assets(building,branch,floor,category,sub_category,asset_tag,serial,modal,status,asset_name,supplier,order_no,purchase_cost,warranty_month,image,working_condition,amc_details,amc_done_date,)"
    }
}