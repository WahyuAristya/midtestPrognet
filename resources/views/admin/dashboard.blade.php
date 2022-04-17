@extends('layouts.admin.dashboard')
@section('content')

<div class="container-fluid">
    <!-- table produk -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong>Layanan Keluhan</strong></h4>
                    <div class="card-tools">
                        {{-- <a href="/dashboard" class="btn btn-sm btn-danger">
              More
            </a> --}}
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="table-responsive col-lg-auto">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Keluhan</th>
                                    <th scope="col">Admin Reply</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhans as $keluhan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keluhan->user->name}}</td>
                                    <td>{{ $keluhan->keluhan}}</td>
                                    <td>{{ $keluhan->reply->reply}}</td>
                                    <td>
                                        <a href="/admin/reply/{{ $keluhan->reply->id }}/edit"
                                            class="badge bg-warning nav-link">Reply Keluhan</a>
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
