@extends('layouts.user.dashboard')
@section('content')

<div class="container-fluid">  <!-- table produk -->
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><strong>Keluhan</strong></h4>
          <div class="card-tools">
            {{-- <a href="/keluhan" class="btn btn-sm btn-danger">
              More
            </a> --}}
          </div>
        </div>
        
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <article class="my-3">
                        <h2>{{ $keluhans->keluhan }}</h2>
                        <p>By <a href="/keluhan/{{ $keluhans->keluhan }}"
                                class="text-decoration-none">{{ auth()->user()->admin_name }}</a> In Keluhan
                            <a class="text-decoration-none"
                                href="/reply/{{ $replies->reply }}">{{ $replies->reply }}</a>
                        </p>
                    </article>
                    <div class="my-3 fs-5">
                        <a href="/dashboard"> Back to Products</a>
                    </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection