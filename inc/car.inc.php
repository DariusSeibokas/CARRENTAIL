<?php
class Car{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
	}


	public function allcar() {
	    $sql = "select car.RegNo, Make,  Model, FuelType, NumberSeats, Status, Price  from car order by Price;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	

	public function onecar($RegNo) {
		$sql = 'Select * from car where RegNo = :RegNo';
        $stmt = $this->db->prepare($sql);
  	    $stmt->bindParam(':RegNo', $RegNo, PDO::PARAM_STR);
       $stmt->execute();
       return $stmt->fetch();
	}

		public function findcar($Make) {
			$sql = "select RegNo, Make,  Model, FuelType, NumberSeats, Status, Price  from car where Make like :Make order by Price";
	        $stmt = $this->db->prepare($sql);
	  	    $stmt->bindValue(':Make', "%".$Make."%", PDO::PARAM_STR);
	        $stmt->execute();
	        return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}



public function addcar($RegNo, $Make, $Model, $FuelType, $NumberSeats, $Status, $Price) {

  $this->db->beginTransaction();
  $stmt= $this->db->prepare("INSERT INTO car (RegNo, Make, Model, FuelType, NumberSeats, Status, Price) values (:RegNo, :Make, :Model, :FuelType, :NumberSeats, :Status, :Price)
   ON DUPLICATE KEY UPDATE  Model= (Model = :Model);");
  $stmt->bindValue(':RegNo', $RegNo, PDO::PARAM_STR);
  $stmt->bindValue(':Make', $Make, PDO::PARAM_STR);
  $stmt->bindValue(':Model', $Model, PDO::PARAM_STR);
  $stmt->bindValue(':FuelType', $FuelType, PDO::PARAM_STR);
  $stmt->bindValue(':NumberSeats', $NumberSeats, PDO::PARAM_STR);
  $stmt->bindValue(':Status', $Status, PDO::PARAM_STR);
  $stmt->bindValue(':Price', $Price, PDO::PARAM_STR);
  $add1=$stmt->execute();
 
  if($add1){
		$this->db->commit();
  }
  else   $this->db->rollback();
}

public function updaterecord($RegNo, $Status, $Price) {
    $sql = 'UPDATE car SET 
	Status = :Status,
    Price = :Price
    WHERE RegNo = :RegNo';
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':RegNo', $RegNo,PDO::PARAM_STR);
   	$stmt->bindValue(':Status', $Status,PDO::PARAM_STR);
    $stmt->bindValue(':Price', $Price ,PDO::PARAM_STR);
	$stmt->execute();
}

public function deleterecord($RegNo) {
    $sql = 'DELETE from car WHERE RegNo = :RegNo';
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':RegNo', $RegNo,PDO::PARAM_STR);
	$stmt->execute();
}

}

?>
