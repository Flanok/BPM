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