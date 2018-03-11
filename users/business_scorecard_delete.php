
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>
<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';

date_default_timezone_set("America/Boise");  




$db = DB::getInstance();
$company_id = $_POST['id'];
$userID = $user->data()->id;
/*
        $company_name= $_POST['company_name'];
        $date_time= date('y/m/d h:i:sa');
        $experience_weight= $_POST['experience_weight'];
        $experience_grade= $_POST['experience_grade'];
        $economic_weight= $_POST['economic_weight'];
        $economic_grade= $_POST['economic_grade'];
        $capital_weight= $_POST['capital_weight'];
        $capital_grade= $_POST['capital_grade'];
        $employees_weight= $_POST['employees_weight'];
        $employees_grade= $_POST['employees_grade'];
        $relations_weight= $_POST['relationships_weight'];
        $relations_grade= $_POST['relationships_grade'];
        $assets_weight= $_POST['assets_weight'];
        $assets_grade= $_POST['assets_grade'];
        $marketing_weight= $_POST['marketing_weight'];
        $marketing_grade= $_POST['marketing_grade'];
        $debt_weight= $_POST['debt_weight'];
        $debt_grade= $_POST['debt_grade'];
        $rec_pay_weight= $_POST['rec_pay_weight'];
        $rec_pay_grade= $_POST['rec_pay_grade'];
        $cash_weight= $_POST['cash_weight'];
        $cash_grade= $_POST['cash_grade']; 


        $total_weight = $experience_weight + $economic_weight + $capital_weight + $employees_weight + $relations_weight + $assets_weight + $marketing_weight + $debt_weight + $rec_pay_weight + $cash_weight;

        $total_score =  ($experience_weight * $experience_grade ) + 
                        ($economic_weight   * $economic_grade   ) + 
                        ($capital_weight    * $capital_grade    ) +
                        ($employees_weight  * $employees_grade  ) +
                        ($relations_weight  * $relations_grade  ) +
                        ($assets_weight     * $assets_grade     ) +
                        ($marketing_weight  * $marketing_grade  ) +
                        ($debt_weight       * $debt_grade       ) +
                        ($rec_pay_weight    * $rec_pay_grade    ) +
                        ($cash_weight       * $cash_grade       );

        $total_score_potential = $total_weight * 10;

        $total_below_potential = $total_score_potential - $total_score;

        */
/*
    $fields=array(
        //'id'=>$company_id,
        'company_name'=>$company_name,
        'date_time'=>$date_time,
        'experience_weight'=>$experience_weight,
        'experience_grade'=>$experience_grade,
        'economic_weight'=>$economic_weight,
        'economic_grade'=>$economic_grade,
        'working_capital_weight'=>$capital_weight,
        'working_capital_grade'=>$capital_grade,
        'employees_weight'=>$employees_weight,
        'employees_grade'=>$employees_grade,
        'relations_weight'=>$relations_weight,
        'relations_grade'=>$relations_grade,
        'capital_assets_weight'=>$assets_weight,
        'capital_assets_grade'=>$assets_grade,
        'marketing_weight'=>$marketing_weight,
        'marketing_grade'=>$marketing_grade,
        'managing_debt_weight'=>$debt_weight,
        'managing_debt_grade'=>$debt_grade,
        'managing_rec_pay_weight'=>$rec_pay_weight,
        'managing_rec_pay_grade'=>$rec_pay_grade,
        'cash_controls_weight'=>$cash_weight,
        'cash_controls_grade'=>$cash_grade,
        'users_id'=>$userID
        );
    $db->update('business_scorecard',$company_id,$fields);
    */
$db->delete('business_scorecard',array('id','=',$company_id));
//    $query = $db->query("SELECT id FROM business_scorecard WHERE users_id = ? AND date_time = ?",[$userID,$date_time]);
//  $id_company = $query->first();
//    $company_id = $id_company->id;

//$userID = $user->data()->id;





?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>The business has now been deleted</h1>

                <div class="col-md-6"> 
                    <!-- a href='business_scorecard_update.php?id=".$r->id."'  --> 
                    <input type="hidden" name="id" id="id" value="<?php echo $id ?>">

                </div> 
            </div>
        </div>
    </div>
</div>


<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>