<?php
class apartment_upload_model
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
	
	public function add_apartmentListing_to_db($imagePath, $address1, $address2, $city, $zipCode, $title, $description, $sq_feet, $numBeds, $numBaths, $numRoommates, $floor, $monthlyRent, $securityDeposit, $available_since, $lease_end_date, $state, $country, $user_id)
	{
		$sql = "INSERT INTO apartments (title, description, pictures, rent, deposit, address_line_1, address_line_2, city, state, country, ZIP, sq_feet, nr_bedrooms, nr_bathrooms, nr_roommates, floor, available_since, lease_end_date, created_date, updated_date, user_id) VALUES('$title', '$description', '$imagePath', '$monthlyRent', '$securityDeposit', '$address1', '$address2', '$city', '$state', '$country', '$zipCode', '$sq_feet', '$numBeds', '$numBaths', '$numRoommates', '$floor', '$available_since', '$lease_end_date', '$available_since', '$available_since', '$user_id')";
		//$sql = "INSERT INTO apartments (address_line_1, address_line_2, city, ZIP, title, pictures, description, sq_feet, nr_bedrooms, nr_bathrooms, nr_roommates, floor, monthly_rent, security_deposit, available_since, lease_end_date VALUES('$address1', '$address2', '$city', '$zipCode', '$title', '$imagePath', '$description', '$sq_feet', '$numBeds', '$numBaths', '$numRoommates', '$floor', '$monthlyRent', '$securityDeposit', '$available_since', '$lease_end_date')";
		$query = $this->db->prepare($sql);
		echo $query->execute(); //Returns true if added, false if not added to database
	}
	
	public function uploadImage($imagePath)
	{
		$sql = "INSERT INTO apartments (pictures) VALUES ('$imagePath')";
		$query = $this->db->prepare($sql);
		$query->execute();
	}
}