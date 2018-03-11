<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
<?php if (!securePage($_SERVER['PHP_SELF'])){die();} ?>


date_default_timezone_set("America/Boise");  

$db = DB::getInstance();

$id = $_POST['id'];
$userID = $user->data()->id;
$company_name= $_POST['company_name'];
$date_time= date('y/m/d h:i:sa');
$experience_weight= $_POST['experience_weight'];
$experience_grade= $_POST['experience_grade'];
$economic_weight= $_POST['economic_weight'];
$economic_grade= $_POST['economic_grade'];
$working_capital_grade= $_POST['capital_weight'];
$working_capital_weight= $_POST['capital_grade'];
$employees_weight= $_POST['employees_weight'];
$employees_grade= $_POST['employees_grade'];
$relations_weight= $_POST['relationships_weight'];
$relations_grade= $_POST['relationships_grade'];
$capital_assets_weight= $_POST['assets_weight'];
$capital_assets_grade= $_POST['assets_grade'];
$marketing_weight= $_POST['marketing_weight'];
$marketing_grade= $_POST['marketing_grade'];
$managing_debt_weight= $_POST['debt_weight'];
$managing_debt_grade= $_POST['debt_grade'];
$managing_rec_pay_weight= $_POST['rec_pay_weight'];
$managing_rec_pay_grade= $_POST['rec_pay_grade'];
$cash_controls_weight= $_POST['cash_weight'];
$cash_controls_grade= $_POST['cash_grade'];

$fields=array(
'id'=>$id,
'company_name'=>$company_name,
'date_time'=>$date_time,
'experience_weight'=>$experience_weight,
'experience_grade'=>$experience_grade,
'economic_weight'=>$economic_weight,
'economic_grade'=>$economic_grade,
'working_capital_weight'=>$working_capital_weight,
'working_capital_grade'=>$working_capital_grade,
'employees_weight'=>$employees_weight,
'employees_grade'=>$employees_grade,
'relations_weight'=>$relations_weight,
'relations_grade'=>$relations_grade,
'capital_assets_weight'=>$capital_assets_weight,
'capital_assets_grade'=>$capital_assets_grade,
'marketing_weight'=>$marketing_weight,
'marketing_grade'=>$marketing_grade,
'managing_debt_weight'=>$managing_debt_weight,
'managing_debt_grade'=>$managing_debt_grade,
'managing_rec_pay_weight'=>$managing_rec_pay_weight,
'managing_rec_pay_grade'=>$managing_rec_pay_grade,
'cash_controls_weight'=>$cash_controls_weight,
'cash_controls_grade'=>$cash_controls_grade,
'users_id'=>$userID
);


$users = $db->query("SELECT * FROM business_scorecard WHERE users_id = $userID AND id = $id");
$db->update('business_scorecard',$id,$fields);



/****************8              
if ($db->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $db->error;
}  

**************/

$users = $db->query("SELECT * FROM business_scorecard WHERE users_id = $userID");
$results = $users->results();
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php
                echo "<div style='padding:30px 0 0 10px; margin: 5px;'><table border='1'>";
                echo "<tr><td>Name</td><td>Experience Weight</td><td>Experience Grade</td></tr>";
                foreach($results as $r) {
                    if ($r->users_id == $userID && $r->id == $id)   
                        echo "<tr><td><a href='business_scorecard_details.php?id=".$r->id."'>".$r->company_name."</a></td><td>".$r->date_time." ".$r->experience_grade."</td></tr>";
                }
                echo "</table></div>";

                ?>
            </div>
        </div>
    </div>
</div>


<?php
/*
                $users = $db->query("SELECT * FROM users");
                $first = $users->first();
                $email_user = $first->email;
                $password_user = $first->password;
                $id_user = $first->id;
                $fname = $first->fname;
                $lname = $first->lname;
                $fullname = $fname." ".$lname;
                dump($id_user);
                dump($password_user);
                dump($email_user);
                dump($first);
?>
                <p>My name is <?php echo $fullname ?></p>


    //$company_name = $users -> company_name;
    //echo "Company Name: " . $users . ".";


//dump($users);    
*/
?>
<!-- footers -->
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

<!-- Place any per-page javascript here -->

<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>