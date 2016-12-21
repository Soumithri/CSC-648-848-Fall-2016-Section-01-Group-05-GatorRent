
                 <div class="container">
            <div class="panel panel-default panel-body">
                <?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']==='Y')) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alertModal" data-whatever="@mdo"  style="float: right">Contact</button><?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']==='Y')) echo  "-->"; ?>
                <?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']!=='Y')) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="float: right">Contact</button><?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']!=='Y')) echo "-->"; ?>
                <?php if (isset($_SESSION['username'])) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@mdo"  style="float: right" onclick="javascript:$('#from').val('<?php echo $apt_id; ?>');">Contact</button><?php if (isset($_SESSION['username'])) echo "-->"; ?>
         <h1 ID="head">Apartment Details</h1>
         <div class="row">
         <div class="col-lg-5">
        <div  style="width: 370px; height: 210px;">

  <!-- Wrapper for slides -->

      <img src=http://www.conlorca.com/img/no-foto.png id="pics" style="width:100%;height:100%;">

</div>
        </div>
         <div class="col-lg-5">

             <div id="map"></div>
         </div>


        </div>
            </div>
        </div>



        <div class="container" style="padding-top:15px">
            <div class="panel panel-default panel-body">
                <div class="row">
                    <div class="col-sm-2">
                    <div id="Post_Date"></div>
                    <div id="enddate"></div>
                    </div>
                    <div class="col-sm-2">
                    <div id="floorsize"></div>
                    <div id="floors"></div>
                    </div>
                    <div class="col-sm-2">
                    <div id="bed"></div>
                    <div id="bath"></div>
                    </div>
                    <div class="col-sm-2">
                    <div id="pvrroom"></div>
                    <div id="pvrbath"></div>

                    </div>
                    <div class="col-sm-2">
                    <div id="kitchen"></div>
                    <div id="roomates"></div>
                    </div>


                    <div class="col-sm-2">
                    <div id="rent"></div>
                    <div id="security"></div>
                    </div>
                </div>
            </div>
         </div>



        <div class="container" >
            <div class="panel panel-default panel-body">
                        <b> <font size="+2">Description: </font> </b>
                        <div id="Address"></div>
                        <div id="desciption"></div>






 <?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']==='Y')) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alertModal" data-whatever="@mdo"  style="float: right">Contact</button><?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']==='Y')) echo  "-->"; ?>
                <?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']!=='Y')) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="float: right">Contact</button><?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']!=='Y')) echo "-->"; ?>
                <?php if (isset($_SESSION['username'])) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@mdo"  style="float: right" onclick="javascript:$('#from').val('<?php echo $apt_id; ?>');">Contact</button><?php if (isset($_SESSION['username'])) echo "-->"; ?>
<!--<button type="button" class="btn btn-success">Contact</button>-->


            </div>
        </div>

<!--Modal Code taken from http://getbootstrap.com/javascript/-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Contact Poster</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo URL; ?>/apartment_details/sendMessage/<?php echo htmlspecialchars($apt_id, ENT_QUOTES, 'UTF-8'); ?>" method="post">
          <div id="details-excerpt"></div>

          
         
            <div class="form-group">
        <p></p>
            <label for="recipient-name" class="control-label">This message will be sent to the poster's email.</label>
<!--            <input type="text" class="form-control" id="recipient-name">-->
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea type="text" name="message"class="form-control" id="message-text" >Hi, I am a student attending SFSU and I am interested in your apartment! Please contact me at (Enter form of contanct here)! </textarea>
          </div>
      </div>
      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
       </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Alert</h4>
                      </div>
                      <div class="modal-body">
                          You need to register with a SFSU mail address to contact the poster
                      </div>
                      <div class="modal-footer">
                    </form>
                      </div>
                    </div>
                  </div>
                </div>   
    <script>
function initMap() {
var db = <?php echo json_encode($listing) ?>;

document.getElementById("Address").innerHTML ="Address: ".bold()+db[0].address_line_1+" "+db[0].address_line_2+", "+db[0].city+", "+db[0].state+" "+db[0].ZIP;
document.getElementById("head").innerHTML =db[0].title;
document.getElementById("desciption").innerHTML =db[0].description;
document.getElementById("Post_Date").innerHTML ="Posted: ".bold()+db[0].available_since;
document.getElementById("floorsize").innerHTML ="Floor Size: ".bold()+db[0].sq_feet+" ft";
document.getElementById("bed").innerHTML ="Beds: ".bold()+db[0].nr_bedrooms;
document.getElementById("bath").innerHTML ="Baths: ".bold()+db[0].nr_bathrooms;
document.getElementById("roomates").innerHTML ="Max Tenants: ".bold()+db[0].nr_roommates;
document.getElementById("floors").innerHTML ="Floors: ".bold()+db[0].floor;
if(db[0].private_room=="TRUE"){
    document.getElementById("pvrroom").innerHTML ="Private Room: ".bold()+"Yes";
}else{
    document.getElementById("pvrroom").innerHTML ="Private Room: ".bold()+"No";
}
if(db[0].private_bath=="TRUE"){
    document.getElementById("pvrbath").innerHTML ="Private Bath: ".bold()+"Yes";
}else{
    document.getElementById("pvrbath").innerHTML ="Private Bath: ".bold()+"No";
}
if(db[0].kitchen_in_apartment=="TRUE"){
    document.getElementById("kitchen").innerHTML ="Contains Kitchen: ".bold()+"Yes";
}else{
    document.getElementById("kitchen").innerHTML ="Contains Kitchen: ".bold()+"No";
}
document.getElementById("rent").innerHTML ="Rent: ".bold()+"$"+db[0].rent;
document.getElementById("security").innerHTML ="Deposit: ".bold()+"$"+db[0].deposit;
document.getElementById("enddate").innerHTML ="Lease End:  ".bold()+db[0].lease_end_date;
document.getElementById("pics").src =db[0].pictures;
    document.getElementById("details-excerpt").innerHTML ="Details Glance: ".bold()+
                                                           "<br />Address: ".bold()+db[0].address_line_1+" "+db[0].address_line_2+", "+db[0].city+", "+db[0].state+" "+db[0].ZIP+
                                                           "<br />Rent: ".bold()+"$"+db[0].rent+
                                                           "<br />Safety Deposit: ".bold()+"$"+db[0].deposit+
                                                           "<br />Beds: ".bold()+db[0].nr_bedrooms+"<br /> Baths: ".bold()+db[0].nr_bathrooms+"<br />   ";
var adr=db[0].address_line_1+", "+db[0].city;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,                                                      //zoom level is at 15, cities
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();


          geocodeAddress(geocoder, map, adr);

      }

      function geocodeAddress(geocoder, resultsMap,adr) {
        var address = "bleh"
        geocoder.geocode({'address': adr}, function(results, status) {      //address here
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
            var infowindow = new google.maps.InfoWindow({
                content: adr
              });
              infowindow.open(map,marker);

          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXxgXPNa8j_pEDG45gxOjvUd48rvvP4GQ&callback=initMap">
    </script>

