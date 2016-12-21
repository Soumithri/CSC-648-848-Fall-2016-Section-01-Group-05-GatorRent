<?php
class apartment_details extends Controller
{
	//Public function index might be called when page loads?
	public function index($apt_id)
	{
		if(isset($apt_id))
		{
			$listing = $this->apartment_detail_model->getListing($apt_id);
		
			require APP . 'view/_templates/header.php';
			require APP . 'view/apartment_detail/index.php';
			require APP . 'view/_templates/footer.php';
		}
		else
		{
				echo "$apt_id is not set.";
		}
	}
	
	public function sendMessage($apt_id)
	{
		if (!isset($_SESSION)) {
                session_start();
        }
		
		$id = $apt_id;
		//echo $id;
		$msg = $_POST["message"];
		$user_id = $_SESSION['user_id'];
		//var_dump($_SESSION);
		$date = date("m/d/y");
		if(isset($id) && isset($user_id) && isset($msg) && isset($date))
		{
				$this->apartment_detail_model->sendMsg($apt_id, $user_id, $msg, $date);
		}
		else
		{
			echo "something isn't set";
		}
		$_SESSION['success_alert'] = "Successfully sent a message!";
		header("location: " . URL . "apartment_details/index/" . $apt_id);
	}
	
	public function listing($id)
	{
		require APP . 'view/_templates/header.php';
		require APP . 'view/apartment_detail/index.php';
		require APP . 'view/_templates/footer.php';
	}
}

