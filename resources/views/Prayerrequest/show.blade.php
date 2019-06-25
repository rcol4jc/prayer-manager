@extends('layouts.app')

@section('content')
    div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header"><h2>{{ $prayerrequest->title }}</h2></div>
                <div class="card-body">
                    <p class="card-text" style="font-size:1.5rem;">{{ $prayerrequest->details }}</p>
                    <div class="text-right">
                        <a class="btn btn-primary" href="{{ route('request.showPartners', $prayerrequest->id) }}">
                            People Praying <span class="badge badge-dark">{{ count($prayerrequest->prayerpartners) }}</span></a>

                        @if(count($prayerrequest->prayerpartners->where('user_id',$user->id)->where('prayerrequest_id',$prayerrequest->id))==0)

                            <form class="d-inline" action="{{route('request.pray',$prayerrequest->id)}}" method="post">
                                <input class="btn btn-primary" type="submit" value="Pray"/>
                            </form>

                        @else
                                <button disabled class="btn btn-secondary">You are already praying</button>
                            @endif




                    @if($prayerrequest->user_id == $user->id)
                            <a class="btn btn-primary" href="{{ route('request.edit', $prayerrequest->id) }}">Edit</a>
                    @endif
                    </div>



                </div>

            </div>

            @if(count($prayerrequest->prayerresponses) > 0)
                <div class="mt-5" id="show_prayer_responses">
                    <div class="card mt-3" style="padding: 1rem;">
                        <h4 class="card-title">Responses: </h4>
                        @foreach($prayerrequest->prayerresponses as $prayerresponse)
                            <p style="font-size: 1.2rem;" class="card-text mt-1">{{ $prayerresponse->details }}
                                @if($prayerresponse->user_id==$user->id)
                                    <a href="{{ route('response.edit',$prayerresponse->id) }}">Edit</a>
                                @endif
                            </p>
                            <hr/>

                        @endforeach
                    </div>
                </div>
            @endif
            <div class="card mt-5">
                <div class="card-header"><h4>Add a response</h4></div>
                <div class="card-body">
                    <form action="{{route('response.save', $prayerrequest->id)}}" class="form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="details">Response: </label>
                            <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror">{{ old('details') }}</textarea>
                            @error('details')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="private">Mark Private? </label>
                            <input type="checkbox" name="private" id="private" checked/>
                        </div>
                        <div class="form-group text-right">
                            <input type="submit" class="btn btn-primary" value="Save Response">
                        </div>

                    </form>

                </div>
            </div>
        </div>


    </div>
@endsection
