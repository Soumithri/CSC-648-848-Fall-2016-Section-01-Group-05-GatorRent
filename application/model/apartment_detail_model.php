<?php
class apartment_detail_model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
	public function getListing($id)
	{
		if(isset($id))
		{
			$sql = "SELECT address_line_1, address_line_2, city, state, country, ZIP, title, description, sq_feet, nr_bedrooms, nr_bathrooms, nr_roommates, floor, rent, deposit, pictures, available_since, lease_end_date FROM apartments WHERE id = '$id'";
			$query = $this->db->prepare($sql);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
		else
		{
			echo "$id not set";
		}
	}
	
	public function sendMsg($apt_id, $user_id, $msg, $date)
	{
		$sql = "INSERT INTO reservations (apt_id, user_id, message, created_date) VALUES('$apt_id', '$user_id', '$msg', '$date')";
		$query = $this->db->prepare($sql);
		$query->execute();
	}
}
