<?php

/**
 * Class Apartments
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Apartments extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // getting all songs and amount of songs
        $apartments = $this->apartmentsModel->getAllApartments();

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/apartments/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function detail($apt_id)
    {
        if(isset($apt_id))
        {
            $listing = $this->apartment_detail_model->getListing($apt_id);
        }
		
		header("Location: " . URL . "apartment_details/index/" . $apt_id);
    }

    public function search()
    {
        // getting all songs and amount of songs
        if (isset($_POST["keywords"])) {
            $apartments = $this->apartmentsModel->getAptsByKeywords($_POST["keywords"]);
            $keywords = $_POST["keywords"];
        }

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/apartments/index.php';
        require APP . 'view/_templates/footer.php';
    }
    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addSong()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_song"])) {
            // do addSong() in model/model.php
            $this->model->addSong($_POST["artist"], $_POST["track"],  $_POST["link"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'songs/index');
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

    public function renterinfo()
    {
            //$apartments = $this->apartmentsModel->getAllApartments();
            require APP . 'view/_templates/header.php';
            require APP . 'view/apartments/renterinfo.php';
            require APP . 'view/_templates/footer.php';
    }

    public function listings()
    {
            if (!isset($_SESSION)) {
                session_start();
            }
            $apartments = $this->apartmentsModel->getUserListings($_SESSION['user_id']);
            foreach ($apartments as $apartment) {
                $reservations = $this->apartmentsModel->getReservationsList($apartment->id);
                $apartment->reservations = $reservations;
            }

            require APP . 'view/_templates/header.php';
            require APP . 'view/apartments/listings.php';
            require APP . 'view/_templates/footer.php';
    }

    public function delete(){
            echo "test";
            require APP . 'view/_templates/header.php';
            require APP . 'view/apartments/listings.php';
            require APP . 'view/_templates/footer.php';
    }


    //remove listing on listings page
    public function remove_listing($apt_id){
        if (!isset($_SESSION)) {
                session_start();
            }
        if (isset($apt_id)) {
            $this->apartmentsModel->remove_apartment($apt_id);
        }

        // where to go after apartment has been deleted
        $_SESSION['success_alert'] = "Successfully deleted a apartment!";
        header('location: ' . URL . 'apartments/listings');
    }

    public function getReservationInfo($user_id, $apt_id)
    {
        if (isset($user_id)) {
            $contactinfo = $this->apartmentsModel->getContactInfo($user_id, $apt_id);
            require APP . 'view/_templates/header.php';
            require APP . 'view/apartments/renterinfo.php';
            require APP . 'view/_templates/footer.php';

        } else {
            header('location: ' . URL . 'apartments/listings');
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
    


}
