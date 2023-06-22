@extends('layouts.offer_layouts')

@section('content')
    
    <div class="container">
      
    
   

        @foreach ($data as $detail)
         
         <div class="row car-r-container">
            <div class="col ">
            <h4>{{$detail->car_company_name}}</h4>
            <img src="{{ asset('/storage/images/'.$detail->photo) }}" alt="">
            </div>
            <div class="col">
            <p> pickup at : {{$detail->street_name}}, {{$detail->city_name}}</p> 
            </div>
            <div class="col price">
            <p> €{{$detail->price}}</p>
            <a href="/reserve_car/{{$detail->car_id}}/{{$request->pick_up_date}}/{{$request->pick_up_time}}/{{$request->return_date}}/{{$request->return_date_time}}/{{$detail->price}}" >select</a>
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