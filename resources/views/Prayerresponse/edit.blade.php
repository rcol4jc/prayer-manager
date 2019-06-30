@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6 col-sm-6 mx-auto">
                <div class="card">
                    <div class="card-header">Edit Response</div>
                        <div class="card-body">
                            <form action="{{ route('response.save', $prayerresponse->id) }}" class="form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="details">Content:</label>
                                    <input type="text" name="details" id="details" class="form-control @error('details') is-invalid @enderror"
                                    value="{{ $prayerresponse->details }}" autofocus>
                                    @error('details')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Save Changes"/>
                                </div>
                            </form>
                        </div>
                </div>

                <div class="card text-white bg-warning mt-4">
                    <div class="card-header text-white bg-danger">Delete Response</div>
                        <div class="card-body">
                        <form action="{{ route('response.delete', $prayerresponse->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <input type="submit" id="delete_response" class="btn btn-danger" value="Click to Delete Response"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
