@extends('layouts.page')

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Yazar: {{ $author->fullName }}</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <td class="font-weight-bold">Name</td>
                    <td>{{ $author->name }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Surname</td>
                    <td>{{ $author->surname }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Status</td>
                    <td>
                        @if($author->status)
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
                   href="{{ route('authors.edit', ['author' => $author->id]) }}">
                    <i class="fas fa-pen"></i>
                </a>
                <form method="POST" class="d-inline" onsubmit="Helpers.deleteAuthor(event, 'Author')">
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
