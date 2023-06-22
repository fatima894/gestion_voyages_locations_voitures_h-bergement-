@extends('customer.customer_dashboard')


@section('main_section')
 <div class="d-flex mt-3 justify-content-between">
 <h3 > <b>Voici les voitures réservés</b> </h3>
 <h3 >Total:  {{$total_price * 1.2}} DH</h3>
</div>


<div class="p-5">


@foreach ($data as $detail)
   <div class="ticket-container">

       <div class="car-first-section">

       <img src="{{ asset('/storage/images/'.$detail->photo) }}" alt="" class="car-img">

            <div class=" p-4">
            <h4 class="room-name">{{$detail->car_company_name}}</h4>
            <p> Location : {{$detail->street_name}}, {{$detail->city_name}}</p>
            <p> La date de réservation : {{$detail->pickup_date}}, {{$detail->pickup_time}}</p>
            <p> La date de retour : {{$detail->return_date}}, {{$detail->return_time}}</p>
            
            </div>

       </div>
       <div class="ticket-price-section">
            <form class ="PayPal-form"action="{{route('paypal_call')}}" method="post">
               @csrf
            <input type ="hidden" name ="record_id" value ="{{ $detail->car_reservation_id}}" />
            <input type ="hidden" name ="type" value ="car" />
            <input type ="hidden" name ="price" value ="{{$detail->reservation_price * 1.2}}" />
            <button type="submit" class="PayPal-btn">Pay<span>Pal</span></button>

            </form>
            <a href="/reserve_car_cancel/{{ $detail->car_reservation_id}}"  class="cancelled-btn">Annulation de réservation</a>
            <p class="ticket-price"> {{$detail->reservation_price * 1.2}} DH</p>
         </div>

      </div>


@endforeach





</div>



@endsection

