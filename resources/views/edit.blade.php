@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Tugas</h2>

        <form action="{{ route('todolist.update', $todolist->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $todolist->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description">{{ $todolist->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="completed">Status:</label>
                <select class="form-control" id="completed" name="completed">
                    <option value="0" {{ !$todolist->completed ? 'selected' : '' }}>Belum Selesai</option>
                    <option value="1" {{ $todolist->completed ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
