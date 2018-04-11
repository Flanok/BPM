
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>
<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
require_once 'bpm_individual_biz_nav_tabs.php';


date_default_timezone_set("America/Boise");  




$db = DB::getInstance();
$company_id = $_POST['id'];
$userID = $user->data()->id;

//This Query Needs to be fixed if an entry is going to be deleted accurately
$db->delete('business_scorecard',array('id','=',$company_id));

?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>The business scorecard entry has now been deleted</h1>

                <div class="col-md-6"> 
                    <!-- a href='business_scorecard_update.php?id=".$r->id."'  --> 
                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

                </div> 
            </div>
        </div>
    </div>
</div>

