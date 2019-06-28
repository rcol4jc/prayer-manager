@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Your requests and public requests</h3>
                </div>
                <div class="card-body">
                    <h5>Your Prayer Requests</h5>
                        <ol>
                        @foreach ($prayerrequests as $request)
                            @if($request->user_id == $user->id)
                                <li><a href="{{route('request.show', $request->id)}}">{{ $request->title}}</a></li>
                            @endif
                        @endforeach
                        </ol>
                    <h5>Public Prayer Requests</h5>
                        <ol>
                            @foreach ($prayerrequests as $request)
                                @if($request->user_id != $user->id && !$request->private)
                                <li><a href="{{route('request.show', $request->id)}}">{{ $request->title}}</a></li>
                                @endif
                            @endforeach
                        </ol>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
