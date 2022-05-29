@extends('buku.layout')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <form action="/buku" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="cari buku" name="cari">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="float-end">
                <a class="btn btn-success" href="{{ route('buku.create') }}"> Create New book</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>judul</th>
            <th>cover</th>
            <th>penulis</th>
            <th>penerbit</th>
            <th>tahun terbit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($buku as $b)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $b->judul }}</td>
            <td><img src="image/{{ $b->cover }}" style="width: 40px;"></td>
            <td>{{ $b->penulis }}</td>
            <td>{{ $b->penerbit }}</td>
            <td>{{ $b->tahun_terbit }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('buku.show',$b->id) }}">Show</a>
                <a class="btn btn-warning" href="{{ route('buku.edit',$b->id) }}">Edit</a>
                <a class="btn btn-danger confirm" href="#" data-id="{{ $b->id }}" data-judul="{{ $b->judul }}">delete</a>
                {{-- <form action="" method="POST">
                    <a class="btn btn-primary" href="{{ route('buku.show',$b->id) }}">Show</a>
                    <a class="btn btn-warning" href="{{ route('buku.edit',$b->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger confirm">Delete</button>
                </form> --}}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row text-center">
        {!! $buku->links('vendor.pagination.bootstrap-4') !!}
    </div> 
@endsection