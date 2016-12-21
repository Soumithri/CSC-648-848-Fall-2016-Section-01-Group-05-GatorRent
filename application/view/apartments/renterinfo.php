<!DOCTYPE html>
<head>

    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="Em" content="">

    <link href="<?php echo URL . "public/css/listingStyle.css" ?>" rel="stylesheet">

</head>

<div class="contact_container">
	<h1 class="page-header">Message from <?php echo $contactinfo[0] -> firstname. " " . $contactinfo[0] -> lastname; ?></h1>
		<div class="renter_information">
			<div class ="contact_info_name">
			<h1></h1>
			</div>
			<div>

			<h1 class="contact_info_message"><?php echo $contactinfo[0] -> message; ?></h1>
			</div>
			<div class = "contact_info_email">
			<!--<h1>Email:<?php //echo $contactinfo[0] -> email; ?></h1>-->
			<a class="email-button" href="mailto:<?php echo $contactinfo[0] -> email; ?>?subject=MY SUBJECT">Reply by Email</a>

			</div>
		</div>


</div>