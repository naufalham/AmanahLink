<div class="container">
	<h5>Pelaporan Penjualan</h5>	

	<div id="jumlah_penjualan"></div>

</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	Highcharts.chart('jumlah_penjualan', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Jumlah Penjualan Per produk'
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
<h5>Pelaporan Pendapatan Per bulan</h5>	

<div id="pendapatan"></div>

</div>

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
        min: 0,
        title: {
            text: 'Pendapatan (juta)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Pendapatan Bulanan: <b>{point.y:.1f} juta</b>'
    },
    series: [{
        name: 'Pendapatan',
        colors: [
            '#0a9eaa'
        ],
        colorByPoint: true,
        groupPadding: 0,
        data: [
            <?php foreach ($penjualan as $k => $v): ?>
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
            format: '{point.y:.1f}', // satu desimal
            y: 10, // 10 piksel dari atas
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

</script>