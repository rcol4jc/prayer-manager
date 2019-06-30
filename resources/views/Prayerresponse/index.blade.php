@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 col-sm-8 mx-auto">
            <div class="card">
                <div class="card-header"><h2>My responses</h2></div>
                <div class="card-body">
                    <div class="card-title"><h2>Responses with Request</h2></div>
                    @foreach ($myResponses as $item)

                        <h5>Request:</h5>
                            <a href="{{route('request.show',$item->prayerrequest->id)}}">{{$item->prayerrequest->title}}</a>
                        <h5>Response:</h5>
                        <p>{{$item->details}} <a href="{{route('response.edit',$item->id)}}">edit</a>
                        <hr />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
