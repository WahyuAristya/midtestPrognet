@extends('layouts.user.dashboard')
@section('content')

<div class="container-fluid">  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Keluhan</strong></h4>
          <div class="card-tools">
            {{-- <a href="/produk" class="btn btn-sm btn-danger">
              More
            </a> --}}
          </div>
        </div>
        <div class="container-fluid">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create new Keluhan</h1>
        </div>
        
        <div class="col-lg-8">
            <form method="post" action="/keluhan" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="keluhan" class="form-label">Keluhan</label>
                  <input type="text" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" autofocus value="{{ old('keluhan') }}">
                  @error('keluhan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                
               
                <button type="submit" class="btn btn-primary mb-3">Create Post</button>
              </form>
        </div>
        

        </div>

      </div>
    </div>
  </div>
</div>
<script>
  document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
  })
</script>
@endsection