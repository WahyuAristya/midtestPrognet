@extends('layouts.user.dashboard')
@section('content')

<div class="container-fluid">
    <!-- table produk -->
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
                    <div class="table-responsive col-lg-auto">
                        <a href="/keluhan/create" class="btn btn-primary my-3"> Create new keluhan</a>
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhans as $keluhan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keluhan->keluhan}}</td>
                                    <td>
                                        <a href="/keluhan/{{ $keluhan->id }}/edit"
                                            class="badge bg-warning nav-link">Edit</a>
                                        
                                            <form action="/keluhan/{{ $keluhan->id }}" method="post" class="d-inline">
                                              @method('delete')
                                              @csrf
                                              <button class="badge bg-danger nav-link border-0" onclick="return confirm('Yakin Mau Hapus? ')">Delete</button>
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
    </div>
</div>
@endsection
