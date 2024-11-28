<div class="container">
	<h5>Pelaporan Penjualan</h5>	

	<div id="grafik-member-distrik"></div>

</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
	Highcharts.chart('grafik-member-distrik', {
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