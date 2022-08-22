@extends('../layouts/bendahara')
@section('content')
<div class="content-wrapper container">    

    <div class="page-heading mt-5">
        <h3>Edit pemasukan</h3>
    </div>
    <div class="page-content">
      <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" method="POST" action="{{ route('update-pemasukan', $kas->id) }}">
                      @csrf
                      @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="anggota">Nama</label>
                                        <select class="choices form-select" name="anggota_id" id="anggota" required>
                                          <option> -- Pilih anggota -- </option>
                                          @foreach ($anggota as $a)
                                            <option value="{{ $a->id }}" {{ $kas->anggota_id == $a->id ? 'selected' : '' }}>{{ $a->nama }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="nominal">Nominal</label>
                                        <input type="number" class="form-control" name="nominal" value="{{ $kas->nominal }}" id="nominal" required/>
                                    </div>
                                </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('pemasukan') }}" class="btn btn-secondary me-1 mb-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  </div>

  
  <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
  <script src="{{ asset('assets/js/pages/form-element-select.js') }}"></script>
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