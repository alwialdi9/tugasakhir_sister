    <script src="<?= base_url('assets/') ?>lib/feather-icons/feather.min.js"></script>
    <script src="<?= base_url('assets/') ?>lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/') ?>lib/jquery.flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/') ?>lib/jquery.flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('assets/') ?>lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url('assets/') ?>lib/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>lib/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url('assets/') ?>lib/jqvmap/maps/jquery.vmap.usa.js"></script>

    <script src="<?= base_url('assets/') ?>assets/js/dashforge.js"></script>
    <script src="<?= base_url('assets/') ?>assets/js/dashforge.aside.js"></script>
    <script src="<?= base_url('assets/') ?>assets/js/dashforge.sampledata.js"></script>

    <!-- append theme customizer -->
    <script src="<?= base_url('assets/') ?>lib/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url('assets/') ?>assets/js/dashforge.settings.js"></script>
    <script src="<?= base_url('assets/') ?>js/jquery.min.js"></script> <!-- v.1.12.4 -->
    <script src="<?= base_url('assets/') ?>assets/js/jquery.plugin.min.js"></script>
    <script src="<?= base_url('assets/') ?>assets/js/jquery.countdown.js"></script>

    <script type="text/javascript">
      function waktuHabis() {
        swal("Waktu habis!", "Waktu Anda Sudah Habis", "success")
          .then((value) => {
            $.ajax({
              data: new FormData($("#jawabansoal")[0]),
              url: "<?= base_url('cekjawaban') ?>",
              type: "POST",
              contentType: false,
              cache: false,
              processData: false,
              dataType: 'json',
              success: function(data) {

              },
              error: function(data) {
                console.log('Error:', data);

              }
            });
            swal("Success!", "Berhasil Input Jawaban!", "success")
              .then((value) => {
                window.location = "<?= base_url('user') ?>";
              });
          });
      }

      function hampirHabis(periods) {
        if ($.countdown.periodsToSeconds(periods) <= 60) {
          $(this).css({
            color: "red"
          });
        }
      }
      <?php
      $javawaktu = $this->db->query("SELECT * FROM tb_timer");
      foreach ($javawaktu->result_array() as $j) : ?>
        $(function() {
          var waktu = <?= $j['waktu'] ?>;
          var sisa_waktu = waktu - <?= $lewat ?>;
          var longWayOff = sisa_waktu;
          $("#timer").countdown({
            until: longWayOff,
            compact: true,
            onExpiry: waktuHabis,
            onTick: hampirHabis
          });
        })
      <?php
      endforeach;
      ?>
    </script>

    <script>
      $(function() {
        'use strict'

        var plot = $.plot('#flotChart', [{
          data: df3,
          color: '#69b2f8'
        }, {
          data: df1,
          color: '#d1e6fa'
        }, {
          data: df2,
          color: '#d1e6fa',
          lines: {
            fill: false,
            lineWidth: 1.5
          }
        }], {
          series: {
            stack: 0,
            shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 0,
              fill: 1
            }
          },
          grid: {
            borderWidth: 0,
            aboveData: true
          },
          yaxis: {
            show: false,
            min: 0,
            max: 350
          },
          xaxis: {
            show: true,
            ticks: [
              [0, ''],
              [8, 'Jan'],
              [20, 'Feb'],
              [32, 'Mar'],
              [44, 'Apr'],
              [56, 'May'],
              [68, 'Jun'],
              [80, 'Jul'],
              [92, 'Aug'],
              [104, 'Sep'],
              [116, 'Oct'],
              [128, 'Nov'],
              [140, 'Dec']
            ],
            color: 'rgba(255,255,255,.2)'
          }
        });


        $.plot('#flotChart2', [{
          data: [
            [0, 55],
            [1, 38],
            [2, 20],
            [3, 70],
            [4, 50],
            [5, 15],
            [6, 30],
            [7, 50],
            [8, 40],
            [9, 55],
            [10, 60],
            [11, 40],
            [12, 32],
            [13, 17],
            [14, 28],
            [15, 36],
            [16, 53],
            [17, 66],
            [18, 58],
            [19, 46]
          ],
          color: '#69b2f8'
        }, {
          data: [
            [0, 80],
            [1, 80],
            [2, 80],
            [3, 80],
            [4, 80],
            [5, 80],
            [6, 80],
            [7, 80],
            [8, 80],
            [9, 80],
            [10, 80],
            [11, 80],
            [12, 80],
            [13, 80],
            [14, 80],
            [15, 80],
            [16, 80],
            [17, 80],
            [18, 80],
            [19, 80]
          ],
          color: '#f0f1f5'
        }], {
          series: {
            stack: 0,
            bars: {
              show: true,
              lineWidth: 0,
              barWidth: .5,
              fill: 1
            }
          },
          grid: {
            borderWidth: 0,
            borderColor: '#edeff6'
          },
          yaxis: {
            show: false,
            max: 80
          },
          xaxis: {
            ticks: [
              [0, 'Jan'],
              [4, 'Feb'],
              [8, 'Mar'],
              [12, 'Apr'],
              [16, 'May'],
              [19, 'Jun']
            ],
            color: '#fff',
          }
        });

        $.plot('#flotChart3', [{
          data: df4,
          color: '#9db2c6'
        }], {
          series: {
            shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: {
                colors: [{
                  opacity: 0
                }, {
                  opacity: .5
                }]
              }
            }
          },
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
          yaxis: {
            show: false,
            min: 0,
            max: 60
          },
          xaxis: {
            show: false
          }
        });

        $.plot('#flotChart4', [{
          data: df5,
          color: '#9db2c6'
        }], {
          series: {
            shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: {
                colors: [{
                  opacity: 0
                }, {
                  opacity: .5
                }]
              }
            }
          },
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
          yaxis: {
            show: false,
            min: 0,
            max: 80
          },
          xaxis: {
            show: false
          }
        });

        $.plot('#flotChart5', [{
          data: df6,
          color: '#9db2c6'
        }], {
          series: {
            shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: {
                colors: [{
                  opacity: 0
                }, {
                  opacity: .5
                }]
              }
            }
          },
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
          yaxis: {
            show: false,
            min: 0,
            max: 80
          },
          xaxis: {
            show: false
          }
        });

        $.plot('#flotChart6', [{
          data: df4,
          color: '#9db2c6'
        }], {
          series: {
            shadowSize: 0,
            lines: {
              show: true,
              lineWidth: 2,
              fill: true,
              fillColor: {
                colors: [{
                  opacity: 0
                }, {
                  opacity: .5
                }]
              }
            }
          },
          grid: {
            borderWidth: 0,
            labelMargin: 0
          },
          yaxis: {
            show: false,
            min: 0,
            max: 60
          },
          xaxis: {
            show: false
          }
        });

        $('#vmap').vectorMap({
          map: 'usa_en',
          showTooltip: true,
          backgroundColor: '#fff',
          color: '#d1e6fa',
          colors: {
            fl: '#69b2f8',
            ca: '#69b2f8',
            tx: '#69b2f8',
            wy: '#69b2f8',
            ny: '#69b2f8'
          },
          selectedColor: '#00cccc',
          enableZoom: false,
          borderWidth: 1,
          borderColor: '#fff',
          hoverOpacity: .85
        });


        var ctxLabel = ['6am', '10am', '1pm', '4pm', '7pm', '10pm'];
        var ctxData1 = [20, 60, 50, 45, 50, 60];
        var ctxData2 = [10, 40, 30, 40, 55, 25];

        // Bar chart
        var ctx1 = document.getElementById('chartBar1').getContext('2d');
        new Chart(ctx1, {
          type: 'horizontalBar',
          data: {
            labels: ctxLabel,
            datasets: [{
              data: ctxData1,
              backgroundColor: '#69b2f8'
            }, {
              data: ctxData2,
              backgroundColor: '#d1e6fa'
            }]
          },
          options: {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
              display: false,
              labels: {
                display: false
              }
            },
            scales: {
              yAxes: [{
                gridLines: {
                  display: false
                },
                ticks: {
                  display: false,
                  beginAtZero: true,
                  fontSize: 10,
                  fontColor: '#182b49'
                }
              }],
              xAxes: [{
                gridLines: {
                  display: true,
                  color: '#eceef4'
                },
                barPercentage: 0.6,
                ticks: {
                  beginAtZero: true,
                  fontSize: 10,
                  fontColor: '#8392a5',
                  max: 80
                }
              }]
            }
          }
        });

      })
    </script>
    </body>

    </html>