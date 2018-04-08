
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>
<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';

//if (!securePage($_SERVER['PHP_SELF'])){die();}

//PHP Goes Here!

if($user->isLoggedIn()) { $thisUserID = $user->data()->id;} else { $thisUserID = 0; }

$userQ = $db->query("SELECT * FROM users LEFT JOIN profiles ON users.id = user_id ");
// group active, inactive, on naughty step
$users = $userQ->results();

$id=$_GET['id'];

$stmt = $db->query("SELECT name FROM business WHERE id = $id");
$result = $stmt->results();
$company_name = $result[0]->name;

date_default_timezone_set("America/Boise");  




$db = DB::getInstance();

$userID = $user->data()->id;
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


$fields=array(
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
	'business_id'=>$id
);
$db->insert('business_scorecard',$fields);

//$userID = $user->data()->id;





?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Your <?php echo $company_name?> Scorecard Was Entered</h1>




                <!-- Graph for the users input -->
                <div class="col-md-5" style="border: 1px solid black; ">
                    <canvas id="allCategories"></canvas>
                </div> 
                <div class="col-md-5 col-md-offset-2" style="border: 1px solid black; ">
                    <canvas id="totalScore"></canvas>
                </div> 

                <div class="col-md-6"> 

                    <table class="table table-striped">
                        <thead class="thead-inverse">
                            <tr></tr>
                            <tr>
                                <th></th>    
                                <th>Date</th>
                                <th><p>
                                    <?php 
    echo $date_time;
                                    //date_default_timezone_set("America/Boise");
                                    //echo date('Y/M/d') . " at " . date('h:i:sa') . " MST";
                                    //echo date('Y/M/d') . " at " . date('h:i:sa') . " MST";
                                    ?>
                                    </p></th>
                            </tr>      
                            <tr>
                                <th></th>    
                                <th>Key Areas of Management</th>
                                <th>Weight</th>
                                <th>Grade</th>
                                <th>Score</th>
                                <th>Score Potential</th>
                                <th>Below Potential</th>
                            </tr>
                        </thead>


                        <!--  Insert data to be used in the javascript below.  -->                    

                        <tbody>

                            <!--  Line 1  -->
                            <tr>
                                <th>1</th>
                                <td>Business Experience</td>
                                <td>
                                    <p id="experience_weight" name="experience_weight"><?php echo $experience_weight ?></p>
                                </td>

                                <td>
                                    <p id="experience_grade" name="experience_grade"><?php echo $experience_grade ?></p>
                                </td>

                                <td><p id="experience_score"><?php echo ($experience_weight * $experience_grade) ?></p></td>
                                <td><p id="experience_score_potential"><?php echo ($experience_weight * 10) ?></p></td>
                                <td><p id="experience_below_potential"><?php echo (($experience_weight * 10)-($experience_weight * $experience_grade)) ?></p></td>
                            </tr>

                            <!--  Line 2  -->
                            <tr>
                                <th scope="row">2</th>
                                <td>Economic Model</td>
                                <td>
                                    <p id="economic_weight" name="economic_weight"><?php echo $economic_weight ?></p>
                                </td>
                                <td>
                                    <p id="economic_grade" name="economic_grade"><?php echo $economic_grade ?></p>
                                </td>
                                <td><p id="economic_score"><?php echo ($economic_weight * $economic_grade) ?></p></td>
                                <td><p id="economic_score_potential"><?php echo ($economic_weight * 10) ?></p></td>
                                <td><p id="economic_below_potential"><?php echo (($economic_weight * 10)-($economic_weight * $economic_grade)) ?></p></td>
                            </tr>

                            <!--  Line 3  -->    
                            <tr>
                                <th scope="row">3</th>
                                <td>Working Capital</td>
                                <td>
                                    <p id="capital_weight" name="capital_weight"><?php echo $capital_weight ?></p>
                                </td>
                                <td>
                                    <p id="capital_grade" name="capital_grade"><?php echo $capital_grade ?></p>
                                </td>
                                <td><p id="capital_score"><?php echo ($capital_weight * $capital_grade) ?></p></td>
                                <td><p id="capital_score_potential"><?php echo ($capital_weight * 10) ?></p></td>
                                <td><p id="capital_below_potential"><?php echo (($capital_weight * 10)-($capital_weight * $capital_grade)) ?></p></td>
                            </tr>

                            <!--  Line 4  -->
                            <tr>
                                <th scope="row">4</th>
                                <td>Employees</td>
                                <td>
                                    <p id="employees_weight" name="employees_weight"><?php echo $employees_weight ?></p>
                                </td>
                                <td>
                                    <p id="employees_grade" name="employees_grade"><?php echo $employees_grade ?></p>
                                </td>
                                <td><p id="employees_score"><?php echo ($employees_weight * $employees_grade) ?></p></td>
                                <td><p id="employees_score_potential"><?php echo ($employees_weight * 10) ?></p></td>
                                <td><p id="employees_below_potential"><?php echo (($employees_weight * 10)-($employees_weight * $employees_grade)) ?></p></td>
                            </tr>

                            <!--  Line 5  -->
                            <tr>
                                <th scope="row">5</th>
                                <td>Business Relationships</td>
                                <td>
                                    <p id="relations_weight" name="relations_weight"><?php echo $relations_weight ?></p>
                                </td>
                                <td>
                                    <p id="relations_grade" name="relations_grade"><?php echo $relations_grade ?></p>
                                </td>
                                <td><p id="relations_score"><?php echo ($relations_weight * $relations_grade) ?></p></td>
                                <td><p id="relations_score_potential"><?php echo ($relations_weight * 10) ?></p></td>
                                <td><p id="relations_below_potential"><?php echo (($relations_weight * 10)-($relations_weight * $relations_grade)) ?></p></td>
                            </tr>

                            <!--  Line 6  -->
                            <tr>
                                <th scope="row">6</th>
                                <td>Capital Assets</td>
                                <td>
                                    <p id="assets_weight" name="assets_weight"><?php echo $assets_weight ?></p>
                                </td>
                                <td>
                                    <p id="assets_grade" name="assets_grade"><?php echo $assets_grade ?></p>
                                </td>
                                <td><p id="assets_score"><?php echo ($assets_weight * $assets_grade) ?></p></td>
                                <td><p id="assets_score_potential"><?php echo ($assets_weight * 10) ?></p></td>
                                <td><p id="assets_below_potential"><?php echo (($assets_weight * 10)-($assets_weight * $assets_grade)) ?></p></td>
                            </tr>

                            <!--  Line 7  -->
                            <tr>
                                <th scope="row">7</th>
                                <td>Marketing</td>
                                <td>
                                    <p id="marketing_weight" name="marketing_weight"><?php echo $marketing_weight ?></p>
                                </td>
                                <td>
                                    <p id="marketing_grade" name="marketing_grade"><?php echo $marketing_grade ?></p>
                                </td>
                                <td><p id="marketing_score"><?php echo ($marketing_weight * $marketing_grade) ?></p></td>
                                <td><p id="marketing_score_potential"><?php echo ($marketing_weight * 10) ?></p></td>
                                <td><p id="marketing_below_potential"><?php echo (($marketing_weight * 10)-($marketing_weight * $marketing_grade)) ?></p></td>
                            </tr>

                            <!--  Line 8  -->
                            <tr>
                                <th scope="row">8</th>
                                <td>Managing Debt</td>
                                <td>
                                    <p id="debt_weight" name="debt_weight"><?php echo $debt_weight ?></p>
                                </td>
                                <td>
                                    <p id="debt_grade" name="debt_grade"><?php echo $debt_grade ?></p>
                                </td>
                                <td><p id="debt_score"><?php echo ($debt_weight * $debt_grade) ?></p></td>
                                <td><p id="debt_score_potential"><?php echo ($debt_weight * 10) ?></p></td>
                                <td><p id="debt_below_potential"><?php echo (($debt_weight * 10)-($debt_weight * $debt_grade)) ?></p></td>
                            </tr>

                            <!--  Line 9  -->
                            <tr>
                                <th scope="row">9</th>
                                <td>Managing Receivables and Payables</td>
                                <td>
                                    <p id="rec_pay_weight" name="rec_pay_weight"><?php echo $rec_pay_weight ?></p>
                                </td>
                                <td>
                                    <p id="rec_pay_grade" name="rec_pay_grade"><?php echo $rec_pay_grade ?></p>
                                </td>
                                <td><p id="rec_pay_score"><?php echo ($rec_pay_weight * $rec_pay_grade) ?></p></td>
                                <td><p id="rec_pay_score_potential"><?php echo ($rec_pay_weight * 10) ?></p></td>
                                <td><p id="rec_pay_below_potential"><?php echo (($rec_pay_weight * 10)-($rec_pay_weight * $rec_pay_grade)) ?></p></td>
                            </tr>

                            <!--  Line 10  -->    
                            <tr>
                                <th scope="row">10</th>
                                <td>Cash Controls</td>
                                <td>
                                    <p id="cash_weight" name="cash_weight"><?php echo $cash_weight ?></p>
                                </td>
                                <td>
                                    <p id="cash_grade" name="cash_grade"><?php echo $cash_grade ?></p>
                                </td>
                                <td><p id="cash_score"><?php echo ($cash_weight * $cash_grade) ?></p></td>
                                <td><p id="cash_score_potential"><?php echo ($cash_weight * 10) ?></p></td>
                                <td><p id="cash_below_potential"><?php echo (($cash_weight * 10)-($cash_weight * $cash_grade)) ?></p></td>
                            </tr>

                            <!--  Line 11  -->    

                            <tr>
                                <th scope="row"></th>
                                <td><p>Total:</p></td>
                                <td style="border-bottom: 3px double #000"><p id="total_weight"><?php echo $total_weight ?></p></td>
                                <td><p></p></td>
                                <td style="border-bottom: 3px double #000"><p id="total_score"><?php echo $total_score ?></p></td>
                                <td style="border-bottom: 3px double #000"><p id="total_score_potential"><?php echo $total_score_potential ?></p></td>
                                <td style="border-bottom: 3px double #000"><p id="total_below_potential"><?php echo $total_below_potential ?></p></td>
                            </tr>

                        </tbody>
                    </table>
                    <!--  <input type="button" value="Edit" onClick="business_scorecard_update.php">
<a href='business_scorecard_update.php?id=".$r->id."'>".$r->company_name."</a> -->


                </div> 


                <script>
                    var ctx = document.getElementById("allCategories").getContext('2d');

                    var allCategories = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Business Experience", "Economic Model", "Working Capital", "Employees", "Business Relationships", "Capital Assets", "Marketing", "Managing Debt", "Managing Receivables & Payables", "Cash Control"],
                            datasets: [{
                                label: 'Score',
                                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                                backgroundColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)',
                                    'rgba(255,99,132,1)'
                                ],
                                borderWidth: 1
                            },
                                       {
                                           label: 'Potential Growth',
                                           data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                                           backgroundColor: [
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)'
                                           ],
                                           borderColor: [
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)',
                                               'rgba(54, 162, 235, 0.2)'
                                           ],

                                           borderWidth: 1
                                       }
                                      ]
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    display:true, 
                                    stacked: true,
                                    ticks:{
                                        autoSkip: false,
                                        maxRotation: 60,
                                        minRotation: 60
                                    }
                                }],
                                yAxes: [{
                                    stacked: true,
                                    ticks: {
                                        beginAtZero:true,
                                    }
                                }]

                            }
                        }
                    });

                    var ctx2 = document.getElementById("totalScore").getContext('2d');    
                    var totalScore = new Chart(ctx2, {
                        type: 'bar',
                        data: {
                            labels: ["Total Score"],
                            datasets: [{
                                label: 'Score',
                                data: [0],
                                backgroundColor: [
                                    'rgba(255,99,132,1)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)'
                                ],
                                borderWidth: 1
                            },
                                       {
                                           label: 'Potential Growth',
                                           data: [0],
                                           backgroundColor: [
                                               'rgba(54, 162, 235, 0.2)'
                                           ],
                                           borderColor: [
                                               'rgba(54, 162, 235, 0.2)'
                                           ],
                                           borderWidth: 1
                                       },
                                      ]
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    display:true, 
                                    stacked: true,
                                    barThickness : 70,
                                    ticks:{
                                        autoSkip: false,
                                        maxRotation: 0,
                                        minRotation: 0
                                    }
                                }],
                                yAxes: [{
                                    stacked: false,
                                    ticks: {
                                        beginAtZero:true,
                                    }
                                }]

                            }
                        }
                    });

                    //function to add dataset to the chart
                    function add_data(){
                        allCategories.data.datasets.data;
                        totalScore.data.datasets.data
                    }   

                    // Calls for the graphMe() function to graph all the inputted data from the database 
                    graphMe_php();    


                    //get input values
                    function graphMe_php(topic_name){

                        var experience_weight =     parseFloat("<?php echo $experience_weight ?>");
                        var economic_weight =       parseFloat("<?php echo $economic_weight   ?>");
                        var capital_weight =        parseFloat("<?php echo $capital_weight    ?>");
                        var employees_weight =      parseFloat("<?php echo $employees_weight  ?>");
                        var relationships_weight =  parseFloat("<?php echo $relations_weight  ?>");
                        var assets_weight =         parseFloat("<?php echo $assets_weight     ?>");
                        var marketing_weight =      parseFloat("<?php echo $marketing_weight  ?>");
                        var debt_weight =           parseFloat("<?php echo $debt_weight       ?>");    
                        var rec_pay_weight =        parseFloat("<?php echo $rec_pay_weight    ?>");
                        var cash_weight =           parseFloat("<?php echo $cash_weight       ?>"); 

                        var experience_grade =      parseFloat("<?php echo $experience_grade   ?>");
                        var economic_grade =        parseFloat("<?php echo $economic_grade     ?>");
                        var capital_grade =         parseFloat("<?php echo $capital_grade      ?>");
                        var employees_grade =       parseFloat("<?php echo $employees_grade    ?>");
                        var relationships_grade =   parseFloat("<?php echo $relations_grade    ?>");
                        var assets_grade =          parseFloat("<?php echo $assets_grade       ?>");
                        var marketing_grade =       parseFloat("<?php echo $marketing_grade    ?>");
                        var debt_grade =            parseFloat("<?php echo $debt_grade         ?>");    
                        var rec_pay_grade =         parseFloat("<?php echo $rec_pay_grade      ?>");
                        var cash_grade =            parseFloat("<?php echo $cash_grade         ?>"); 

                        var experience_score = experience_weight * experience_grade;
                        var economic_score = economic_weight * economic_grade;    
                        var capital_score = capital_weight * capital_grade;
                        var employees_score = employees_weight * employees_grade; 
                        var relationships_score = relationships_weight * relationships_grade;
                        var assets_score = assets_weight * assets_grade; 
                        var marketing_score = marketing_weight * marketing_grade;
                        var debt_score = debt_weight * debt_grade;
                        var rec_pay_score = rec_pay_weight * rec_pay_grade;
                        var cash_score = cash_weight * cash_grade; 

                        var experience_potential = (experience_weight * 10 - experience_score);
                        var economic_potential = (economic_weight * 10 - economic_score);    
                        var capital_potential = (capital_weight * 10 - capital_score);
                        var employees_potential = (employees_weight * 10 - employees_score); 
                        var relationships_potential = (relationships_weight * 10 - relationships_score);
                        var assets_potential = (assets_weight * 10 - assets_score); 
                        var marketing_potential = (marketing_weight * 10 - marketing_score);
                        var debt_potential = (debt_weight * 10 - debt_score);
                        var rec_pay_potential = (rec_pay_weight * 10 - rec_pay_score);
                        var cash_potential = (cash_weight * 10 - cash_score);  

                        var total_score = (experience_score + economic_score + capital_score + employees_score + relationships_score + assets_score + marketing_score + debt_score + rec_pay_score + cash_score);    

                        var score_potential = (experience_potential + economic_potential + capital_potential + employees_potential + relationships_potential + assets_potential + marketing_potential + debt_potential + rec_pay_potential + cash_potential + total_score);

                        allCategories.data.datasets[0].data[0] = experience_score;
                        allCategories.data.datasets[0].data[1] = economic_score;    
                        allCategories.data.datasets[0].data[2] = capital_score;
                        allCategories.data.datasets[0].data[3] = employees_score; 
                        allCategories.data.datasets[0].data[4] = relationships_score;
                        allCategories.data.datasets[0].data[5] = assets_score; 
                        allCategories.data.datasets[0].data[6] = marketing_score;
                        allCategories.data.datasets[0].data[7] = debt_score;
                        allCategories.data.datasets[0].data[8] = rec_pay_score;
                        allCategories.data.datasets[0].data[9] = cash_score; 

                        allCategories.data.datasets[1].data[0] = experience_potential;
                        allCategories.data.datasets[1].data[1] = economic_potential;    
                        allCategories.data.datasets[1].data[2] = capital_potential;
                        allCategories.data.datasets[1].data[3] = employees_potential; 
                        allCategories.data.datasets[1].data[4] = relationships_potential;
                        allCategories.data.datasets[1].data[5] = assets_potential; 
                        allCategories.data.datasets[1].data[6] = marketing_potential;
                        allCategories.data.datasets[1].data[7] = debt_potential;
                        allCategories.data.datasets[1].data[8] = rec_pay_potential;
                        allCategories.data.datasets[1].data[9] = cash_potential; 

                        totalScore.data.datasets[0].data[0] = total_score;
                        totalScore.data.datasets[1].data[0] = score_potential;


                        totalScore.update();  
                        allCategories.update();
                    }    

                </script>

                <!-- footers -->
                <?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>

                <!-- Place any per-page javascript here -->

                <?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?>