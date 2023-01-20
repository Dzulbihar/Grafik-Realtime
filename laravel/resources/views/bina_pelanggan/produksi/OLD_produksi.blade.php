@section('header', 'Produksi')

@extends('layouts.app')

@section('content')



<br>

<!-- Judul emkl Teus -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h1 align="center"> 
              <label class="badge badge-light">
                <b> 
                  Produksi INTER dan DOM
                </b>
              </label> 
            </h1>
          </div>
        </div>
      </div>
    </div>        
  </div>
</section>
<!-- /.content -->


<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <figure class="highcharts-figure">
                <div id="grafik_produksi_international"></div>
            </figure>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <figure class="highcharts-figure">
                <div id="grafik_produksi_domestik"></div>
            </figure>
          </div>
        </div>
      </div>
    </div>        
  </div>
</section>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
Highcharts.chart('grafik_produksi_international', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<b>Persentase Produksi International </b>'
    },

    subtitle: {
        align: 'center',
        text: '<?php echo 'Tahun '. $tahun_ini. ' sampai dengan bulan ' .$bulan; ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:,.2f} %</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:,.2f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Produksi International',
        data: <?php echo json_encode($grafik_produksi_international)?>
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('grafik_produksi_domestik', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<b>Persentase Produksi Domestik </b>'
    },

    subtitle: {
        align: 'center',
        text: '<?php echo 'Tahun '. $tahun_ini. ' sampai dengan bulan ' .$bulan; ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:,.2f} %</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:,.2f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Produksi Domestik',
        data: <?php echo json_encode($grafik_produksi_domestik)?>
    }]
});
</script>






@endsection