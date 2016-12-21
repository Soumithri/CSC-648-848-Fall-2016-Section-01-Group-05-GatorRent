<?php
class apartment_upload extends Controller
{
	public function index()
	{
		require APP . 'view/_templates/header.php';
		require APP . 'view/apartment_upload/index.php';
		require APP . 'view/_templates/footer.php';
	}
	
	public function upload()
	{
		if (!isset($_SESSION)) {
                session_start();
        }
		//var_dump($_POST);
		//var_dump($_FILES);
		$target_dir = "/home/f16g05/public_html/Group5/public/img/";
		//$target_dir = "f16g05/public_html/Group5/public/img/";
		//$Ctime = time();
		//var_dump($target_dir . basename($_FILES["pic1"]["name"]));
		$target_file = $target_dir . basename($_FILES["pic1"]["name"]); //Need to change fileToUpload
		//var_dump($target_file);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake  
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["pic1"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["pic1"]["size"] > 500000000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} 
		else 
		{
			if (move_uploaded_file($_FILES["pic1"]["tmp_name"], $target_file)) 
			{
				echo "The file ". basename( $_FILES["pic1"]["name"]). " has been uploaded.";
			} 
			else 
			{
				echo "Sorry, there was an error uploading your file.";
			}
		}
		
		$address1 = $_POST["address1"];
		$address2 = $_POST["address2"];
		$city = $_POST["city"];
		$zipCode = (int) $_POST["zipCode"];
		$title = $_POST["title"];
		$description = $_POST["description"];
		$sq_feet = (int) $_POST["sqrFeet"];
		$numBeds = (int) $_POST["numBeds"];
		$numBaths = (int) $_POST["numBaths"];
		$numRoommates = (int) $_POST["numRoommates"];
		$floor = (int) $_POST["numFloors"];
		$monthlyRent = (int) $_POST["monthlyRent"];
		$securityDeposit = (int) $_POST["securityDeposit"];
		$available_since = date("j/n/Y");
		$lease_end_date = $_POST["leaseEndDate"];
		$state = "CA";
		$country = "USA";
		$user_id = $_SESSION['user_id']; 
		$imagePath = "//sfsuswe.com/~f16g05/Group5/public/img/" . basename($_FILES["pic1"]["name"]);
		if(isset($imagePath) && isset($address1) && isset($address2) && isset($city) && isset($zipCode) && isset($title) && isset($description) && isset($sq_feet) && isset($numBeds) && isset($numBaths) && isset($numRoommates) && isset($floor) && isset($monthlyRent) && isset($securityDeposit) && isset($available_since) && isset($lease_end_date))
		{
			$returnVal = $this->apartment_upload_model->add_apartmentListing_to_db($imagePath, $address1, $address2, $city, $zipCode, $title, $description, $sq_feet, $numBeds, $numBaths, $numRoommates, $floor, $monthlyRent, $securityDeposit, $available_since, $lease_end_date, $state, $country, $user_id);
		}
		
		echo "\n" . $imagePath . "\n";
		echo $target_dir . basename($_FILES["pic1"]["name"]);
		
		$_SESSION['success_alert'] = "Successfully posted a apartment!";
		header("Location: " . URL . "apartments/index");
	}
}