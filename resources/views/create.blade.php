@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Tugas Baru</h2>

        <form action="{{ route('todolist.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
