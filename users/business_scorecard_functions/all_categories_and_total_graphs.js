
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
                barThickness : 76,
                ticks:{
                    autoSkip: false,
                    maxRotation: 0,
                    minRotation: 0
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

// Calls for the graphMe() function to graph all the inputted data from the database 
graphMe();


    
    function add_data(){
        allCategories.data.datasets.data;
        totalScore.data.datasets.data
    }
    