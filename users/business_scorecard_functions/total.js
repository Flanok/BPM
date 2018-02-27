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
    
    var total_score_potential = ((weight_1 + weight_2 + weight_3 + weight_4 + weight_5 + weight_6 + weight_7 + weight_8 + weight_9 + weight_10)*10);
    
    var total_below_potential = total_score_potential - total_score;
    
    document.getElementById("total_score").innerHTML = total_score.toFixed(2);
    document.getElementById("total_score_potential").innerHTML = total_score_potential.toFixed(2);
    document.getElementById("total_below_potential").innerHTML = total_below_potential.toFixed(2);
}