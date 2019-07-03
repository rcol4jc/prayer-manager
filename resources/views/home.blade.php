@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>My Requests:</h3>
                    <ol>
                        @foreach ($myRequests as $item)
                    <li><a href="{{ route('request.show', $item->id)}}">{{$item->title}}</a></li>
                        @endforeach
                    </ol>
                        <a class="btn btn-primary" href="{{ route('request.new') }}">Add new Request</a>

                    <h3>Public Requests</h3>
                    <ol>
                        @foreach ($publicRequests as $item)
                        <li><a href="{{ route('request.show', $item->id)}}">{{$item->title}}</a></li>
                        @endforeach
                    </ol>

                    <h3>My Responses</h3>

                    <ol>
                        @foreach ($myResponses as $item)
                    <li><a href="{{route('request.show', $item->prayerrequest->id)}}">{{$item->details}}</a></li>
                        @endforeach
                    </ol>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
