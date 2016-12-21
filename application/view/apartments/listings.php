<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="Em" content="">


    <link href="<?php echo URL . "public/css/listingStyle.css" ?>" rel="stylesheet">

</head>

<body>
<?php $renters = array("Jeffrey Illar", "Kevin Fang", "Matthew Wishoff", "Soumithiri Chilakamarri", "Gaunming Michael", "EmilSantos", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Eee", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Renter", "Eee", "Renter", "Renter"); 
    $j = 0?>

    <!-- Page Content -->
    <div class="listing_container">
        <!-- Page Heading -->
        <div class="header">
                <h1 class="page-header">Welcome <?php echo $_SESSION['username']; ?>! List of Apartments Posted by You</h1>
        </div>
        <!-- /.row -->
<?php foreach ($apartments as $apartment) { ?>
        <!-- Apartment One -->
        <div class="row1">
        <h1>
            <a href="#">
                <?php if (isset($apartment->pictures)) { ?>
                <img class="image" src="<?php echo htmlspecialchars($apartment->pictures, ENT_QUOTES, 'UTF-8'); ?>" width="400"></img>
                <?php } ?>
            </a>
        </h1>
        <h2>
            <div class="right-box">
                <div class="buttons">
                    <!-- EDIT BUTTON -->
                    <!-- <p><a class="edit-button" href="#">Edit</a></p> -->
                    <?php if (isset($apartment->id)) { ?>
                    <!-- REMOVE BUTTON -->
                    <p><a class="remove-button" href="<?php echo URL . 'apartments/remove_listing/' . htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?>" target="apartments/listings">&#10006;</a> </p>
                    <?php } ?>
                </div>

                <!-- LOOP FOR RESERVATIONS -->

                <div class = "buyer-info">
                <?php foreach ($apartment->reservations as $reservation) {?>
                    <p>
                    <?php echo $reservation->firstname . ' ' . $reservation->lastname; ?>
                    <a class="message-button" href="<?php echo URL . 'apartments/getReservationInfo/' . htmlspecialchars($reservation->user_id, ENT_QUOTES, 'UTF-8') . "/" . htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?>">View Message</a></p>
                    </p>
                <?php };?>
                </div>
                
                

            </div>
        </h2>
        </div>

<?php } ?>
</div>


