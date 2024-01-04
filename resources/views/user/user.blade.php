<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 24px;">
        {{ __('Daftar Customer') }}
      </h2>
    </x-slot>
  
    
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Customer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.css">
      </head>
      <body class="bg-light">
        <main class="container">
        @if(Session::has('success'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
      @endif
          <!-- START DATA -->
          <div class="my-3 p-3 bg-body shadow-sm" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); border-radius:15px;">
            <!-- TOMBOL TAMBAH DATA -->
   <div class="pb-3" style="display: flex; justify-content: space-between; align-items: center;">
     <div>
         <p class="fs-4 font-semibold" style="color: rgb(73, 73, 243);">User Control</p>
     </div>
     <div>
         <a href="{{ route('register') }}" class="btn btn-primary">
            <i class="fas fa-plus fa-xs"></i>
            Tambah Data
        </a>
     </div>
  </div>
                  <!-- FORM PENCARIAN -->
                  {{-- <div class="pb-3 d-flex justify-content-end">
                    <form class="d-flex w-70" action="" method="get">
                        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                  </div> --}}
                  
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $item)
                              <li>{{ $item }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if (Session::has('success'))
                  <script>
                      document.addEventListener('DOMContentLoaded', function() {
                          Swal.fire(
                              'Sukses',
                              '{{ Session::get('success') }}',
                              'success'
                          );
                      });
                  </script>
              @endif
              <div class="col-lg-12 grid-margin stretch-card mt-3">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">ACCOUNT TABLE</h4>
                          <div class="table-responsive">
                              <table class="table table-striped">
                                  <thead>
                                      <tr class="text-center">
                                          <th>
                                              Role
                                          </th>
                                          <th>
                                              Email
                                          </th>
                                          <th>
                                              Aksi
                                          </th>
                                      </tr>
                                  </thead>
                                  @foreach ($uc as $item)
                                      <tbody class="text-center">
                                          <td>
                                              {{ $item->name }}
                                          </td>
                                          <td>{{ $item->email }}</td>
                                          @if ($item->role === 'manager')
                                              <td style="color:#64c9f5; font-weight: bold;">manager</td>
                                          @else
                                              <td>
                                                  <form onsubmit="return confirm('Yakin ingin Mengangkat USER Menjadi MANAGER ?')"
                                                      class="d-inline" action="/uprole/{{ $item->id }}" method="POST">
                                                      @csrf
                                                      <input type="submit"
                                                          class="btn-sm text-decoration-none border border-warning text-warning"
                                                          value="UP">
                                                  </form>
                                                  &nbsp;
                                                  <a href='{{ url('user') }}'
                                                      class="btn-sm btn-warning text-decoration-none">Edit</a>
                                                  <form onsubmit="return confirmDelete(event)" class="d-inline"
                                                      action="{{ url('user/' .$item->id) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn-sm btn-danger btn-sm">Hapus</button>
                                                  </form>
                                          @endif
                                          </td>
                                      </tbody>
                                  @endforeach
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
  </html>
  </x-app-layout>