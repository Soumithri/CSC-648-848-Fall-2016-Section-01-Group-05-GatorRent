<?php

class Controller
{
    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $model = null;
    public $apartmentsModel = null;
    public $usersModel = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();

        $this->loadApartmentsModel();
        $this->loadUsersModel();


        $this->loadEditProfileModel();

		$this->loadAptDetail();
		$this->loadAptUpload();

    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection()
    {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    /**
     * Loads the "model".
     * @return object model
     */
    public function loadModel()
    {
        require APP . 'model/model.php';
        // create new "model" (and pass the database connection)
        $this->model = new Model($this->db);
    }

    public function loadApartmentsModel()
    {
        require APP . 'model/apartmentsModel.php';
        $this->apartmentsModel = new ApartmentsModel($this->db);
    }

    public function loadUsersModel()
    {
        require APP . 'model/usersModel.php';
        $this->usersModel = new UsersModel($this->db);
    }


	
	public function loadEditProfileModel()
    {
        require APP . 'model/EditProfileModel.php';
        // create new "model" (and pass the database connection)
        $this->model = new Model($this->db);
    }
	

    
    public function loadAptDetail()
    {
		require APP.'model/apartment_detail_model.php';
		$this ->apartment_detail_model =new apartment_detail_model($this->db);
    }
	
	public function loadAptUpload()
	{
		require APP.'model/apartment_upload_model.php';
		$this->apartment_upload_model = new apartment_upload_model($this->db);
	}
	
	

	
	
	
	
	
	
	
	/**
     * null Database Connection
     */
    // public $db = null;

    // /**
     // *  null Model
     // */
    // public $databaseAPI = null;

    // /**
     // * Whenever database.php is called, open a database connection too and load "the model".
     // */
    // function __construct()
    // {
        // $this->openDatabaseConnection();
		// $this->loadDatabaseAPI();
    // }
	
	// /**
	 // * Connects to the database.
	 // */
	// private function openDatabaseConnection()
    // {
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    // }
	
	// public function loadDatabaseAPI()
    // {
        // require APP . 'controller/database_api.php';
        // create new "databaseAPI" (and pass the database connection)
        // $this->databaseAPI = new database_api($this->db);
    // }
}
