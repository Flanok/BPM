<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<?php

date_default_timezone_set("America/Boise");  

$db = DB::getInstance();

$userID = $user->data()->id;

$id=$_GET['id'];

$users = $db->query("SELECT * FROM business_scorecard WHERE business_id = $id GROUP BY business_id");
$results = $users->results(); 
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1>Scorecard Shananigans</h1>
        <div class="row">

            <!--Display Current Businesses-->
            <div class="col-sm-12">
                <?php
                echo "<div style='padding:30px 0 0 10px; margin: 5px;'><table border='1'>";
                echo "<tr><td style='margin:5px; padding:15px'>Company Name</td><td style='margin:5px; padding:15px'>Number Inserted</td></tr>";
                foreach($results as $r) {
                    if ($r->users_id == $userID) 
                        //echo "<h3>$r->company_name</h3>";
                        echo "<a class='btn btn-primary ' href='bpm_add_business.php?id=$id' role='button'>$r->company_name</a>";

                    echo "<tr><td style='margin:5px; padding:0 15px'><a href='business_scorecard_business_list_by_date.php?id=".$id."'>".$r->company_name."</a></td><td style='margin:5px; padding:0 15px;text-align: center'>".$r->total." </td></tr>";
                    //                    echo "<tr><td><a href='business_scorecard_update.php?id=".$r->id."'>".$r->company_name."</a></td><td>".$r->date_time." </td></tr>";
                }
                echo "</table></div>";
                ?>
            </div>
        </div>
        <!--Insert New Business Option:-->
        <h4>Add New Business: </h4> 
        <p>
            <?php
            echo "<a class='btn btn-primary ' href='bpm_add_business.php?id=$userID' role='button'>Add New Business</a>";
            ?>
        </p>
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
