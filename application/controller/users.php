<?php

/**
 * Class Users
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

class Users extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // getting all songs and amount of songs
       //  $songs = $this->model->getAllSongs();
       //  $amount_of_songs = $this->model->getAmountOfSongs();

       // // load views. within the views we can echo out $songs and $amount_of_songs easily
       //  require APP . 'view/_templates/header.php';
       //  require APP . 'view/songs/index.php';
       //  require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: register
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function register()
    {
        // if we have POST data to create a new song entry
        // if (isset($_POST["submit_add_song"])) {
            // do addSong() in model/model.php
            $is_student = 'N';
            if ( strpos($_POST["email"], ".edu") !== false ) {
                $is_student = 'Y';
            }
            $password = crypt($_POST["password"], '$1$');
            $this->usersModel->addUser($_POST["firstname"], $_POST["lastname"],  $_POST["email"], $password, $is_student);
            $user =  $this->usersModel->getUser($_POST["email"]);
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['user_id'] = $user->user_id;
            $_SESSION['is_student'] = $user->is_student;
            $_SESSION['username'] = $_POST["firstname"];
            $_SESSION['success_alert'] = "Successfully created a account!";
        // }

        // require APP . 'view/_templates/header.php';
        // require APP . 'view/apartments/index.php';
        // require APP . 'view/_templates/footer.php';
        // where to go after song has been added
        header('location: ' . URL . '');
    }

    /**
     * ACTION: login
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function login()
    {
        // if we have POST data to create a new song entry
        // if (isset($_POST["submit_add_song"])) {
            // do addSong() in model/model.php
            // $is_student = 'N';
            // if ( strpos($_POST["email"], ".edu") !== false ) {
            //     $is_student = 'Y';
            // }
            if (!isset($_SESSION)) {
                session_start();
            }
            $user =  $this->usersModel->getUser($_POST["email"]);
            if(isset($user->password)&&$user->password === crypt($_POST["password"], '$1$')){
                $_SESSION['user_id'] = $user->user_id;
                $_SESSION['is_student'] = $user->is_student;
                $_SESSION['username'] = $user->firstname;
                $_SESSION['success_alert'] = "Welcome ".$user->firstname."!";
            }else{
                $_SESSION['wrong_alert'] = "Email or Password is not correct.";
            }
        // $_SESSION['username'] = 'Michael';
            // $this->usersModel->addUser($_POST["firstname"], $_POST["lastname"],  $_POST["email"],  $_POST["password"], $is_student);
        // }

        // require APP . 'view/_templates/header.php';
        // require APP . 'view/apartments/index.php';
        // require APP . 'view/_templates/footer.php';
        // where to go after song has been added
        if ($_POST['from'] === "posting"){
            $_POST['from']=null;
            header('location: ' . URL . 'apartment_upload');
        }else if($_POST['from'] === "login"){
            header('location: ' . URL . '');
        }else{
            header("location: " . URL . "apartment_details/index/" . $_POST['from']);
        }
    }

    /**
     * ACTION: login
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function logout()
    {
        // if we have POST data to create a new song entry
        // if (isset($_POST["submit_add_song"])) {
            // do addSong() in model/model.php
            // $is_student = 'N';
            // if ( strpos($_POST["email"], ".edu") !== false ) {
            //     $is_student = 'Y';
            // }
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['user_id'] = null;
            $_SESSION['is_student'] = null;
            $_SESSION['username'] = null;
// echo $_SESSION['username'];
            // $this->usersModel->addUser($_POST["firstname"], $_POST["lastname"],  $_POST["email"],  $_POST["password"], $is_student);
        // }

        // require APP . 'view/_templates/header.php';
        // require APP . 'view/apartments/index.php';
        // require APP . 'view/_templates/footer.php';
        // where to go after song has been added
        $_SESSION['success_alert'] = "You have logged out!";
        header('location: ' . URL . '');
    }

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/songs/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $song_id Id of the to-delete song
     */
    public function deleteSong($song_id)
    {
        // if we have an id of a song that should be deleted
        if (isset($song_id)) {
            // do deleteSong() in model/model.php
            $this->model->deleteSong($song_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'songs/index');
    }

     /**
     * ACTION: editSong
     * This method handles what happens when you move to http://yourproject/songs/editsong
     * @param int $song_id Id of the to-edit song
     */
    public function editSong($song_id)
    {
        // if we have an id of a song that should be edited
        if (isset($song_id)) {
            // do getSong() in model/model.php
            $song = $this->model->getSong($song_id);

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar

            // load views. within the views we can echo out $song easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/songs/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'songs/index');
        }
    }
    
    /**
     * ACTION: updateSong
     * This method handles what happens when you move to http://yourproject/songs/updatesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateSong()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_song"])) {
            // do updateSong() from model/model.php
            $this->model->updateSong($_POST["artist"], $_POST["track"],  $_POST["link"], $_POST['song_id']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'songs/index');
    }

    /**
     * AJAX-ACTION: ajaxGetStats
     * TODO documentation
     */
    public function ajaxGetStats()
    {
        $amount_of_songs = $this->model->getAmountOfSongs();

        // simply echo out something. A supersimple API would be possible by echoing JSON here
        echo $amount_of_songs;
    }

}