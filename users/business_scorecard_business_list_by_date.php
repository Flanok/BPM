<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
require_once 'bpm_individual_biz_nav_tabs.php';


$id=$_GET['id'];
?>

<?php

date_default_timezone_set("America/Boise");  

$db = DB::getInstance();

$userID = $user->data()->id;

//Query the data for the list of the businesses
$users = $db->query("SELECT * FROM business_scorecard WHERE business_id = $id");
$results = $users->results();

$stmt = $db->query("SELECT name FROM business WHERE id = $id");
$result = $stmt->results();
$company_name = $result[0]->name;
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1>Scorecard History for <?php echo $company_name?>:</h1>
                <div class="col-md-12 col-md-offset-1" style="display:flex">


                    <!--Print the table of the businesses and the dates -->
                    <div style='padding:30px 0 0 10px; margin: 5px;'><table border='1'>
                        <h4>Click to Overwrite:</h4>
                        <tr>
                            <td style='margin:5px; padding:0 15px'>Date Inserted</td></tr>

                        <?php    
    //Loop through the business name and the date it was inserted into the database
    foreach($results as $r) {
        $date = new DateTime($r->date_time);

        echo "<tr><td style='margin:10px; padding:0 15px'><a href='business_scorecard_update.php?id=".$id."'>".$date->format('F d, Y')."</a>  at  ".$date->format('h:i a')."</td></tr>";
    }
                        ?>    
                        </table>
                        </br> </br>
            </div>


            <?php
            //loop through the returned data
            $total_array = array();
            $dates_array = array();
            $i = 0;
            foreach ($results as $row) {
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
