@extends('../layouts/absensi')
@section('content')
<div class="content-wrapper container">    
    <div class="page-heading mt-5">
        <h3>Absensi KKN Desa Suradita</h3>
    </div>
    <div class="page-content">
      <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="/absensi">
                      @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Nama</label>
                                        <select class="choices form-select multiple-remove" name="names[]" multiple="multiple">
                                            <option value> -- Pilih anggota -- </option>
                                            @foreach ($anggota as $a)
                                                <option value="{{ $a->id }}">{{ $a->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="datetime-local" class="form-control" name="tanggal" required/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Status</label>
                                        <div class="form-check form-check-primary">
                                            <input class="form-check-input" type="radio" name="status" id="hadir" value="hadir">
                                            <label class="form-check-label" for="hadir">
                                                Hadir
                                            </label>
                                        </div>
                                        <div class="form-check form-check-warning">
                                            <input class="form-check-input" type="radio" name="status" id="sakit" value="sakit">
                                            <label class="form-check-label" for="sakit">
                                                Sakit
                                            </label>
                                        </div>
                                        <div class="form-check form-check-danger">
                                            <input class="form-check-input" type="radio" name="status" id="izin" value="izin">
                                            <label class="form-check-label" for="izin">
                                                Izin
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12" id="alasan" hidden>
                                  <div class="form-group">
                                      <label for="alasan" class="form-label">Alasan</label>
                                      <textarea class="form-control" id="alasan" name="alasan" rows="3" style="resize: none;"></textarea>
                                  </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensi as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('M d, l, H:i') }}</td>
                        <td>{{ $item->anggota->nama }}</td>
                        <td><span class="badge bg-{{ $item->status != 'hadir' ? 'danger' : 'success' }}">{{ ucfirst($item->status) }}</span></td>
                        <td>
                            <form method="POST" action="{{ route('hapus-absen', $item->id) }}">
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
</div>

  <script src="assets/extensions/toastify-js/src/toastify.js"></script>
  <script>
    const alasan = document.querySelector('#alasan')
    const textArea = document.querySelector('textarea')
    document.querySelectorAll('[name=status]').forEach(x => {
    x.addEventListener('click', (e) => {
        if (e.target.id !== "hadir"){
            alasan.hidden = false;
            textArea.required = true;
            return;
        }

        alasan.hidden = true;
        textArea.required = false;
    })
})
  </script>

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