<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>
<!-- <php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>-->

<?php

//The following is what you add to any business sheet
//require_once 'bpm_individual_biz_nav_tabs.php';

require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
date_default_timezone_set("America/Boise");  

$id=$_GET['id'];
$userID = $user->data()->id;
$users = $db->query("SELECT * FROM liabilities WHERE business_id = $id ORDER BY date_time DESC");
$results = $users->results();

$stmt = $db->query("SELECT name FROM business WHERE id = $id");
$result = $stmt->results(); 
$company_name = $result[0]->name;
       

    echo "
    <div class='col-md-10 col-md-offset-1'> 
    <br/>
    <br/>
    <div style='display:flex'>
    <!--        Score Card-->
    <a class='btn btn-primary ' href='business_scorecard_business_list_by_date.php?id=$id' role='button'>Score Card History</a>
    <br/>

	<!--        Score Card-->
	<br/>
    <a class='btn btn-primary ' href='business_scorecard_insert.php?id=$id' role='button'>Insert Score Card</a>
    <br/>

    <!--        Data Log-->
    <br/>
    <a class='btn btn-primary ' href='bpm_data_log.php?id=$id' role='button'>Data Log</a>
    <br/>

    <!--        Assets Update-->
    <br/>
    <a class='btn btn-primary ' href='business_scorecard_current_assets.php?id=$id' role='button'>Insert Assets</a>
    <br/>

	<!--        Asset History-->
    <br/>
    <a class='btn btn-primary ' href='bpm_view_asset_history.php?id=$id' role='button'>Asset History</a>
    <br/>

    <!--        Liabilities Update-->
    <br/>
    <a class='btn btn-primary ' href='business_scorecard_current_liabilities.php?id=$id' role='button'>Insert Liabilities</a>
    <br/>

	<!--        Liabilities History-->
    <br/>
    <a class='btn btn-primary ' href='bpm_view_liability_history.php?id=$id' role='button'>Liability History</a>

	<!--        Summary-->
    <br/>
    <a class='btn btn-primary ' href='bpm_business_info.php?id=$id' role='button'>Summary</a>
    </div>
	";

/*
RANDOM STUFF ON PAGES SAVED FOR LATER IF IT ENDS UP BEING IMPORTANT
UserSpice 4
An Open Source PHP User Management System
by the UserSpice Team at http://UserSpice.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
