@extends('../layouts/bendahara')
@section('content')
<div class="page-heading">
    <h3>Riwayat Uang Kas</h3>
</div>
<div class="page-content">
  <div class="card">
    <div class="card-header"> 
      <div class="row justify-content-between">
        <div class="col-4">Riwayat Pemasukan</div>
          <div class="col-4">
              <button class="btn btn-outline-success float-end">Tambah pemasukan</button>
          </div>
      </div>
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
</div>
@endsection