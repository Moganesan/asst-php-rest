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

    public function add_new_organization($payload){
        $query = "INSERT INTO organizations(name,address,website,email,mobile,logo) VALUES(:name,:address,:website,:email,:mobile,:logo)";

        //Prepare
        $stmt = $this->conn->prepare($query);

        //Execute
        $stmt->execute(["name"=>$payload["name"],"address"=>$payload["address"],"website"=>$payload["website"],"email"=>$payload["email"],"mobile"=>$payload["mobile"],"logo"=>$payload["logo"]]);

        return $stmt;
    }

    public function update_organization($org_id,$payload){
        $query = "UPDATE organizations SET name = :name, address = :address, website = :website, email = :email, mobile = :mobile, logo = :logo WHERE ID = :org_id";

        //Prepare
        $stmt = $this->conn->prepare($query);

        //Execute
        $stmt->execute(["name"=>$payload["name"],"address"=>$payload["address"],"website"=>$payload["website"],"email"=>$payload["email"],"mobile"=>$payload["mobile"],"logo"=>$payload["logo"],"org_id"=>$org_id]);

       if($stmt->rowCount()){
           return true;
       }else{
           return false;
       }
    }
}