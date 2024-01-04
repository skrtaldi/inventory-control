<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 24px;">
          {{ __('Dashboard') }}
        </h2>
      </x-slot>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('halaman_dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('halaman_dashboard/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet') }}">

    <!-- Custom styles for this template-->
    <link href="{{ asset('halaman_dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <br>
        
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Users</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\User::count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-regular fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Supplier</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\supplier::count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-handshake fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Customer
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ \App\Models\Customer::count() }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-regular fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Barang</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Toko::count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-solid fa-cubes fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Notifikasi</h6>
                        <div class="dropdown no-arrow">
                            {{-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="max-height: 300px; overflow-y: auto;">
                        @foreach ($data as $item)
                            @if ($item->jumlah <= $item->minLimit)
                                <div class="alert alert-danger">
                                    Peringatan: Stok {{ $item->nama }} hampir habis! Segera lakukan pengadaan.
                                </div>
                                @endif
                        @endforeach
                        @foreach ($data as $item)
                        @if ($item->jumlah >= $item->minLimit)
                        <div class="alert alert-warning">
                            Peringatan: Stok {{ $item->nama }} hampir habis! Segera lakukan pengadaan.
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                        <div class="dropdown no-arrow">
                            {{-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie">
                            {!! $jumlahBarangChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('halaman_dashboard/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('halaman_dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('halaman_dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('halaman_dashboard/js/sb-admin-2.min.js') }}"></script>
        
        <!-- Page level plugins -->
        <script src="{{ asset('halaman_dashboard/vendor/chart.js/Chart.min.js') }}"></script>
        
        <!-- Page level custom scripts -->
        <script src="{{ asset('halaman_dashboard/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('halaman_dashboard/js/demo/chart-pie-demo.js') }}"></script>
        
        <!-- Page level plugins -->
        <script src="{{ asset('halaman_dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('halaman_dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        
        <!-- Page level custom scripts -->
        <script src="{{ asset('halaman_dashboard/js/demo/datatables-demo.js') }}"></script>
        
        <script src="{{ $jumlahBarangChart->cdn() }}"></script>
    
    {{ $jumlahBarangChart->script() }}
    </body>
</html>
</x-app-layout>