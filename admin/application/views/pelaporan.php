<html>
 <head>
  <title>
   Katalog Produk
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
        .container {
            text-align: center;
        }
    
        h5 {
            font-size: 35px;
            margin-top: 45px;
            font-weight: bold;
            color: #0E6635;
            margin-bottom: 30px;
            position: relative;
        }
        h5::after {
            content: '';
            position: absolute;
            background-color: #F9DA73;
            top: 50%;
            left: 62%;
            transform: translateX(-50%);
            width: 80px;
            height: 23px;
            border-radius: 2px;
            z-index: -1;
        }
  </style>
 </head>
 <body>
<div class="container">
	<h5>Pelaporan Penjualan</h5>	

	<div id="jumlah_penjualan"></div>
	<div id="jumlah_penjualan_tahun"></div>
	<div id="jumlah_penjualan_bulan"></div>

</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	Highcharts.chart('jumlah_penjualan', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Jumlah Penjualan Keseluruhan'
    },
    tooltip: {
        valueSuffix: ' pcs'
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                <?php foreach ($jumlah_penjualan as $k => $v): ?>
				{
                    name: '<?php echo $v['nama_produk'] ?>',
                    y: <?php echo $v['total_terjual'] ?>
                },
				<?php endforeach ?>
                
            ]
        }
    ]
});
</script>


<script>
	Highcharts.chart('jumlah_penjualan_tahun', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Jumlah Penjualan Per 12 bulan terakhir'
    },
    tooltip: {
        valueSuffix: ' pcs'
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                <?php foreach ($jumlah_penjualan as $k => $v): ?>
				{
                    name: '<?php echo $v['nama_produk'] ?>',
                    y: <?php echo $v['total_terjual'] ?>
                },
				<?php endforeach ?>
                
            ]
        }
    ]
});
</script>

<script>
	Highcharts.chart('jumlah_penjualan_bulan', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Jumlah Penjualan Per 1 bulan terakhir'
    },
    tooltip: {
        valueSuffix: ' pcs'
    },
    plotOptions: {
        series: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: [{
                enabled: true,
                distance: 20
            }, {
                enabled: true,
                distance: -40,
                format: '{point.percentage:.1f}%',
                style: {
                    fontSize: '1.2em',
                    textOutline: 'none',
                    opacity: 0.7
                },
                filter: {
                    operator: '>',
                    property: 'percentage',
                    value: 10
                }
            }]
        }
    },
    series: [
        {
            name: 'Jumlah',
            colorByPoint: true,
            data: [
                <?php foreach ($jumlah_penjualan as $k => $v): ?>
				{
                    name: '<?php echo $v['nama_produk'] ?>',
                    y: <?php echo $v['total_terjual'] ?>
                },
				<?php endforeach ?>
                
            ]
        }
    ]
});
</script>


<div class="container">
<h5>Pelaporan Pendapatan</h5>	

<div id="pendapatan"></div>
<div id="pendapatan_bulan"></div>

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>

Highcharts.chart('pendapatan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pendapatan Bulanan dalam Satu Tahun'
    },
    subtitle: {
        text: 'Sumber: Data Pendapatan Bulanan'
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,// Minimum nilai sumbu Y
        max: 5000000, // Maximum nilai sumbu Y
        tickInterval: 1000000, // Interval antar tick (1 juta)
        title: {
            text: 'Pendapatan (juta)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Pendapatan Bulanan: <b>{point.y} ribu</b>'
    },
    series: [{
        name: 'Pendapatan',
        colors: [
            '#0a9eaa'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            <?php foreach ($pendapatan as $k => $v): ?>
				{
                    name: '<?php echo $v['bulan'] ?>',
                    y: <?php echo $v['total_pendapatan'] ?>
                },
				<?php endforeach ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y}', // satu desimal
            y: 10, // 10 piksel dari atas
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

</script>

<script>

Highcharts.chart('pendapatan_bulan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pendapatan Bulanan'
    },
    subtitle: {
        text: 'Sumber: Data Pendapatan Bulanan'
    },
    xAxis: {
        type: 'category',
        labels: {
            autoRotation: [-45, -90],
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,// Minimum nilai sumbu Y
        max: 5000000, // Maximum nilai sumbu Y
        tickInterval: 1000000, // Interval antar tick (1 juta)
        title: {
            text: 'Pendapatan (juta)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Pendapatan Bulanan: <b>{point.y} ribu</b>'
    },
    series: [{
        name: 'Pendapatan',
        colors: [
            '#0a9eaa'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            <?php foreach ($pendapatan as $k => $v): ?>
				{
                    name: '<?php echo $v['bulan'] ?>',
                    y: <?php echo $v['total_pendapatan'] ?>
                },
				<?php endforeach ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            inside: true,
            verticalAlign: 'top',
            format: '{point.y}', // satu desimal
            y: 10, // 10 piksel dari atas
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

</script>

</body>
</html>

