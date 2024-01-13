@extends('layouts.page')

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Yazar: {{ $book->nameversion }}</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="font-weight-bold">Name</td>
                    <td>{{ $book->name }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Version</td>
                    <td>{{ $book->surname }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Status</td>
                    <td>
                        @if($book->status)
                            <span class="badge badge-success">{{ __("Active") }}</span>
                        @else
                            <span class="badge badge-danger">{{ __("Deactive") }}</span>
                        @endif

                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="card-footer">
            <div class="card-tools">
                <a class="btn btn-sm btn-primary"
                   href="{{ route('books.edit', ['book' => $book->id]) }}">
                    <i class="fas fa-pen"></i>
                </a>
                <form method="POST" class="d-inline" onsubmit="Helpers.deleteAuthor(event, 'Book')">
                    @csrf
                    @method('DELETE')
                    <button class="d-inline-block bg-danger btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
