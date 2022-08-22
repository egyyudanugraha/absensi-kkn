@extends('../layouts/absensi')
@section('content')
<div class="content-wrapper container"> 
  <div class="page-heading mt-5">
    <h3>Ringkasan KKN Suradita 2022</h3>
  </div>
  <div class="page-content">
    <div class="row">
      <div class="col-6">
          <div class="card">
              <div class="card-body px-4 py-4-5">
                  <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                          <div class="stats-icon purple mb-2">
                              <i class="iconly-boldWallet"></i>
                          </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Saldo</h6>
                          <h6 class="font-extrabold mb-0">{{ rupiah($saldo) }}</h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-6">
          <div class="card">
              <div class="card-body px-4 py-4-5">
                  <div class="row">
                      <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                          <div class="stats-icon red mb-2">
                              <i class="iconly-boldArrow---Up-2"></i>
                          </div>
                      </div>
                      <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">Pengeluaran</h6>
                          <h6 class="font-extrabold mb-0">{{ rupiah($totalPengeluaran) }}</h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
          Riwayat Absensi
      </div>
      <div class="card-body">
          <table class="table table-striped" id="table1">
              <thead>
                  <tr>
                      <th>Nama</th>
                      <th>status</th>
                      <th>Tanggal</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($absensi as $item)
                <tr>
                    <td>{{ $item->anggota->nama }}</td>
                    <td><span class="badge bg-{{ $item->status != 'hadir' ? 'danger' : 'success' }}">{{ ucfirst($item->status) }}</span></td>
                    <td>{{ date_format($item->created_at,'M d, Y') }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
          Riwayat Pemasukan
      </div>
      <div class="card-body">
          <table class="table table-striped" id="table1">
              <thead>
                  <tr>
                      <th>Nama</th>
                      <th>Nominal</th>
                      <th>Tanggal</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($kas as $item)
                <tr>
                    <td>{{ $item->anggota->nama }}</td>
                    <td>{{ rupiah($item->nominal) }}</td>
                    <td>{{ date_format($item->created_at,'M d, Y') }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    </div>
    <div class="card">
      <div class="card-header">
          Riwayat Pengeluaran
      </div>
      <div class="card-body">
          <table class="table table-striped" id="table1">
              <thead>
                  <tr>
                      <th>Keterangan</th>
                      <th>Nominal</th>
                      <th>Tanggal</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($pengeluaran as $item)
                <tr>
                    <td>{{ strlen($item->keterangan) > 30 ? substr($item->keterangan, 0, 30) . '...' : $item->keterangan }}</td>
                    <td>{{ rupiah($item->nominal) }}</td>
                    <td>{{ date_format($item->created_at,'M d, Y') }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

<script src="assets/extensions/toastify-js/src/toastify.js"></script>
@if(session()->has('success'))
  <script>
    Toastify({
        text: "{{ session()->get('success') }}",
        duration: 3000,
        backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
    }).showToast();
  </script>
@elseif(session()->has('error'))
  <script>
    Toastify({
        text: "{{ session()->get('error') }}",
        duration: 3000,
        backgroundColor: "linear-gradient(to right, #de0b0b, #e6c732)",
    }).showToast();
  </script>
@endif
@endsection