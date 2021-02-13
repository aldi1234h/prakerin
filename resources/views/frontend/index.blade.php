<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tracking Covid</title>
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="navbar-brand">#</div>
        <a href="{{ url('#') }}" class="nav-link">
            <span class="nav-link-inner text-white">DASHBOARD</span>
        </a>
        <a href="{{ url('#') }}" class="nav-link">
            <span class="nav-link-inner text-white">HOTLINE</span>
        </a>
        <a href="{{ url('#') }}" class="nav-link">
            <span class="nav-link-inner text-white">API FOR DEVELOPERS</span>
        </a>
        <a href="{{ url('#') }}" class="nav-link">
            <span class="nav-link-inner text-white">CONTACT</span>
        </a>
    </nav>
    <br><br>
    <div class="container-fluid">
        <br>
        <h1 class="display-3 text-center">Tracking Covid</h1>
        <h3 class=" text-center">Data Coronavirus Global & Indonesia</h3><br><br>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL POSITIF</p>
                                <h2 class="mb-0 number-font">{{ $positif }}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto"> <img src="{{ asset('assets/img/brand/sad-u6e.png') }}" width="100"
                                    height="100"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL SEMBUH</p>
                                <h2 class="mb-0 number-font">{{ $sembuh }}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto"> <img src="{{ asset('assets/img/brand/happy-Ipm.png') }}" width="100"
                                    height="100"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-secondary">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL MENINGGAL</p>
                                <h2 class="mb-0 number-font">{{ $meninggal }}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto"> <img src="{{ asset('assets/img/brand/emoji-LWx.png') }}"
                                    width="100" height="100"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">INDONESIA</h2>
                                <p class="text-white mb-0"><b>1,166,079</b> POSITIF, <b>963,028</b> SEMBUH,
                                    <b>31,763</b> MENINGGAL
                                </p>
                            </div>

                            <div class="ml-auto"> <img src="{{ asset('assets/img/brand/indonesia-PZq.png') }}"
                                    width="100" height="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="card mb-4">
            <div class="card-header">
                Data Global Coronavirus
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>NEGARA</th>
                                <th>POSITIF</th>
                                <th>SEMBUH</th>
                                <th>MENINGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Data Coronavirus Berdasarkan Provinsi di Negara Indonesia
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>KODE PROVINSI</th>
                                <th>PROVINSI</th>
                                <th>POSITIF</th>
                                <th>SEMBUH</th>
                                <th>MENINGGAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach ($provinsi as $data)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <th>{{ $data->kode_provinsi }}
                                    <th>{{ $data->nama_provinsi }}
                                    <th>{{ $data->positif }}
                                    <th>{{ $data->sembuh }}
                                    <th>{{ $data->meninggal }}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2021</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
</body>

</html>
