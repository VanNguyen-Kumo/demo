@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('home') }}" class="text-sm text-gray-700 underline card-header">Home</a>
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.importCSV-user') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <input type="file" name="csv" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Import') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
