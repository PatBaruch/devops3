@extends('layouts.app')

@section('content')
    <h1>{{ $item->name }}</h1>
    <p>{{ $item->description }}</p>
    <a href="{{ route('items.edit', $item) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
