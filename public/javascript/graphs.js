var createBarChart = function (result) {
    var data = [];

    $result = JSON.parse(result);
    console.log($result);
    $.each($result, function($index, $value){
        data.push({
            name : $index,
            y    : parseInt($value)
        });
    });
    console.log(data);
    $('#bar_chart_container').highcharts({
        chart: {
            type: 'column'

        },
        colors: ['#337AB7','#3C763D','#ef2f2f'],
        title: {
            text: 'Total Members & Images'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            labels:
            {enabled: false},
            crosshair: false
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Count'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">Total Count : </td>' +
                         '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: false,
            useHTML: true
        },
        credits : {
            enabled : false
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Images',
            data: [data[2]]
        },{
            name: 'Active',
            data: [data[0]]

        },{
            name: 'Deactive',
            data: [data[1]]

        }]
    });
};