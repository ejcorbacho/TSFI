var deviceCategoriesChart;

$(document).ready(function() {
    var successfulCalls = 0;
    var numberOfCalls = 5;

    getDataOverAJAX( 'getNewUsersData' ).then(
        function( data ) {
            ++successfulCalls;
            drawNewUsersChart( rearrangeData( JSON.parse( data ) ) );
        }, function () {
            drawNewUsersChart([[],[]]);
        }
    );

    getDataOverAJAX( 'getDeviceCategoriesData', 'sessions' ).then(
        function( data ) {
            ++successfulCalls;
            drawDeviceCategoriesChart( JSON.parse( data ) );
        }, function () {
            drawDeviceCategoriesChart([]);
        }
    );

    getDataOverAJAX( 'getMobileOSData' ).then(
        function( data ) {
            ++successfulCalls;
            drawMobileOSChart( JSON.parse( data ) );
        }, function () {
            drawMobileOSChart([]);
        }
    );

    getDataOverAJAX( 'getGenderData' ).then(
        function( data ) {
            ++successfulCalls;
            drawGenderChart( JSON.parse( data ) );
        }, function () {
            drawGenderChart([]);
        }
    );

    getDataOverAJAX( 'getAgeBracketData' ).then(
        function( data ) {
            ++successfulCalls;
            drawAgeBracketChart( JSON.parse( data ) );
        }, function () {
            drawAgeBracketChart([]);
        }
    );

    setTimeout(function(){
        if (successfulCalls != numberOfCalls) {
            showErrorAlert("Hi ha hagut un error carregant dades des de Google Analytics. Provi de recarregar la pàgina.");
        }
    }, 10000);

    $("#deviceCategoriesSelector").change(function() {
        updateDeviceCategoriesChart();
    });
});

function drawNewUsersChart(data) {
    var monthArray = getLast6Months();
    var newUsersChartCanvas = $("#newUsersChart").get(0).getContext("2d");

    var newUsersChartData = {
        labels: monthArray,
        datasets: [
            {
                label: "Usuaris",
                /*
                 fillColor: "rgb(210, 214, 222)",
                 strokeColor: "rgb(210, 214, 222)",
                 pointColor: "rgb(210, 214, 222)",
                 pointStrokeColor: "#c1c7d1",
                 pointHighlightFill: "#fff",
                 pointHighlightStroke: "rgb(220,220,220)",
                 */
                backgroundColor: "rgb(210, 214, 222)",
                data: data[0]
            },
            {
                label: "Sessions",
                /*
                 fillColor: "rgba(60,141,188,0.9)",
                 strokeColor: "rgba(60,141,188,0.8)",
                 pointColor: "#3b8bba",
                 pointStrokeColor: "rgba(60,141,188,1)",
                 pointHighlightFill: "#fff",
                 pointHighlightStroke: "rgba(60,141,188,1)",
                 */
                backgroundColor: "rgba(60,141,188,0.9)",
                data: data[1]
            }
        ]
    };

    var newUsersChartOptions = {
        scaleOverride: true,
        //Boolean - If we should show the scale at all
        showScale: true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines: false,
        //String - Colour of the grid lines
        scaleGridLineColor: "rgba(0,0,0,.05)",
        //Number - Width of the grid lines
        scaleGridLineWidth: 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines: true,
        //Boolean - Whether the line is curved between points
        bezierCurve: true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension: 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot: false,
        //Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill: true,
        //String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio: true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive: true,
        beginAtZero: true
    };

    var newUsersChart = new Chart(newUsersChartCanvas, {
        type: 'line',
        data: newUsersChartData,
        options: newUsersChartOptions
    });
}

function drawDeviceCategoriesChart(data) {
    var deviceCategoriesChartCanvas = $("#deviceCategoriesChart").get(0).getContext("2d");

    var deviceCategoriesChartData = {
        labels: [
            "Ordinador",
            "Mòbil",
            "Tablet"
        ],
        datasets: [
            {
                label: "Dispositius",
                data: data,
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
            }
        ]
    };

    var deviceCategoriesChartOptions = {
        animation:{
            animateScale:true
        }
    };

    deviceCategoriesChart = new Chart(deviceCategoriesChartCanvas, {
        type: 'doughnut',
        data: deviceCategoriesChartData,
        options: deviceCategoriesChartOptions
    });
}

function drawMobileOSChart (data) {
    var mobileOSChartCanvas = $("#mobileOSChart").get(0).getContext("2d");

    var mobileOSChartData = {
        labels: [
            "Android",
            "iOS",
            "Altres"
        ],
        datasets: [
            {
                label: "SO mòbils",
                data: data,
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56"
                ]
            }
        ]
    };

    var mobileOSChartOptions = {
        animation:{
            animateScale:true
        }
    };

    mobileOSChart = new Chart(mobileOSChartCanvas, {
        type: 'doughnut',
        data: mobileOSChartData,
        options: mobileOSChartOptions
    });
}

function drawGenderChart (data) {
    var genderChartCanvas = $("#genderChart").get(0).getContext("2d");

    var genderChartData = {
        labels: [
            "Femení",
            "Masculí"
        ],
        datasets: [
            {
                label: "Gèneres",
                data: data,
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB"
                ]
            }
        ]
    };

    var genderChartOptions = {
        animation: {
            animateScale: true
        }
    };

    var genderChart = new Chart(genderChartCanvas, {
        type: 'doughnut',
        data: genderChartData,
        options: genderChartOptions
    });
}

function drawAgeBracketChart (data) {
    var ageBracketChartCanvas = $("#ageBracketChart").get(0).getContext("2d");

    var ageBracketChartData = {
        labels: [
            "18-24",
            "25-34",
            "35-44",
            "45-54",
            "55-64",
            "65+"
        ],
        datasets: [
            {
                label: "Grups d'edat",
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
        ]
    };

    var ageBracketChartOptions = {
        animation:{
            animateScale:true
        }
    };

    var ageBracketChart = new Chart(ageBracketChartCanvas, {
        type: 'doughnut',
        data: ageBracketChartData,
        options: ageBracketChartOptions
    });
}

function updateDeviceCategoriesChart() {
    var metrics = $("#deviceCategoriesSelector").val();
    getDataOverAJAX( 'getDeviceCategoriesData', metrics ).then(
        function( data ) {
            drawDeviceCategoriesChart( data );
        }
    );
}

function getLast6Months(){
    var allMonths = ["Gener","Febrer","Març","Abril","Maig","Juny","Juliol","Agost","Setembre","Octubre","Novembre","Desembre"];
    var month = new Date().getMonth();
    var n = 5;
    var last6months = [];
    while (n >= 0) {
        if (month-n < 0) {
            last6months.push(allMonths[month-n+11]);
        } else {
            last6months.push(allMonths[month-n]);
        }
        --n;
    }
    return last6months;
}

function rearrangeData(data) {
    var newArray = [];

    for (var k = 0; k < data[data.length-1].length; ++k) {
        newArray[k] = [];
        for (var l = 0; l < data.length; ++l) {
            newArray[k][l] = 0;
        }
    }

    for (var i = 0; i < data.length; ++i) {
        for (var j = 0; j < data[i].length; ++j) {
            if (data[i][j] != undefined) {
                newArray[j][i] = data[i][j];
            } else {
                newArray[j][i] = 0;
            }
        }
    }
    return newArray;
}

function getDataOverAJAX(route, data) {
    return $.ajax(
        {
            type: 'GET',
            url: 'ajax/analytics/' + route,
            data: {data: data}
        });
}
