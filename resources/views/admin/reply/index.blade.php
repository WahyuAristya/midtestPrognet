@extends('layouts.admin.dashboard')
@section('content')

<div class="container-fluid">
    <!-- table produk -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong>Raply</strong></h4>
                    <div class="card-tools">
                        {{-- <a href="/admin/dashboard" class="btn btn-sm btn-danger">
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
                                    <th scope="col">Reply</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($replys as $reply)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $reply->keluhan->user->name}}</td>
                                    <td>{{ $reply->keluhan->keluhan}}</td>
                                    <td>{{ $reply->reply}}</td>
                                    <td>
                                        <a href="/admin/reply/{{ $reply->id }}/edit"
                                            class="badge bg-warning nav-link">Edit Reply</a>
                                            <form action="/admin/reply/{{ $reply->id }}" method="post" class="d-inline">
                                              @method('delete')
                                              @csrf
                                              <button class="badge bg-danger nav-link border-0" onclick="return confirm('Yakin Mau Hapus? ')">Delete Reply</button>
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
