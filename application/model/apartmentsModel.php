<?php

class ApartmentsModel
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

    public function getAptsByKeywords($keywords)
    {
        if(isset($keywords)){
            $sql = "SELECT id, title, description, pictures, address_line_1, address_line_2, city, state, ZIP, nr_bedrooms, nr_bathrooms,nr_roommates,rent  FROM apartments WHERE city LIKE :keywords OR ZIP LIKE :keywords ORDER BY id DESC";// description LIKE :keywords OR address_line_1 LIKE :keywords OR title LIKE :keywords 
            $query = $this->db->prepare($sql);
            $parameters = array(':keywords' => "%".$keywords."%");

            // useful for debugging: you can see the SQL behind above construction by using:
            // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $keywords);  exit();

            $query->execute($parameters);//

            // fetch() is the PDO method that get exactly one result
            return $query->fetchAll();
        }else{
            return getAllApartments();
        }
    }

    /**
     * Get all songs from database
     */
    public function getAllApartments()
    {

        $sql = "SELECT id, title, description, pictures, address_line_1, address_line_2, city, state, ZIP, nr_bedrooms, nr_bathrooms,nr_roommates,rent FROM apartments ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Get all songs from database
     */
        public function getUserListings($user_id)
    {
        $sql = "SELECT id, title, description, pictures, address_line_1, address_line_2, city, state, ZIP, nr_bedrooms, nr_bathrooms,nr_roommates, user_id FROM apartments WHERE user_id = :user_id";
        $parameters = array(':user_id' => $user_id);
        $query = $this->db->prepare($sql);
        $query->execute($parameters);

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    //get information to view all messages attached to a listing
    public function getReservationsList($apt_id){
        $sql = "SELECT R.created_date, R.message, U.firstname, U.lastname, U.user_id FROM reservations R, users U WHERE R.user_id = U.user_id and R.apt_id = $apt_id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    //remove apartment on listings page
    public function remove_apartment($apt_id)
    {
        $sql = "DELETE FROM apartments WHERE id = :apt_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':apt_id' => $apt_id);
        $query->execute($parameters);
    }

    public function getContactInfo($user_id, $apt_id){
        

        if(isset($user_id))
        {
            $sql = "SELECT firstname, lastname, message, email FROM users U, reservations R WHERE R.user_id = $user_id
            and R.apt_id = $apt_id and U.user_id = $user_id";
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

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

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
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }
}
