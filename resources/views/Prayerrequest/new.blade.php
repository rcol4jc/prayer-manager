@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5 justify-content-center align-self-center">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header"><h3>Add a new prayer request</h3></div>
                <div class="card-body">
                    <form method="post" action="{{route('request.save')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title:</label>
                            <div class="col-md-6">
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror"
                                       name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="details" class="col-md-4 col-form-label text-md-right">Details:</label>
                            <div class="col-md-6">
                                <textarea id="details" class="form-control @error('details') is-invalid @enderror"
                                          name="details" required autocomplete="details" autofocus>{{ old('details') }}</textarea>
                                @error('details')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="enddate" class="col-md-4 col-form-label text-md-right">Expires On (Optional):</label>
                            <div class="col-md-6">
                                <input id="enddate" type="date" class="form-control @error('enddate') is-invalid @enderror"
                                       name="enddate" value="{{ old('enddate') }}" autocomplete="enddate" autofocus>
                                @error('enddate')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="private" class="col-md-4 col-form-label text-md-right">Is private: </label>
                            <div class="col-md-6">
                                <input id="private" type="checkbox" class="form-control @error('private') is-invalid @enderror"
                                       name="private" autocomplete="private" autofocus checked>
                                @error('private')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
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