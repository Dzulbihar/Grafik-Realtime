<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <figure class="highcharts-figure">
                <div id="grafik_pemilik_barang_importir_binpel"></div>
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

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- grafik ajax -->
<script type="text/javascript">

    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const start_date = urlParams.get('start_date');
    const end_date = urlParams.get('end_date');

    function get_chart_pemilik_barang_importir() {
        $.ajax({
            url: "{{url('/grafik_ajax/bin_pel_pemilik_barang_importir')}}",
            type: "GET",
            data: {
                start_date:start_date,
                end_date: end_date,
            },
            dataType: "json",
            success: function(data) {
                console.log(data)
                chart_pemilik_barang_importir.update({
                    series :[
                        {
                            name: "Importir",
                            data: data.grafik_pemilik_barang_importir
                        }
                      ]
                })
            },
            cache: false
        });
    }

    setInterval(() => {
        chart_pemilik_barang_importir.hideLoading();
        get_chart_pemilik_barang_importir();
    }, 10000);
    

</script>
<script type="text/javascript">
    Highcharts.setOptions({
     colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4', '#5e6063', '#112c80']
    });
    
    chart_pemilik_barang_importir = new Highcharts.chart('grafik_pemilik_barang_importir_binpel', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie',
            events: {
                load: get_chart_pemilik_barang_importir
            }
        },

        title: {
            text: '<b>Persentase Importir</b>'
        },

        subtitle: {
            align: 'center',
            text: '<?php 
                        if(empty($start_date)){
                            echo 'Tahun '. $tahun_ini. ' sampai dengan bulan ' .$bulan;
                        }
                        if(!empty($start_date)){

                            echo 'Antara tanggal ' .$start_date . ' sampai tanggal ' .$end_date;
                        }
                    ?>'
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

        series: [
          {
              name:'',
              data:[]
          }
        ]    
});
</script>
