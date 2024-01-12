@extends('layouts.page')

@section('page_header', 'Create Author')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form action="{{ route("authors.store") }}" enctype="multipart/form-data"
                  class="mt-5 bg-white border border-secondary p-4 rounded" method="POST">

                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="exampleFormControlInput1">Name</label>
                    <input
                        class="form-control" type="text"
                        placeholder="Name" name="name" value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1">Surname</label>
                    <input
                        class="form-control form-control-solid" type="text"
                        placeholder="Surname" name="surname" value="{{ old("surname") }}">
                </div>

                <div class="card-footer d-flex mt-5">
                    <button type="submit" class="btn btn-outline-primary">
                        Create
                    </button>
                    <div class="btn-group btn-group-toggle ml-auto" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="status" value="1"
                                   @if (old('status') === '1' || old('status') === null) checked @endif>Active
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="status" value="0" @if (old('status') === '0') checked @endif>Deaktiv
                        </label>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
