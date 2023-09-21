@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Tugas</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Tambah Tugas Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Selesai' : 'Belum Selesai' }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Anda yakin ingin menghapus tugas ini?')">Hapus</button>
                            </form>
                        </td>
                        <td>
                            <input type="checkbox" id="task_{{ $task->id }}" name="completed[]"
                                value="{{ $task->id }}" {{ $task->completed ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
