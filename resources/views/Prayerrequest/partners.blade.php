@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Users praying for this request</h3>
                </div>
                <div class="card-body">
                    <ol>
                        @foreach ($prayerrequest->prayerpartners as $partner)
                        <li>{{ $users->where('id',$partner->user_id)->first()->name}}</li>
                        @endforeach
                    </ol>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection
