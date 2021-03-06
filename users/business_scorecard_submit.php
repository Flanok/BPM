
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

$userID = $user->data()->id;
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

$fields=array(
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
$db->insert('business_scorecard',$fields);

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>This is the main content section</h1>




                <!-- Graph for the users input -->
                <div class="col-md-5" style="border: 1px solid black; ">
                    <canvas id="allCategories"></canvas>
                </div> 
                <div class="col-md-5 col-md-offset-2" style="border: 1px solid black; ">
                    <canvas id="totalScore"></canvas>
                </div> 

                <div class="col-md-6"> 

                    <!-- a href='business_scorecard_update.php?id=".$r->id."'  --> 
                    <form action="business_scorecard_submit_update.php" id="business_scorecard_submit_update" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th></th>    
                                    <th>Company Name</th>
                                    <th colspan="3"><input type="text" id="company_name" name="company_name" size="40" value="<?php echo $company_name ?>" > </th>
                                    <th colspan="2" id="company_name_required" style="color:red">Required Entry</th>
                                </tr>
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

                                        <select id="experience_weight" name="experience_weight" onclick="manageAreas('experience'); total1()">
                                            <option value="0.00" <?php if ($experience_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($experience_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($experience_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($experience_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($experience_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($experience_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($experience_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($experience_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($experience_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="experience_weight" name="experience_weight" onclick="changeValue('')" onkeyup="manageAreas('experience'); total1()"  size="5">  
-->
                                    </td>
                                    <script>
                                        function loadValues() {
                                            document.getElementById("experience_weight").click();
                                        }
                                    </script>
                                    <td>
                                        <select id="experience_grade" name="experience_grade" onclick="manageAreas('experience'); total1()">
                                            <option value="0" <?php if ($experience_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($experience_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($experience_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($experience_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($experience_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($experience_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($experience_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($experience_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($experience_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($experience_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($experience_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="experience_grade" name="experience_grade" onkeyup="manageAreas('experience'); total1()" size="5">  
-->
                                    </td>

                                    <td><p id="experience_score"></p></td>
                                    <td><p id="experience_score_potential"></p></td>
                                    <td><p id="experience_below_potential"></p></td>
                                </tr>

                                <!--  Line 2  -->
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Economic Model</td>
                                    <td>
                                        <select id="economic_weight" name="economic_weight" onclick="manageAreas('economic'); total1()">
                                            <option value="0.00" <?php if ($economic_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($economic_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($economic_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($economic_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($economic_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($economic_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($economic_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($economic_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($economic_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="economic_weight" name="economic_weight" onkeyup="manageAreas('economic'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="economic_grade" name="economic_grade" onclick="manageAreas('economic'); total1()">
                                            <option value="0" <?php if ($economic_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($economic_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($economic_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($economic_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($economic_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($economic_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($economic_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($economic_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($economic_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($economic_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($economic_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="economic_grade" name="economic_grade" onkeyup="manageAreas('economic'); total1()" size="5">  
-->
                                    </td>
                                    <td><p id="economic_score"></p></td>
                                    <td><p id="economic_score_potential"></p></td>
                                    <td><p id="economic_below_potential"></p></td>
                                </tr>

                                <!--  Line 3  -->    
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Working Capital</td>
                                    <td>
                                        <select id="capital_weight" name="capital_weight" onclick="manageAreas('capital'); total1()">
                                            <option value="0.00" <?php if ($capital_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($capital_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($capital_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($capital_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($capital_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($capital_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($capital_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($capital_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($capital_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="capital_weight" name="capital_weight" onkeyup="manageAreas('capital'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="capital_grade" name="capital_grade" onclick="manageAreas('capital'); total1()">
                                            <option value="0" <?php if ($capital_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($capital_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($capital_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($capital_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($capital_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($capital_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($capital_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($capital_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($capital_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($capital_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($capital_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="capital_grade" name="capital_grade" onkeyup="manageAreas('capital'); total1()" size="5"> 
-->
                                    </td>
                                    <td><p id="capital_score"></p></td>
                                    <td><p id="capital_score_potential"></p></td>
                                    <td><p id="capital_below_potential"></p></td>
                                </tr>

                                <!--  Line 4  -->
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Employees</td>
                                    <td>
                                        <select id="employees_weight" name="employees_weight" onclick="manageAreas('employees'); total1()">
                                            <option value="0.00" <?php if ($employees_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($employees_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($employees_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($employees_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($employees_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($employees_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($employees_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($employees_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($employees_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="employees_weight" name="employees_weight" onkeyup="manageAreas('employees'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="employees_grade" name="employees_grade" onclick="manageAreas('employees'); total1()">
                                            <option value="0" <?php if ($employees_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($employees_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($employees_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($employees_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($employees_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($employees_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($employees_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($employees_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($employees_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($employees_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($employees_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="employees_grade" name="employees_grade" onkeyup="manageAreas('employees'); total1()" size="5">  
-->
                                    </td>
                                    <td><p id="employees_score"></p></td>
                                    <td><p id="employees_score_potential"></p></td>
                                    <td><p id="employees_below_potential"></p></td>
                                </tr>

                                <!--  Line 5  -->
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Business Relationships</td>
                                    <td>
                                        <select id="relationships_weight" name="relationships_weight" onclick="manageAreas('relationships'); total1()">
                                            <option value="0.00" <?php if ($relations_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($relations_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($relations_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($relations_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($relations_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($relations_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($relations_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($relations_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($relations_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="relationships_weight" name="relationships_weight" onkeyup="manageAreas('relationships'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="relationships_grade" name="relationships_grade" onclick="manageAreas('relationships'); total1()">
                                            <option value="0" <?php if ($relations_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($relations_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($relations_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($relations_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($relations_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($relations_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($relations_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($relations_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($relations_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($relations_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($relations_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="relationships_grade" name="relationships_grade" onkeyup="manageAreas('relationships'); total1()" size="5">  
-->
                                    </td>
                                    <td><p id="relationships_score"></p></td>
                                    <td><p id="relationships_score_potential"></p></td>
                                    <td><p id="relationships_below_potential"></p></td>
                                </tr>

                                <!--  Line 6  -->
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Capital Assets</td>
                                    <td>
                                        <select id="assets_weight" name="assets_weight" onclick="manageAreas('assets'); total1()">
                                            <option value="0.00" <?php if ($assets_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($assets_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($assets_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($assets_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($assets_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($assets_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($assets_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($assets_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($assets_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="assets_weight" name="assets_weight" onkeyup="manageAreas('assets'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="assets_grade" name="assets_grade" onclick="manageAreas('assets'); total1()">
                                            <option value="0" <?php if ($assets_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($assets_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($assets_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($assets_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($assets_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($assets_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($assets_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($assets_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($assets_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($assets_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($assets_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="assets_grade" name="assets_grade" onkeyup="manageAreas('assets'); total1()" size="5">  
-->
                                    </td>
                                    <td><p id="assets_score"></p></td>
                                    <td><p id="assets_score_potential"></p></td>
                                    <td><p id="assets_below_potential"></p></td>
                                </tr>

                                <!--  Line 7  -->
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Marketing</td>
                                    <td>
                                        <select id="marketing_weight" name="marketing_weight" onclick="manageAreas('marketing'); total1()">
                                            <option value="0.00" <?php if ($marketing_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($marketing_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($marketing_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($marketing_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($marketing_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($marketing_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($marketing_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($marketing_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($marketing_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="marketing_weight" name="marketing_weight" onkeyup="manageAreas('marketing'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="marketing_grade" name="marketing_grade" onclick="manageAreas('marketing'); total1()">
                                            <option value="0" <?php if ($marketing_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($marketing_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($marketing_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($marketing_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($marketing_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($marketing_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($marketing_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($marketing_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($marketing_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($marketing_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($marketing_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="marketing_grade" name="marketing_grade" onkeyup="manageAreas('marketing'); total1()" size="5">  
-->
                                    </td>
                                    <td><p id="marketing_score"></p></td>
                                    <td><p id="marketing_score_potential"></p></td>
                                    <td><p id="marketing_below_potential"></p></td>
                                </tr>

                                <!--  Line 8  -->
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Managing Debt</td>
                                    <td>
                                        <select id="debt_weight" name="debt_weight" onclick="manageAreas('debt'); total1()">
                                            <option value="0.00" <?php if ($debt_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($debt_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($debt_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($debt_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($debt_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($debt_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($debt_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($debt_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($debt_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="debt_weight" name="debt_weight" onkeyup="manageAreas('debt'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="debt_grade" name="debt_grade" onclick="manageAreas('debt'); total1()">
                                            <option value="0" <?php if ($debt_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($debt_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($debt_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($debt_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($debt_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($debt_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($debt_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($debt_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($debt_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($debt_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($debt_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input  type="text" id="debt_grade" name="debt_grade" onkeyup="manageAreas('debt'); total1()" size="5">  
-->
                                    </td>
                                    <td><p id="debt_score"></p></td>
                                    <td><p id="debt_score_potential"></p></td>
                                    <td><p id="debt_below_potential"></p></td>
                                </tr>

                                <!--  Line 9  -->
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Managing Receivables and Payables</td>
                                    <td>
                                        <select id="rec_pay_weight" name="rec_pay_weight" onclick="manageAreas('rec_pay'); total1()">
                                            <option value="0.00" <?php if ($rec_pay_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($rec_pay_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($rec_pay_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($rec_pay_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($rec_pay_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($rec_pay_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($rec_pay_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($rec_pay_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($rec_pay_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="rec_pay_weight" name="rec_pay_weight" onkeyup="manageAreas('rec_pay'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="rec_pay_grade" name="rec_pay_grade" onclick="manageAreas('rec_pay'); total1()">
                                            <option value="0" <?php if ($rec_pay_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($rec_pay_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($rec_pay_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($rec_pay_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($rec_pay_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($rec_pay_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($rec_pay_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($rec_pay_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($rec_pay_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($rec_pay_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($rec_pay_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="rec_pay_grade" name="rec_pay_grade" onkeyup="manageAreas('rec_pay'); total1()" size="5">  
-->
                                    </td>
                                    <td><p id="rec_pay_score"></p></td>
                                    <td><p id="rec_pay_score_potential"></p></td>
                                    <td><p id="rec_pay_below_potential"></p></td>
                                </tr>

                                <!--  Line 10  -->    
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Cash Controls</td>
                                    <td>
                                        <select id="cash_weight" name="cash_weight" onclick="manageAreas('cash'); total1()">
                                            <option value="0.00" <?php if ($cash_weight == 0.00){echo'selected';} ?> >0.00</option>
                                            <option value="0.25" <?php if ($cash_weight == 0.25){echo'selected';} ?> >0.25</option>
                                            <option value="0.50" <?php if ($cash_weight == 0.50){echo'selected';} ?> >0.50</option>
                                            <option value="0.75" <?php if ($cash_weight == 0.75){echo'selected';} ?> >0.75</option>
                                            <option value="1.00" <?php if ($cash_weight == 1.00){echo'selected';} ?> >1.00</option>
                                            <option value="1.25" <?php if ($cash_weight == 1.25){echo'selected';} ?> >1.25</option>
                                            <option value="1.50" <?php if ($cash_weight == 1.50){echo'selected';} ?> >1.50</option>
                                            <option value="1.75" <?php if ($cash_weight == 1.75){echo'selected';} ?> >1.75</option>
                                            <option value="2.00" <?php if ($cash_weight == 2.00){echo'selected';} ?> >2.00</option>
                                        </select>
                                        <!--
<input type="text" id="cash_weight" name="cash_weight" onkeyup="manageAreas('cash'); total1()" size="5"> 
-->
                                    </td>
                                    <td>
                                        <select id="cash_grade" name="cash_grade" onclick="manageAreas('cash'); total1()">
                                            <option value="0" <?php if ($cash_grade == 0){echo'selected';} ?> >0</option>
                                            <option value="1" <?php if ($cash_grade == 1){echo'selected';} ?> >1</option>
                                            <option value="2" <?php if ($cash_grade == 2){echo'selected';} ?> >2</option>
                                            <option value="3" <?php if ($cash_grade == 3){echo'selected';} ?> >3</option>
                                            <option value="4" <?php if ($cash_grade == 4){echo'selected';} ?> >4</option>
                                            <option value="5" <?php if ($cash_grade == 5){echo'selected';} ?> >5</option>
                                            <option value="6" <?php if ($cash_grade == 6){echo'selected';} ?> >6</option>
                                            <option value="7" <?php if ($cash_grade == 7){echo'selected';} ?> >7</option>
                                            <option value="8" <?php if ($cash_grade == 8){echo'selected';} ?> >8</option>
                                            <option value="9" <?php if ($cash_grade == 9){echo'selected';} ?> >9</option>
                                            <option value="10" <?php if ($cash_grade == 10){echo'selected';} ?> >10</option>
                                        </select>
                                        <!--
<input type="text" id="cash_grade" name="cash_grade" onkeyup="manageAreas('cash'); total1()" size="5">  
-->
                                    </td>
                                    <td style="border-bottom: 1px solid #000"><p id="cash_score"></p></td>
                                    <td style="border-bottom: 1px solid #000"><p id="cash_score_potential"></p></td>
                                    <td style="border-bottom: 1px solid #000"><p id="cash_below_potential"></p></td>
                                </tr>

                                <!--  Line 11  -->    

                                <tr>
                                    <th scope="row">11</th>
                                    <td>Total <p id="total_directions" style="float: right; font-size:12px">(The weight total should always equal 10)</p></td>
                                    <td style="border-bottom: 3px double #000"><p id="total_weight"></p></td>
                                    <td><p></p></td>
                                    <td style="border-bottom: 3px double #000"><p id="total_score"></p></td>
                                    <td style="border-bottom: 3px double #000"><p id="total_score_potential"></p></td>
                                    <td style="border-bottom: 3px double #000"><p id="total_below_potential"></p></td>
                                </tr>

                            </tbody>
                        </table>
                        <input type="submit" value="Submit" onClick="checkForm()">
                    </form>
                </div> 


                <script>
                    function getCurrentDate(){
                        var m = new Date();
                        var d = new Date();
                        var y = new Date();
                        var month = m.getMonth() + 1;
                        var day = d.getDate();
                        var year = y.getFullYear();
                        document.getElementById("date").innerHTML = month + "/" + day + "/" + year;
                    }
                    getCurrentDate();

                    /***********************************************************************************************
*
* For some reason the calculations on the page are not occurring and the checkForm function does 
* not work. This used to work before adding this function into the page. Search this out.
*
*
************************************************************************************************/


                </script>                

                <script>   

                    function manageAreas(userInput) {
                        var topic_name = userInput;
                        var x = document.getElementById(topic_name + "_weight").value;
                        var y = document.getElementById(topic_name + "_grade").value;
                        document.getElementById(topic_name + "_score").innerHTML = (x*y).toFixed(2);
                        document.getElementById(topic_name + "_score_potential").innerHTML = (x*10).toFixed(2);
                        document.getElementById(topic_name + "_below_potential").innerHTML = ((x*10)-(x*y)).toFixed(2);


                        /**************************************************
    THIS CODE IS FOR USER INPUT RATHER THAN DROP DOWN ITEMS
    if (x == "."){
        x = "0.";
    }
    if (x < 0 || x > 2 || isNaN(x)){
        alert("Value must be between 0-10.")
        document.getElementById(topic_name + "_weight").value = "";
    }
    else{
        document.getElementById(topic_name + "_weight").value = x;
        var y = document.getElementById(topic_name + "_grade").value;
        if (y < 0 || y > 10 || isNaN(y) || y % 1 !== 0){
        alert("Value must have no decimal places and be between 0-10.")
        document.getElementById(topic_name + "_grade").value = "";
        }
        else{
            document.getElementById(topic_name + "_score").innerHTML = (x*y).toFixed(2);
            document.getElementById(topic_name + "_score_potential").innerHTML = (x*10).toFixed(2);
            document.getElementById(topic_name + "_below_potential").innerHTML = ((x*10)-(x*y)).toFixed(2);
        }
    }
    ****************************************************/
                        graphMe(topic_name);
                    }

                    function checkForm(){

                        var weight_1 = parseFloat(document.getElementById("experience_weight").value) || 0;
                        var weight_2 = parseFloat(document.getElementById("economic_weight").value) || 0;
                        var weight_3 = parseFloat(document.getElementById("capital_weight").value) || 0;
                        var weight_4 = parseFloat(document.getElementById("employees_weight").value) || 0;
                        var weight_5 = parseFloat(document.getElementById("relationships_weight").value) || 0;
                        var weight_6 = parseFloat(document.getElementById("assets_weight").value) || 0;
                        var weight_7 = parseFloat(document.getElementById("marketing_weight").value) || 0;
                        var weight_8 = parseFloat(document.getElementById("debt_weight").value) || 0;
                        var weight_9 = parseFloat(document.getElementById("rec_pay_weight").value) || 0;
                        var weight_10 = parseFloat(document.getElementById("cash_weight").value) || 0;

                        var total_wt = weight_1 + weight_2 + weight_3 + weight_4 + weight_5 + weight_6 + weight_7 + weight_8 + weight_9 + weight_10;
                        if (total_wt == 10)
                        {
                            document.forms['business_scorecard_submit_update'].submit();
                        }else{
                            alert('Total must equal 10 to submit.');
                        }

                    }


                    function total1() {

                        var weight_1 = parseFloat(document.getElementById("experience_weight").value) || 0;
                        var weight_2 = parseFloat(document.getElementById("economic_weight").value) || 0;
                        var weight_3 = parseFloat(document.getElementById("capital_weight").value) || 0;
                        var weight_4 = parseFloat(document.getElementById("employees_weight").value) || 0;
                        var weight_5 = parseFloat(document.getElementById("relationships_weight").value) || 0;
                        var weight_6 = parseFloat(document.getElementById("assets_weight").value) || 0;
                        var weight_7 = parseFloat(document.getElementById("marketing_weight").value) || 0;
                        var weight_8 = parseFloat(document.getElementById("debt_weight").value) || 0;
                        var weight_9 = parseFloat(document.getElementById("rec_pay_weight").value) || 0;
                        var weight_10 = parseFloat(document.getElementById("cash_weight").value) || 0;

                        var total_wt = weight_1 + weight_2 + weight_3 + weight_4 + weight_5 + weight_6 + weight_7 + weight_8 + weight_9 + weight_10;

                        if (total_wt == 0){
                            document.getElementById("total_weight").innerHTML = 0;
                            document.getElementById("total_weight").style.color = "black";
                            document.getElementById("total_directions").style.color = "black";
                        } 
                        else if ( total_wt != 10){
                            document.getElementById("total_weight").innerHTML = total_wt.toFixed(2);
                            document.getElementById("total_weight").style.color = "red";
                            document.getElementById("total_directions").style.color = "red";
                        }
                        else {
                            document.getElementById("total_weight").innerHTML = total_wt.toFixed(2);
                            document.getElementById("total_weight").style.color = "black";
                            document.getElementById("total_directions").style.color = "black";
                        }
                        /*
    document.getElementById("total_score").innerHTML = total_score.toFixed(2);
    document.getElementById("total_score_potential").innerHTML = (x*10).toFixed(2);
    document.getElementById("total_below_potential").innerHTML = ((x*10)-(x*y)).toFixed(2);
  */
                        total_score();
                    }





                    function total_score() {


                        var weight_1 = parseFloat(document.getElementById("experience_weight").value) || 0;
                        var weight_2 = parseFloat(document.getElementById("economic_weight").value) || 0;
                        var weight_3 = parseFloat(document.getElementById("capital_weight").value) || 0;
                        var weight_4 = parseFloat(document.getElementById("employees_weight").value) || 0;
                        var weight_5 = parseFloat(document.getElementById("relationships_weight").value) || 0;
                        var weight_6 = parseFloat(document.getElementById("assets_weight").value) || 0;
                        var weight_7 = parseFloat(document.getElementById("marketing_weight").value) || 0;
                        var weight_8 = parseFloat(document.getElementById("debt_weight").value) || 0;
                        var weight_9 = parseFloat(document.getElementById("rec_pay_weight").value) || 0;
                        var weight_10 = parseFloat(document.getElementById("cash_weight").value) || 0;

                        var grade_1 = parseFloat(document.getElementById("experience_grade").value) || 0;
                        var grade_2 = parseFloat(document.getElementById("economic_grade").value) || 0;
                        var grade_3 = parseFloat(document.getElementById("capital_grade").value) || 0;
                        var grade_4 = parseFloat(document.getElementById("employees_grade").value) || 0;
                        var grade_5 = parseFloat(document.getElementById("relationships_grade").value) || 0;
                        var grade_6 = parseFloat(document.getElementById("assets_grade").value) || 0;
                        var grade_7 = parseFloat(document.getElementById("marketing_grade").value) || 0;
                        var grade_8 = parseFloat(document.getElementById("debt_grade").value) || 0;
                        var grade_9 = parseFloat(document.getElementById("rec_pay_grade").value) || 0;
                        var grade_10 = parseFloat(document.getElementById("cash_grade").value) || 0;



                        var total_score = (weight_1 * grade_1) + (weight_2 * grade_2) + (weight_3 * grade_3) + (weight_4 * grade_4) + (weight_5 * grade_5) + (weight_6 * grade_6) + (weight_7 * grade_7) + (weight_8 * grade_8) + (weight_9 * grade_9) + (weight_10 * grade_10);

                        var total_score_potential = (weight_1 + weight_2 + weight_3 + weight_4 + weight_5 + weight_6 + weight_7 + weight_8 + weight_9 + weight_10)*10;

                        var total_below_potential = total_score_potential - total_score;

                        document.getElementById("total_score").innerHTML = total_score.toFixed(2);
                        document.getElementById("total_score_potential").innerHTML = total_score_potential.toFixed(2);
                        document.getElementById("total_below_potential").innerHTML = total_below_potential.toFixed(2);
                    }    


                    function manageAreasOnLoad() {
                        var sectionTitles = ["experience", "economic", "capital", "employees", "relationships", "assets", "marketing", "debt", "rec_pay", "cash"];
                        for (i = 0; i < sectionTitles.length; i++) {
                            var topic_name = sectionTitles[i];
                            var x = document.getElementById(topic_name + "_weight").value;
                            var y = document.getElementById(topic_name + "_grade").value;
                            document.getElementById(topic_name + "_score").innerHTML = (x*y).toFixed(2);
                            document.getElementById(topic_name + "_score_potential").innerHTML = (x*10).toFixed(2);
                            document.getElementById(topic_name + "_below_potential").innerHTML = ((x*10)-(x*y)).toFixed(2);
                        }}

                    total1();    
                    total_score();
                    manageAreasOnLoad();
                </script>                

                <script>
                    /************************************************************************
function weight(num1){
        x = document.getElementById(num1).value;
        if (x < 0 || x > 10){
            alert("Value must be between 0-10.");
            document.getElementById(num1).value = "";
        }
    return x;
}    

function grade(num2){ 
    y = document.getElementById(num2).value;
        if (y < 0 || y > 10){
            alert("Value must be between 0-10.");
            document.getElementById(num2).value = "";
        }
    return y;
}    
function experience(){
    function weight(num1);
    function grade(num2);
    document.getElementById("experience_score").innerHTML = x*y;
    document.getElementById("experience_score_potential").innerHTML = x*10;
    document.getElementById("experience_below_potential").innerHTML = (x*10)-(x*y);
    }
***************************************************************************/          </script> 


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


                    function add_data(){
                        allCategories.data.datasets.data;
                        totalScore.data.datasets.data
                    }   

                    // Calls for the graphMe() function to graph all the inputted data from the database 
                    graphMe();    


                    //get input values
                    function graphMe(topic_name){

                        var experience_weight = document.getElementById("experience_weight").value;
                        var economic_weight = document.getElementById("economic_weight").value;
                        var capital_weight = document.getElementById("capital_weight").value;
                        var employees_weight = document.getElementById("employees_weight").value;
                        var relationships_weight = document.getElementById("relationships_weight").value;
                        var assets_weight = document.getElementById("assets_weight").value;
                        var marketing_weight = document.getElementById("marketing_weight").value;
                        var debt_weight = document.getElementById("debt_weight").value;    
                        var rec_pay_weight = document.getElementById("rec_pay_weight").value;
                        var cash_weight = document.getElementById("cash_weight").value; 

                        var experience_grade = document.getElementById("experience_grade").value;
                        var economic_grade = document.getElementById("economic_grade").value;
                        var capital_grade = document.getElementById("capital_grade").value;
                        var employees_grade = document.getElementById("employees_grade").value;
                        var relationships_grade = document.getElementById("relationships_grade").value;
                        var assets_grade = document.getElementById("assets_grade").value;
                        var marketing_grade = document.getElementById("marketing_grade").value;
                        var debt_grade = document.getElementById("debt_grade").value;    
                        var rec_pay_grade = document.getElementById("rec_pay_grade").value;
                        var cash_grade = document.getElementById("cash_grade").value; 

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

                <?php 
                /****************8              
    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }  


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
    if ($r->users_id == $userID)   
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