<?php
class Ord{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}

    public function addord($CustomerID, $RegNo, $PickupDate, $RetDate) {
     $stmt= $this->db->prepare("INSERT INTO ord (CustomerID,RegNo,PickupDate, RetDate) values (:CustomerID, :RegNo,:PickupDate, :RetDate)");
    
	$stmt->bindValue(':CustomerID', $CustomerID, PDO::PARAM_STR);
	 $stmt->bindValue(':RegNo', $RegNo, PDO::PARAM_STR);
	 $stmt->bindValue(':PickupDate', $PickupDate, PDO::PARAM_STR);
	 $stmt->bindValue(':RetDate', $RetDate, PDO::PARAM_STR);
     $add1=$stmt->execute();
	 

}
    

	public function oneord($OrderId) {
	 $sql = 'Select OrderId, customer.CustomerID,FirstName, LastName,  car.RegNo, Make, Model, PickupDate, RetDate from  car, customer, ord where
	 car.RegNo = ord.RegNo and customer.CustomerID = ord.CustomerID and OrderId = :OrderId';
	 $stmt =$this->db->prepare($sql);
     $stmt->bindParam(':OrderId', $OrderId, PDO::PARAM_STR);
	 $stmt->execute();
     return $stmt->fetch();
	}

	public function findcar($RegNo) {
			$sql = "select RegNo, Make,  Model, FuelType, NumberSeats, Status, Price  from car where RegNo like :RegNo order by Price";
	        $stmt = $this->db->prepare($sql);
	  	    $stmt->bindValue(':RegNo', "%".$RegNo."%", PDO::PARAM_STR);
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		
		public function findcustomer($FirstName) {
			$sql = "select CustomerID, FirstName,  LastName, DOB, Street, Town, County, Phone, Email from customer where FirstName like :FirstName order by FirstName";
	        $stmt = $this->db->prepare($sql);
	  	    $stmt->bindValue(':FirstName', "%".$FirstName."%", PDO::PARAM_STR);
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}


	public function allord() {
     $sql = 'Select * from car, customer, ord where car.RegNo = ord.RegNo and customer.CustomerID = ord.CustomerID';
     $stmt =$this->db->prepare($sql);
     $stmt->execute();
	 return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updatecopyrecord($OrderId, $PickupDate, $RetDate) {
     $sql = 'UPDATE ord SET
	 PickupDate=:PickupDate,
	 RetDate = :RetDate
	 WHERE OrderId = :OrderId';
     $stmt = $this->db->prepare($sql);
     $stmt->bindValue(':OrderId', $OrderId,PDO::PARAM_STR);
     $stmt->bindValue(':PickupDate', $PickupDate,PDO::PARAM_STR);
	 $stmt->bindValue(':RetDate', $RetDate,PDO::PARAM_STR);
	 $stmt->execute();
    }

    public function deletecopyrecord($OrderId) {
     $sql = 'DELETE from ord WHERE OrderId = :OrderId';
     $stmt = $this->db->prepare($sql);
     $stmt->bindValue(':OrderId', $OrderId,PDO::PARAM_STR);
 	 $stmt->execute();
	 
    }
}

?>