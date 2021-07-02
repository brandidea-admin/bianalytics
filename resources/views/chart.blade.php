<!DOCTYPE html>
<html>
<head>
   <title>BIApp Charts</title>
   <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body>
    <div id="container"></div>
</body>

@if($chtype == 'pie')

<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        borderWidth: 0,
        borderColor: '#eee',
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false,
        type: 'pie',
        // width: 500,
        //height: 300,
        spacingRight: 1,
        spacingLeft: 1 // plotLeft
    },
    credits: {
            enabled: false
        },
    title: {
        text: 'New User Registrations'
    },
    tooltip: {
        pointFormat: '<b>{point.percentage:.1f}%</b> of all {series.total} cups'
    },
    plotOptions: {
        pie: {
            size: 150,
            center: [150, 150],
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                connectorShape: 'crookedLine',
                crookDistance: '90%',
                alignTo: 'plotEdges',
                format: '<b>{point.name}</b>: {point.y}'
            }
        }
    },
    series: [{
        name: 'Teams',
        colorByPoint: true,
        data: [{
            name: 'Jan',
            y: 50
        }, {
            name: 'Feb',
            y: 60
        }, {
            name: 'Mar',
            y: 80
        }, {
            name: 'Apr',
            y: 30
        }, {
            name: 'May',
            y: 10
        }, {
            name: 'Jun',
            y: 70
        }]
    }]
});

</script>

@else

<script type="text/javascript">

var users =  <?php echo json_encode($users) ?>;
    Highcharts.chart('container', {
        chart: {
          type: '{{$chtype}}',
          height: 320
        },
        credits: {
            enabled: false
        },
        title: {
           text: 'New User Growth, 2020'
        },
        // subtitle: {
        //     text: 'Source: itsolutionstuff.com.com'
        // },
         xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: users
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500,
                    maxHeight: 300
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'top'
                    }
                }
            }]
        }
});

</script>

@endif

</html>