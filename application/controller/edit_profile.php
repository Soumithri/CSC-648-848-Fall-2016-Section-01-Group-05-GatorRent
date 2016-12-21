<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class edit_profile extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // getting all songs and amount of songs
        // $user_id =1;
        // $UserProfile = $this->EditProfileModel->getProfileInfo($user_id);

       // load views. within the views we can echo out $songs and $amount_of_songs easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/UserProfile/index.php';
        require APP . 'view/_templates/footer.php';
    }

    
    // public function editProfile($user_id)
    // {
    //     // if we have an id of a song that should be edited
    //     $user_id = 1;
    //     if (isset($user_id)) {
    //         // do getSong() in model/model.php
    //         //$user = $this->EditProfileModel->getUser($user_id);

    //         // in a real application we would also check if this db entry exists and therefore show the result or
    //         // redirect the user to an error page or similar

    //         // load views. within the views we can echo out $song easily
    //         require APP . 'view/_templates/header.php';
    //         require APP . 'view/UserProfile/index.php';
    //         require APP . 'view/_templates/footer.php';
    //     } else {
    //         // redirect user to songs index page (as we don't have a song_id)
    //         header('location: ' . URL . 'UserProfile/index');
    //     }
    // }
    
    /**
     * ACTION: updateSong
     * This method handles what happens when you move to http://yourproject/songs/updatesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a song" form on songs/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateUser()
    {
        // if we have POST data to create a new song entry
        if (isset($_POST["submit_update_user"])) {
            // do updateSong() from model/model.php
            $this->EditProfileModel->updateUser($_POST["firstname"], $_POST["lastname"],  $_POST["email"], $_POST['address1'], $_POST['address2'], $_POST['mobile_number']);
        }

        // where to go after song has been added
        header('location: ' . URL . 'UserProfile/index');
    }
}
