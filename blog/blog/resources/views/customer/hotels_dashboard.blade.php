@extends('customer.customer_dashboard')


@section('main_section')
 <div class="d-flex mt-3 justify-content-between">
 <h3 > <b> Voici tes hébergements réservés</b></h3>
 <h3 >Total:  {{$total_price * 1.2}} DH</h3>
</div>


<div class="p-5" >




@foreach ($data as $room)

<div class="ticket-container">
   <div class="house-first-section">
         <img src="{{ asset('/storage/images/'.$room->photo) }}" alt="">
         <div class="room-middle-section">
             <h3 class="room-name">{{ $room->house_info_name }}</h3>
             <p class="room-size">Dimensions de chambre: {{ $room->room_size }}  mm</p>
             <p class="room-address"> {{ $room->street_name }}</p>
             <p class="room-city"> {{ $room->city_name }}</p>
          </div>
   </div>




   <div class="ticket-price-section">

       <form class ="PayPal-form"action="{{route('paypal_call')}}" method="post">
                  @csrf
                 <input type ="hidden" name ="record_id" value ="{{ $room->house_reservation_id}}" />
                 <input type ="hidden" name ="type" value ="house" />
                 <input type ="hidden" name ="price" value ="{{$room->price * 1.2}}" />
                 <button type="submit" class="PayPal-btn">Pay<span>Pal</span></button>

                   </form>
       <a href="/reserve_hotel_cancel/{{ $room->house_reservation_id}}" class="cancelled-btn" >Annulation de réservation</a>

       <h4 >Pour {{ $room->persons_per_room }} personnes</h4>
       <h4> {{ number_format($room->price * 1.2 , 2) }} DH</h4>
  </div>
  </div>
@endforeach








</div>



@endsection
