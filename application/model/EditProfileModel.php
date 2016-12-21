<?php

class EditProfileModel
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

    /**
     * Get all songs from database
     */
    public function getProfileInfo($user_id)
    {
        $sql = "SELECT id, firstname, lastname, email FROM Users WHERE user_id='$user_id'";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
    

    /**
     * Get a song from database
     */
    // public function getUser($user_id)
    // {
    //     $sql = "SELECT firstname, lastname, email, address1, address2, mobilenumber FROM Users LIMIT 1";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':user_id' => $user_id);

    //     // useful for debugging: you can see the SQL behind above construction by using:
    //     // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    //     $query->execute($parameters);

    //     // fetch() is the PDO method that get exactly one result
    //     return $query->fetch();
    // }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    // public function updateUser($firstname, $lastname, $email, $address1, $address2, $mobilenumber)
    // {
    //     $sql = "UPDATE Users SET firstname = :firstname, lastname = :lastname, email = :email, address1 = :address1, address2 = :address2, mobile_number = :mobile_number WHERE id = :user_id";
    //     $query = $this->db->prepare($sql);
    //     $parameters = array(':firstname' => $firstname, ':lastname' => $lastname, ':email' => $email, ':address1' => $address1, ':address2' => $address2, ':mobilenumber' => $mobile_number, ':user_id' => $user_id);

    //     // useful for debugging: you can see the SQL behind above construction by using:
    //     // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    //     $query->execute($parameters);
    // }

   
}
