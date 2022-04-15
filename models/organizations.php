<?php 

class Organizations{
    //for db
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function get_organizations(){
        $query = "SELECT * FROM organizations";

        //Prepare
        $stmt = $this->conn->prepare($query);

        //Execute
        $stmt->execute();

        return $stmt;
    }

    public function get_organization_with_id($id){
        $query = "SELECT * FROM organizations WHERE ID = ?";

        //Prepare
        $stmt = $this->conn->prepare($query);

        //Execute
        $stmt->execute([$id]);

        return $stmt;
    }
}