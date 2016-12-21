<?php
/**
 * We just want to hash our password using the current DEFAULT algorithm.
 * This is presently BCRYPT, and will produce a 60 character result.
 *
 * Beware that DEFAULT may change over time, so you would want to prepare
 * By allowing your storage to expand past 60 characters (255 would be good)
 */
// echo crypt("12", '$1$')."<br>";
// echo sizeof($apartments);
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88575305-3', 'auto');
  ga('send', 'pageview');

</script>

<div class="container-fluid">
  <div class = "row content">
    <?php if (strpos($_SERVER['REQUEST_URI'], 'search') !== false) echo "<!-- "; ?><div class="container"><div class="col-md-12"><center><h1>Welcome to GatorRent</h1></center></div><br><div class="col-md-12"><center><h3>The purpose of this website is to provide SFSU Students a easier housing search</h3></center></div></div><?php if (strpos($_SERVER['REQUEST_URI'], 'search') !== false) echo " -->"; ?>
  </div>


 

<!-- <div class = "row content">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form action="<?php echo URL; ?>apartments/search" method="POST">
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <input type="text" name="keywords" value="<?php if (isset($keywords)) echo htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'); ?>" class="form-control input-lg" placeholder="Please enter a Zip Code or City" />
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-lg" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
        </form>
       </div>
       <div class ="col-md-3"></div>         
</div> -->

<!-- filter -->
  <div class="row content">
    <div class="col-sm-2 sidenav filterspacing" style="display: none">
      <div id="accordion" class="panel panel-primary behclick-panel">
        <div class="panel-heading">
          <center><h3 class="panel-title">Aprtment and Room Filter</h3></center>
        </div>
        <div class="panel-body" >
          <div class="panel-heading " >
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapse0">
                <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Price
              </a>
            </h4>
          </div>
          <div id="collapse0" class="panel-collapse collapse in" >
            <ul class="list-group">
              <li class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="radio" name="price" value="0 - 1000">
                    0 - 1000$
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox" >
                  <label>
                    <input type="radio" name="price" value="1000 - 2000">
                    1000$ - 2000$
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox"  >
                  <label>
                    <input type="radio" name="price" value="2000 - 3000">
                    2000$ - 6000$
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox"  >
                  <label>
                    <input type="radio" name="price" value="More than 6000">
                    More Than 6000$
                  </label>
                </div>
              </li>
            </ul>
          </div>

          <div class="panel-heading " >
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapse1">
                <i class="indicator fa fa-caret-down" aria-hidden="true"></i> Distance
              </a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in" >
            <ul class="list-group">
              <li class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="radio" name="distance" value="5">
                    5 miles
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox" >
                  <label>
                    <input type="radio" name="distance" value="10">
                    10 miles
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox"  >
                  <label>
                    <input type="radio" name="distance" value="25">
                    25 miles
                  </label>
                </div>
              </li>
            </ul>
          </div>

            <div class="panel-heading" >
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapse2"><i class="indicator fa fa-caret-down" aria-hidden="true"></i> Bed Rooms</a>
            </h4>
          </div>
          <div id="collapse2" class="panel-collapse collapse in">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="radio" name="BedRooms" value="1">
                    1
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox" >
                  <label>
                    <input type="radio" name="BedRooms" value="2">
                    2
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox"  >
                  <label>
                    <input type="radio" name="BedRooms" value="3">
                    3
                  </label>
                </div>
              </li>
            </ul>
          </div>

          <div class="panel-heading" >
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapse3"><i class="indicator fa fa-caret-down" aria-hidden="true"></i> Bath Rooms</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse in">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="radio" name="BathRooms" value="1">
                    1
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox" >
                  <label>
                    <input type="radio" name="BathRooms" value="2">
                    2
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox"  >
                  <label>
                    <input type="radio" name="BathRooms" value="3">
                    3
                  </label>
                </div>
              </li>
            </ul>
          </div>

       <!--    <div class="panel-heading" >
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#collapse4"><i class="indicator fa fa-caret-down" aria-hidden="true"></i> City </a>
            </h4>
          </div>
          <div id="collapse4" class="panel-collapse collapse in">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="radio" value="">
                    San Francisco
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox" >
                  <label>
                    <input type="radio" value="">
                    Daily City
                  </label>
                </div>
              </li>
              <li class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="radio" value="">
                    Some random city
                  </label>
                </div>
              </li>
            </ul>
          </div> -->

        </div>
      </div>
    </div>

<!--  <div class="container" id="searchable-container"> -->

     <div class="col-sm-12 text-left rentalbox"> 
        <div class="container">
         <?php if (strpos($_SERVER['REQUEST_URI'], 'search') === false) echo "<!-- "; ?><div class="col-md-12" style='margin-top:-60px;font-size:1.5em;text-align: center;'><?php if (sizeof($apartments) ==0) echo "Your search \"".$_POST["keywords"]."\" did not match any rooms. Please enter a valid zip code or city name and try again."; else echo "".sizeof($apartments)." results for \"".$_POST["keywords"]."\"";?></div><?php if (strpos($_SERVER['REQUEST_URI'], 'search') === false) echo " -->"; ?>
          
              <div class="row">
              <ul class="thumbnails list-unstyled">
    <?php foreach ($apartments as $apartment) { ?>
               <li class="col-md-3">
                <div class="thumbnail clickable1" style="padding: 0">
                  <div style="padding:4px">
                    <!-- <img alt="300x200" style="width: 100%" src="https://i.ytimg.com/vi/mpBgDz9koms/hqdefault.jpg"> -->
                    <?php if (isset($apartment->pictures)) { ?>
                            <img src="<?php echo htmlspecialchars($apartment->pictures, ENT_QUOTES, 'UTF-8'); ?>" width="100%" height="190"></img>
                        <?php } ?>
                  </div>
                  <div class="caption">
                    <h3><?php
                      if (isset($apartment->title))
                        { 
                          if(strlen($apartment->title) > 15)
                          {
                            echo htmlspecialchars($apartment->title = substr($apartment->title, 0, 15)."...", ENT_QUOTES, 'UTF-8');
                          }
                          else
                          {
                            echo htmlspecialchars($apartment->title, ENT_QUOTES, 'UTF-8');
                          }
                        } ?></h3>
                      <p><?php if (isset($apartment->address_line_1)) echo htmlspecialchars($apartment->address_line_1, ENT_QUOTES, 'UTF-8'); ?></p>
                      <p><i class="icon icon-map-marker"></i> <?php if (isset($apartment->city)) echo htmlspecialchars($apartment->city, ENT_QUOTES, 'UTF-8'); ?>, <?php if (isset($apartment->ZIP)) echo htmlspecialchars($apartment->ZIP, ENT_QUOTES, 'UTF-8'); ?></p>
                  </div>

                  <div class="modal-footer" style="text-align: left">
                    <div class ="row infobox"> 
                      <div class="col-sm-4 infocolum">
                        <h6><i class="fa fa-dollar" style="font-size:15px"></i> : <?php if (isset($apartment->rent)) echo htmlspecialchars($apartment->rent, ENT_QUOTES, 'UTF-8'); ?></h6>
                      </div>
                      <div class="col-sm-4 infocolum">
                        <h6><i class="fa fa-bed"  aria-hidden="true" style="font-size:17px"> </i> : <?php if (isset($apartment->nr_bedrooms)) echo htmlspecialchars($apartment->nr_bedrooms, ENT_QUOTES, 'UTF-8'); ?></h6>
                      </div>
                      <div class="col-sm-4 infocolum">
                        <h6> <i class="fa fa-bath"  aria-hidden="true" style="font-size:17px"> </i> : <?php if (isset($apartment->nr_bathrooms)) echo htmlspecialchars($apartment->nr_bathrooms, ENT_QUOTES, 'UTF-8'); ?></h6>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <button type="button" class="btn btn-primary " data-toggle="modal" onclick="javascript:window.location='<?php echo URL; ?>apartments/detail/<?php echo htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?>';" style="float: left;">Details</button>      
                      </div>
                      <div class="col-md-6">
                        <?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']==='Y')) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alertModal" data-whatever="@mdo"  style="float: right">Contact</button><?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']==='Y')) echo  "-->"; ?>
                <?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']!=='Y')) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="float: right">Contact</button><?php if (!isset($_SESSION['username'])||(isset($_SESSION['is_student'])&&$_SESSION['is_student']!=='Y')) echo "-->"; ?>
                <?php if (isset($_SESSION['username'])) echo "<!-- "; ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@mdo"  style="float: right">Contact</button><?php if (isset($_SESSION['username'])) echo "-->"; ?>
                      </div>
                    </div>


                  <!--   <button type="button" class="btn btn-primary " data-toggle="modal" onclick="javascript:window.location='<?php echo URL; ?>apartments/detail/<?php echo htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?>';" style="float: left;">Details</button>                                               

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  style="float: right">Contact</button>
 -->
                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="exampleModalLabel">Contact Poster</h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <label for="recipient-name" class="control-label">This message will be sent to the poster's email.</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="control-label">Message:</label>
                              <textarea class="form-control" id="message-text">Hi, I am a student attending SFSU and I am interested in your apartment! Please contact me at student_email.</textarea>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                      </div>
                    </div>
                  </div>         -->

                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Contact Poster</h4>
                      </div>
                      <div class="modal-body">
                        <form action="<?php echo URL; ?>/apartments/sendMessage/<?php echo htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?>" method="post">
                          <div class="form-group">
                            <label for="recipient-name" class="control-label">This message will be sent to the poster's email.</label>
                <!--            <input type="text" class="form-control" id="recipient-name">-->
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="control-label">Message:</label>
                            <textarea type="text" name="message"class="form-control" id="message-text">Hi, I am a student attending SFSU and I am interested in your apartment! Please contact me at student_email.</textarea>
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


                      
<!-- 
                     <div class ="row infobox">
                      <div class="col-sm-4 infocolum">
                        <h6> $<?php if (isset($apartment->rent)) echo htmlspecialchars($apartment->rent, ENT_QUOTES, 'UTF-8'); ?> </h6>
                      </div>
                      <div class="col-sm-4 innerInfoColum">
                        <h6> <?php if (isset($apartment->nr_bedrooms)) echo htmlspecialchars($apartment->nr_bedrooms, ENT_QUOTES, 'UTF-8'); ?> </h6>
                      </div>
                      <div class="col-sm-4 infocolum">
                        <h6> <?php if (isset($apartment->nr_bathrooms)) echo htmlspecialchars($apartment->nr_bathrooms, ENT_QUOTES, 'UTF-8'); ?> </h6>
                      </div>
                    </div>  -->

                 </div>               
               </div>
             </li>
<?php } ?>
           </ul>
         </div>
        </div>
     </div>
       <!--  </div> -->
