@extends('../layouts/bendahara')
@section('content')
<div class="page-heading">
    <h3>Pemasukan Uang Kas</h3>
</div>
<div class="page-content">
  <div class="card">
    <div class="card-header"> 
      <div class="row justify-content-between">
        <div class="col-4">Riwayat Pemasukan</div>
          <div class="col-4">
              <a href="{{ route('tambah-pemasukan') }}" class="btn btn-outline-success float-end">Tambah pemasukan</a>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($kas as $item)
              <tr>
                  <td>{{ $item->anggota->nama }}</td>
                  <td>{{ rupiah($item->nominal) }}</td>
                  <td>{{ date_format($item->created_at,'Y-m-d, D H:i') }}</td>
                  <td class="d-inline-block">
                    <a href="{{ route('edit-pemasukan', $item->id) }}" class="btn btn-sm btn-primary me-2">Edit</a>
                    <form method="POST" action="{{ route('hapus-pemasukan', $item->id) }}" class="float-end">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button type="submit" class="btn btn-danger btn-sm me-1 mb-1">Hapus</button>
                    </form>
                  </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
</div>

<script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
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