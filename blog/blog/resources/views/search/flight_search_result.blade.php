@extends('layouts.offer_layouts')

@section('content')

    <div class="container result-page">


        @foreach ($data as $detail)

                <div class="ticket property-item my-4">
                        <div class="ticket-image">
                            <img src="{{ asset('/storage/images/'.$detail->photo) }}" alt="">
                        </div>
                        <div class="ticket-time-from" style="padding-right: 30px">
                        {{ substr($detail->travel_time,0,-3)}}
                        </div>
                        <div class="ticket-time-to"style="padding-right: 30px">
                        {{ substr($detail->reach_time,0,-3)}}
                        </div>
                        <div class="ticket-airport-from" style="padding-right: 40px">
                        {{ $detail->f}}
                        </div>
                        <div class="ticket-airport-to " style="padding-right: 30px">
                        {{ $detail->t}}
                        </div>

                        <div class="ticketPrice" >
                        DH{{ number_format($detail->price, 2) }}
                        </div>
                        <div class="ticket-button second-section-button">
                            <a href="/reserve_flight/{{$detail->travel_detail_id}}/{{$detail->price}}"
                            class="btn btn-dark border-0 w-100 py-3" type="submit">Select</a>
                        </div>
                </div>



            @endforeach




@if (count($data) === 0)
<div class="nothing-found">
<p>Nothing is found ;(</p>
</div>
@endif


    </div>

@endsection
