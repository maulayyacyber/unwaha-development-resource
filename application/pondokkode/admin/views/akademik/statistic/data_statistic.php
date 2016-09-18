<!-- BEGIN PAGE CONTENT-->
<script>
jQuery(document).ready(function() {
//chart pie fungsi
$(function () {
    $('#statistic-siswa').highcharts({
        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Statistic Data Seluruh Siswa'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.name}</b>'
        },
        xAxis: {

            categories: ['Siswa Laki-Laki','Siswa Perempuan']

        },
        yAxis: {

            title: {

                text: 'Statistic Data Seluruh Siswa'

            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'column',
            options3d :{
              enabled : true
            },
            name: 'Statistic Data Siswa',
            data:  [<?php
            			foreach($statistic_siswa as $hasil){
            			echo "['".$hasil['jenis_kelamin']."',".$hasil["jumlah"]."],";
            			}
            		?>]
        }]
    });
  });
  //chart pie fungsi
  $(function () {
      $('#statistic-guru').highcharts({
          chart: {
              type: 'column',
              options3d: {
                  enabled: true,
                  alpha: 45,
                  beta: 0
              }
          },
          title: {
              text: 'Statistic Data Seluruh Guru'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.name}</b>'
          },
          xAxis: {

              categories: ['Guru Laki-Laki','Guru Perempuan']

          },
          yAxis: {

              title: {

                  text: 'Statistic Data Seluruh Guru'

              }
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                      style: {
                          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                      }
                  }
              }
          },
          series: [{
              type: 'column',
              options3d :{
                enabled : true
              },
              name: 'Statistic Data Guru',
              data:  [<?php
              			foreach($statistic_guru as $hasil){
              			echo "['".$hasil['jenis_kelamin']."',".$hasil["jumlah"]."],";
              			}
              		?>]
          }]
      });
    });
});
</script>
<div class="row">
    <div class="col-md-12">
      <div class="portlet box blue">
                      <div class="portlet-title">
                              <div class="caption">
                                      <i class="fa fa-bar-chart-o"></i>Statistic Siswa
                              </div>
                              <div class="tools">
                                      <a href="javascript:;" class="collapse"></a>
                                      <a href="javascript:;" class="remove"></a>
                              </div>
                      </div>
          <div class="portlet-body">
              <!-- BEGIN FORM-->
                          <div id="statistic-siswa"></div>
          </div>
      </div>
      <div class="portlet box blue">
                      <div class="portlet-title">
                              <div class="caption">
                                      <i class="fa fa-bar-chart-o"></i>Statistic Guru
                              </div>
                              <div class="tools">
                                      <a href="javascript:;" class="collapse"></a>
                                      <a href="javascript:;" class="remove"></a>
                              </div>
                      </div>
          <div class="portlet-body">
              <!-- BEGIN FORM-->
                          <div id="statistic-guru"></div>
          </div>
      </div>
  </div>
</div>
