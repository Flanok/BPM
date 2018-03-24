<?php
require_once 'init.php';
require_once $abs_us_root.$us_url_root.'users/includes/header.php';
require_once $abs_us_root.$us_url_root.'users/includes/navigation.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" integrity="sha256-eetZG6Bzom5c8rWDuJiky3M1sJ3IGwNd/FIl/nmyMh0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js" integrity="sha256-VNbX9NjQNRW+Bk02G/RO6WiTKuhncWI4Ey7LkSbE+5s=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js" integrity="sha256-N2Q5nbMunuogdOHfjiuzPsBMhoB80TFONAfO7MLhac0=" crossorigin="anonymous"></script>

<html>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div style='padding:30px 0 0 10px; margin: 5px;'>
                    <body>
                        <table class="bpm_data_log_tables">
                            <tr>
                                <th class="bpm_data_log_tables">Date</th>
                                <th class="bpm_data_log_tables">Current Assets</th>
                                <th class="bpm_data_log_tables">Current Liabilities</th>
                                <th class="bpm_data_log_tables">Working Capital</th>
                                <th class="bpm_data_log_tables">Working Capital %</th>
                                <th class="bpm_data_log_tables">Use of Credit %</th>
                                <th class="bpm_data_log_tables">Current Ratio</th>
                                <th class="bpm_data_log_tables">Cash and Equivalents</th>
                                <th class="bpm_data_log_tables">Current Period Sales</th>
                                <th class="bpm_data_log_tables">Accounts Receivable</th>
                                <th class="bpm_data_log_tables">Accounts Payable</th>
                            </tr>
                            <!-- This will be a for each or something with data base.... -->
                        </table>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
</html>