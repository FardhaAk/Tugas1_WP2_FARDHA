@extends('components.layout')
@section('title', 'Mahasiswa')
<div class="container-fluid">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h2 class="text-dark m-0">Data Mahasiswa</h2>
        </div>
    </div>
</div>
@section('content')
    <div class="box-header with-border">
        <a href="/students/tambah" class="btn btn-success btn-xs btn-flat"><i class="fa faplus-circle"></i>
            Tambah Data
        </a>
    </div>
    <br>
    <div class="box-body table-responsive">
        <table class="table-stiped table-bordered table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th width="20%"><i class="fas fa-cog">Action</i></th>
                </tr>
            </thead>
            @foreach ($dosen as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->keilmuan }}</td>
                    <td>
                        <a href="{{ route('lecturers.show', [$item->id]) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('lecturers.edit', [$item->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form class="d-inline" action="{{ route('lecturers.destroy', [$item->id]) }}" method="POST"
                            onsubmit="return confirm('Yakin hapus data?')">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $mhs->links() }}
@endsection
