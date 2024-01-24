@extends('layout.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Informasi kepegawaian</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('pegawai.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nama pegawai</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="col-md-6">
                            <label>tanggal lahir</label>
                            <input type="date" class="form-control" name="ttl">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>phone</label>
                            <input type="text" class="form-control" name="no_hp">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama pegawai</th>
                        <th scope="col">Tanggal lahir</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $Pegawai as $key => $pegawai )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $pegawai->nama }}</td>
                            <td scope="col">{{ $pegawai->ttl }}</td>
                            <td scope="col">{{ $pegawai->no_hp }}</td>
                            <td scope="col">

                            <a href="{{  route('pegawai.edit', $pegawai->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush