<!--   Core JS Files   -->
<script src="{{ url('../backend/assets/js/core/popper.min.js') }}"></script>
<script src="{{ url('../backend/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ url('../backend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ url('../backend/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ url('../backend/assets/js/plugins/chartjs.min.js') }}"></script>
{{-- <script src="{{ url('https://kit.fontawesome.com/42d5adcbca.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}

<script>
  var ctx = document.getElementById("chart-bars").getContext("2d");

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
        label: "Sales",
        tension: 0.4,
        borderWidth: 0,
        borderRadius: 4,
        borderSkipped: false,
        backgroundColor: "#fff",
        data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
        maxBarThickness: 6
      }, ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 500,
            beginAtZero: true,
            padding: 15,
            font: {
              size: 14,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
            color: "#fff"
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false
          },
          ticks: {
            display: false
          },
        },
      },
    },
  });


  var ctx2 = document.getElementById("chart-line").getContext("2d");

  var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

  var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

  gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
  gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

  new Chart(ctx2, {
    type: "line",
    data: {
      labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#cb0c9f",
          borderWidth: 3,
          backgroundColor: gradientStroke1,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        },
        {
          label: "Websites",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#3A416F",
          borderWidth: 3,
          backgroundColor: gradientStroke2,
          fill: true,
          data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
          maxBarThickness: 6
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            padding: 10,
            color: '#b2b9bf',
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
          },
          ticks: {
            display: true,
            color: '#b2b9bf',
            padding: 20,
            font: {
              size: 11,
              family: "Open Sans",
              style: 'normal',
              lineHeight: 2
            },
          }
        },
      },
    },
  });
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
{{-- <script async defer src="{{ url('https://buttons.github.io/buttons.js') }}"></script> --}}
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ url('../backend/assets/js/soft-ui-dashboard.min.js') }}"></script>


<!-- Page level custom scripts -->
 <!-- Bootstrap core JavaScript-->
 <script src="{{ url('backend/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ url('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

   <!-- Bootstrap core JavaScript-->
   <!-- Core plugin JavaScript-->
   <script src="{{ url('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ url('backend/js/sb-admin-2.min.js') }}"></script>

   <!-- Page level plugins -->
   <script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
   <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script>


{{-- Section Pegawai --}}

<script>
  jQuery(document).ready(function($){
     $('#pegawai').on('show.bs.modal', function(e){
         var button = $(e.relatedTarget);
         var modal = $(this);
  
         modal.find('.modal-body').load(button.data("remote"));
         modal.find('.modal-title').html(button.data("title"));
     });
  });
  </script>

<script>
  jQuery(document).ready(function($){
     $('#petugas').on('show.bs.modal', function(e){
         var button = $(e.relatedTarget);
         var modal = $(this);
  
         modal.find('.modal-body').load(button.data("remote"));
         modal.find('.modal-title').html(button.data("title"));
     });
  });
  </script>
  
  {{-- <script>
      jQuery(document).ready(function($){
          $('#pegawaicreate').on('show.bs.modal', function(e){
              var button = $(e.relatedTarget);
              var modal = $(this);
    
              modal.find('.modal-body').load(button.data("remote"));
              modal.find('.modal-title').html(button.data("title"));
          });
      });
    </script> --}}



{{-- Section Petugas --}}
{{-- <script>
  jQuery(document).ready(function($){
      $('#petugascreate').on('show.bs.modal', function(e){
          var button = $(e.relatedTarget);
          var modal = $(this);
          
          modal.find('.modal-body').load(button.data("remote"));
          modal.find('.modal-title').html(button.data("title"));
      });
  });
</script> --}}

{{-- <script>
  $(document).ready(function(){
  $('#createpetugas').validate({
    errorClass: "error fail-alert",
    validClass: "valid success-alert",
    rules: {
      nama_petugas:{
        required: true
      }
    }
  });
});
</script> --}}


 {{-- Section Jenis --}}
 {{-- <script>
  jQuery(document).ready(function($){
      $('#jeniscreate').on('show.bs.modal', function(e){
          var button = $(e.relatedTarget);
          var modal = $(this);

          modal.find('.modal-body').load(button.data("remote"));
          modal.find('.modal-title').html(button.data("title"));
      });
  });
</script> --}}

 {{-- Section Ruang --}}
 {{-- <script>
  jQuery(document).ready(function($){
      $('#ruangcreate').on('show.bs.modal', function(e){
          var button = $(e.relatedTarget);
          var modal = $(this);

          modal.find('.modal-body').load(button.data("remote"));
          modal.find('.modal-title').html(button.data("title"));
      });
  });
</script> --}}

{{-- Section Inventaris --}}
<script>
  jQuery(document).ready(function($){
     $('#inventaris').on('show.bs.modal', function(e){
         var button = $(e.relatedTarget);
         var modal = $(this);
  
         modal.find('.modal-body').load(button.data("remote"));
         modal.find('.modal-title').html(button.data("title"));
     });
  });
  </script>

<script>
  jQuery(document).ready(function($){
     $('#inventarisphoto').on('show.bs.modal', function(e){
         var button = $(e.relatedTarget);
         var modal = $(this);
  
         modal.find('.modal-body').load(button.data("remote"));
         modal.find('.modal-title').html(button.data("title"));
     });
  });
  </script> 


<script>
  jQuery(document).ready(function($){
     $('#peminjamanphoto').on('show.bs.modal', function(e){
         var button = $(e.relatedTarget);
         var modal = $(this);
  
         modal.find('.modal-body').load(button.data("remote"));
         modal.find('.modal-title').html(button.data("title"));
     });
  });
  </script>







