<?php
class Customer{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}


	public function allcustomer() {
	    $sql = "select customer.CustomerID, FirstName,  LastName, DOB, Street, County, Town, Phone, Email from customer order by CustomerID;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	

	public function onecustomer($CustomerID) {
		$sql = 'Select * from customer where CustomerID = :CustomerID';
        $stmt = $this->db->prepare($sql);
  	    $stmt->bindParam(':CustomerID', $CustomerID, PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetch();
	}

		public function findcustomer($LastName) {
			$sql = "select customer.CustomerID, FirstName,  LastName, DOB, Street, County, Town, Phone, Email from customer where LastName like :LastName group by LastName";
	        $stmt = $this->db->prepare($sql);
	  	    $stmt->bindValue(':LastName', "%".$LastName."%", PDO::PARAM_STR);
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}



public function addcustomer($CustomerID, $FirstName, $LastName, $DOB, $Street, $County, $Town, $Phone, $Email) {

  $this->db->beginTransaction();
  $stmt= $this->db->prepare("INSERT INTO customer (CustomerID, FirstName,  LastName, DOB, Street, County, Town, Phone, Email) values (:CustomerID, :FirstName,  :LastName, :DOB, :Street, :County, :Town, :Phone, :Email)");
  $stmt->bindValue(':CustomerID', $CustomerID, PDO::PARAM_STR);
  $stmt->bindValue(':FirstName', $FirstName, PDO::PARAM_STR);
  $stmt->bindValue(':LastName', $LastName, PDO::PARAM_STR);
  $stmt->bindValue(':DOB', $DOB, PDO::PARAM_STR);
  $stmt->bindValue(':Street', $Street, PDO::PARAM_STR);
  $stmt->bindValue(':County', $County, PDO::PARAM_STR);
  $stmt->bindValue(':Town', $Town, PDO::PARAM_STR);
  $stmt->bindValue(':Phone', $Phone, PDO::PARAM_STR);
  $stmt->bindValue(':Email', $Email, PDO::PARAM_STR);
  $add1=$stmt->execute();
  
  if($add1){
		$this->db->commit();
  }
  else   $this->db->rollback();
}

public function updaterecord($CustomerID,  $Street, $County, $Town, $Phone, $Email) {
    $sql = 'UPDATE customer SET 
	Street = :Street,
	County = :County,
	Town = :Town,
	Phone = :Phone,
	Email = :Email
    WHERE CustomerID = :CustomerID';
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':CustomerID', $CustomerID, PDO::PARAM_STR);
    $stmt->bindValue(':Street', $Street, PDO::PARAM_STR);
    $stmt->bindValue(':County', $County, PDO::PARAM_STR);
    $stmt->bindValue(':Town', $Town, PDO::PARAM_STR);
    $stmt->bindValue(':Phone', $Phone, PDO::PARAM_STR);
    $stmt->bindValue(':Email', $Email, PDO::PARAM_STR);
	$stmt->execute();
}

public function deleterecord($CustomerID) {
    $sql = 'DELETE from customer WHERE CustomerID = :CustomerID';
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':CustomerID', $CustomerID,PDO::PARAM_STR);
	$stmt->execute();
}

}

?>
