<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<?php

date_default_timezone_set("America/Boise");  

        $company_name=$_GET['id'];
        $db = DB::getInstance();
        
        $userID = $user->data()->id;
 /*       $company_name= $_POST['company_name'];
        $date_time= date('y/m/d h:i:sa');
        $experience_weight= $_POST['experience_weight'];
        $experience_grade= $_POST['experience_grade'];
        $economic_weight= $_POST['economic_weight'];
        $economic_grade= $_POST['economic_grade'];
        $working_capital_weight= $_POST['capital_weight'];
        $working_capital_grade= $_POST['capital_grade'];
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
    $db->insert('business_scorecard',$fields);
 */
    
   
  /****************8              
    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }  
    **************/

//Query the data for the list of the businesses
$users = $db->query("SELECT * FROM business_scorecard WHERE users_id = $userID");
$results = $users->results();
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">


<!--Print the table of the businesses and the dates -->
<div style='padding:30px 0 0 10px; margin: 5px;'><table border='1'>
<tr><td style='margin:5px; padding:0 15px'>Name</td><td style='margin:5px; padding:0 15px'>Date Inserted</td></tr>

<?php    
//Loop through the business name and the date it was inserted into the database
foreach($results as $r) {
    if ($r->company_name == $company_name){   
        echo "<tr><td style='margin:5px; padding:0 15px'><a href='business_scorecard_update.php?id=".$r->id."'>".$r->company_name."</a></td><td style='margin:5px; padding:0 15px;text-align: center'>";

        $date = new DateTime($r->date_time);
        echo $date->format('m-d-Y')." at ".$date->format('H:i:s')."</td></tr>";
    }
    }
?>    
</table></div>
                

<?php
//loop through the returned data
        $total_array = array();
        $dates_array = array();
        $i = 0;
foreach ($results as $row) {
    if ($row->company_name == $company_name){
        $total = ($row->experience_weight * $row->experience_grade);
        $total = $total + ($row->economic_weight * $row->economic_grade);
        $total = $total + ($row->working_capital_weight * $row->working_capital_grade);
        $total = $total + ($row->employees_weight * $row->employees_grade);
        $total = $total + ($row->relations_weight * $row->relations_grade);
        $total = $total + ($row->capital_assets_weight * $row->capital_assets_grade);
        $total = $total + ($row->marketing_weight * $row->marketing_grade);
        $total = $total + ($row->managing_debt_weight * $row->managing_debt_grade);
        $total = $total + ($row->managing_rec_pay_weight * $row->managing_rec_pay_grade);
        $total = $total + ($row->cash_controls_weight * $row->cash_controls_grade);
            //$num."_".$i = $total;
        $total_array[] = $total;
            //echo $total."<br/>";
            //echo ${"total_".$i} = $total;
            //echo $data[$i]."<br/>";
        $date = $row->date_time;
        $dates_array[] = $date;
        $i++; 
            }    
        }    
        $array_length = count($total_array);
                //$date->format('m-d-Y')
                //date_format($date, 'Y-m-d H:i:s')
                
                //$mytime = strtotime('2013-06-07 22:14:56');
                //$newDate = date('m/d/y - G:i', $mytime);
?>                

                




<script language="javascript" type="text/javascript">
    
/************************************************************
*************************************************************
*
* Source for tutorial about checkboxes to control 
* what dates are graphed.
*
* http://coursesweb.net/javascript/get-value-selected-checkboxes_cs
*
*************************************************************
*************************************************************/

var total_array = <?php echo json_encode($total_array); ?>;
var dates_array = <?php echo json_encode($dates_array); ?>;
var array_length = <?php echo $array_length; ?>;
//document.getElementById('length').innerHTML = array_length;
/********************************************************
This will print out all the data for the totals and the dates
for (var i=0; i<array_length; i++) {
  document.write("<table border='1'>");
  document.write("<tr><td>Number " + (i+1) + " is: " + "</td>");
  document.write("<td>" + total_array[i] + " on </td>");
  document.write("<td>" + " " + dates_array[i] + "</td></tr>");
  document.write("</table");
}
***********************************************************/
</script>
           
              

<div class="col-md-5 col-md-offset-2" style="border: 1px solid black; ">
    <canvas id="totalsChart"></canvas> 
</div>
    </div>
        </div>
    
        </div>
            </div>            
                

<script>
var ctx = document.getElementById("totalsChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: dates_array,
        datasets: [{
            label: 'Score Totals',
            lineTension: 0, 
            data: total_array,
            borderColor: [
                'rgba(255,99,132,1)'
            ],
            backgroundColor: [
                'rgba(255,99,132,1)'                
            ],
            fill: false,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks:{
                    autoSkip: false,
                    maxRotation: 60,
                    minRotation: 60
                    }
                  }],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
    
for (i = 0; i < array_length; i++) {
    if (totalsChart.data.datasets[0].data[i] > 100) {
        pointBackgroundColors.push("#90cd8a");
    } else {
        pointBackgroundColors.push("#f58368");
    }
}

totalsChart.update();

/*    
var experience_weight =     parseFloat("echo $total_0 ");    
    
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
   */ 
</script>    
