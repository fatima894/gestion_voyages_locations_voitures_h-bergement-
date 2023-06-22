@extends('customer.customer_dashboard')


@section('main_section')
 <div class="d-flex mt-3 justify-content-between">
 <h2 > <b> Voici tes vols réservés</b></h2>
 <h3 >Total:  {{$total_price * 1.2}} DH</h3>
</div>


<div class="p-5">


@foreach ($data as $detail)

<div class="ticket-container">

                <div class="flight-first-section">
                    @php
                    $months = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];
                @endphp
                <div class="mb-1"><h1  style="text-align: center">{{ (int) substr($detail->travel_date, 8) }}{{ $months[(int) substr($detail->travel_date, 5, 2)] }}</h1></div>
                   <div class="from">
                   <p class="travel-time">{{ $detail->travel_time}}</p>
                   <p>{{ $detail->f}}</p>
                   <p>{{ $detail->from_city}}</p>
                   </div>

                   <div class="to">
                   <p class="travel-time">{{ $detail->reach_time}}</p>
                   <p>{{ $detail->t}}</p>
                   <p>{{ $detail->to_city}}</p>

                   </div>


                </div>
                <div class="ticket-price-section">
                <form class ="PayPal-form"action="{{route('paypal_call')}}" method="post">
                  @csrf
                 <input type ="hidden" name ="record_id" value ="{{ $detail->flight_reservation_id}}" />
                 <input type ="hidden" name ="type" value ="flight" />
                 <input type ="hidden" name ="price" value ="{{$detail->reservation_price * 1.2}}" />
                 <button type="submit" class="PayPal-btn">Pay<span>Pal</span></button>
                 </form>
                    <a href="/reserve_flight_cancel/{{ $detail->flight_reservation_id}}" class="cancelled-btn" >Annulation de réservation</a>
                    <p class="ticket-price">{{ number_format($detail->reservation_price * 1.2 , 2) }} DH</p>
                </div>
            </div>



@endforeach





</div>



@endsection
