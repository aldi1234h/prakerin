<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img2/favicon.png">

  <title>Creative - Bootstrap Admin Template</title>
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">


  <!-- Bootstrap CSS -->
  <link href="{{asset('css2/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('css2/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('css2/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css2/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{asset('assets2/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
  <link href="{{asset('assets2/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{asset('assets2/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{asset('css2/owl.carousel.css')}}" type="text/css">
  <link href="{{asset('css2/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{asset('css2/fullcalendar.css')}}">
  <link href="{{asset('css2/widgets.css')}}" rel="stylesheet">
  <link href="{{asset('css2/style.css')}}" rel="stylesheet">
  <link href="{{asset('css2/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{asset('css2/xcharts.min.css')}}" rel=" stylesheet">
  <link href="{{asset('css2/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header white-bg">
      

      <!--logo start-->
      <a href="index.html" class="logo">Nice <span class="lite">Admin</span></a>
      <!--logo end-->

      
    </header>
    <!--header end-->

   

    <!--main content start-->
    
        <!--overview start-->
        <div class = 'jumbotron'>
            <div class = 'container'>
                <br>
                <h1 class='display-3 text-center'>KAWAL CORONA</h1>
                <h4 class="='lead m-0 text-center">Coronavirus Global & Indonesia Live Data</h4>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box red-bg">
                <div class="ml-auto"> <img src="../img2/emoji-LWx.png" width="50" height="50" alt="Positif"> </div>
              <div class="count">6.674</div>
              <div class="title">Total Positif</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
                <div class="ml-auto"> <img src="../img2/happy-ipM.png" width="50" height="50" alt="Sembuh"> </div>
              <div class="count">7.538</div>
              <div class="title">Total Sembuh</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box pink-bg">
                <div class="ml-auto"> <img src="../img2/sad-u6e.png" width="50" height="50" alt="Meninggal"> </div>
              <div class="count">4.362</div>
              <div class="title">Total Meninggal</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box orange-bg">
                <div class="ml-auto"> <img src="../img2/indonesia-PZq.png" width="50" height="50" alt="Indonesia"> </div>
              <div class="count">1.426</div>
              <div class="title">Indonesia</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
  
        </div>
          <!--/.col-->
          <div class="row row-cards">
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
								<div class="card">
									<div class="card-header ">
										<h3 class="card-title">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h3>
									</div>
									<div class="card-body">
										<div class="table-responsive ">
											<table class="table table-bordered table-hover mb-0 text-nowrap css-serial">
						          <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Provinsi</th>
                      <th>Provinsi</th>
                      <th>Positif</th>
                      <th>Sembuh</th>
                      <th>Meninggal</th>
                    </thead>
                    </tr>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($provinsi as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td> {{$item->kode_provinsi}} </td>
                                <td> {{$item->nama_provinsi}} </td>
                                <td> {{$item->positif}} </td>
                                <td> {{$item->sembuh}} </td>
                                <td> {{$item->meninggal}} </td>
                            </tr>
                            @endforeach
                  </tbody>
                </table>
              </section>
            </div>
            <div>
          </div>
          </div>
          </div>
          </div>
          </div>
        

        </div>
        <!--/.row-->
        



        
        <!-- project team & activity end -->

      </section>
      <div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="{{asset('js2/jquery.js')}}"></script>
  <script src="{{asset('js2/jquery-ui-1.10.4.min.js')}}"></script>
  <script src="{{asset('js2/jquery-1.8.3.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js2/jquery-ui-1.9.2.custom.min.js')}}"></script>
  <!-- bootstrap -->
  <script src="{{asset('js2/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{asset('js2/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('js2/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="{{asset('assets2/jquery-knob/js2/jquery.knob.js')}}"></script>
  <script src="{{asset('js2/jquery.sparkline.js')}}" type="text/javascript"></script>
  <script src="{{asset('assets2/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
  <script src="{{asset('js2/owl.carousel.js')}}"></script>
  <!-- jQuery full calendar -->
  <<script src="{{asset('js2/fullcalendar.min.js')}}"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="{{asset('assets2/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
    <!--script for this page only-->
    <script src="{{asset('js2/calendar-custom.js')}}"></script>
    <script src="{{asset('js2/jquery.rateit.min.js')}}"></script>
    <!-- custom select -->
    <script src="{{asset('js2/jquery.customSelect.min.js')}}"></script>
    <script src="{{asset('assets2/chart-master/Chart.js')}}"></script>

    <!--custome script for all page-->
    <script src="{{asset('js2/scripts.js')}}"></script>
    <!-- custom script for this page-->
    <script src="{{asset('js2/sparkline-chart.js')}}"></script>
    <script src="{{asset('js2/easy-pie-chart.js')}}"></script>
    <script src="{{asset('js2/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('js2/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('js2/xcharts.min.js')}}"></script>
    <script src="{{asset('js2/jquery.autosize.min.js')}}"></script>
    <script src="{{asset('js2/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('js2/gdp-data.js')}}"></script>
    <script src="{{asset('js2/morris.min.js')}}"></script>
    <script src="{{asset('js2/sparklines.js')}}"></script>
    <script src="{{asset('js2/charts.js')}}"></script>
    <script src="{{asset('js2/jquery.slimscroll.min.js')}}"></script>
    
</body>

</html>