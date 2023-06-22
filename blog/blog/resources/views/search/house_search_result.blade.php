@extends('layouts.offer_layouts')

@section('content')

    <div class="container result-page">


   <h2 class="my-5 fw-bold">{{$city}} : {{count($data)}} properties found </h2>

<section class="third-section p-3">
    <div>
        <div class="row">

        @foreach ($data as $room)

            <div class="col-4">
                <div class="property-item rounded overflow-hidden">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('/storage/images/'.$room->photo) }}" alt="" class="img-100">
                        <div class="bg-white rounded-top txt-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $room->name }}</div>
                    </div>
                    <div class="p-4 pb-0">
                        <h5 class="txt-primary mb-3">DH {{ number_format($room->price, 2) }}</h5>
                        <a class="d-block h5 mb-2 txt-secondray" href="#">{{ $room->house_info_name }}</a>
                        <p><i class="fa fa-map-marker-alt txt-primary me-2"></i>{{ $room->street_name }}, {{ $room->city_name }}, {{ $room->country_name }}</p>
                    </div>
                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined txt-primary me-2"></i>{{ $room->room_size }} Sqft</small>
                        <small class="flex-fill text-center  py-2"><i class="fa fa-bed txt-primary me-2"></i>{{ $room->persons_per_room }} Bed</small>
                        <small class="flex-fill text-center"><a class="btn btn-su btn-lg btn-block"
                        href="/reserve_hotel/{{$room->room_id}}/{{$request->check_in_date}}/{{$request->check_out_date}}/{{$room->price}}"
                        >select</a></small>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>



      @if (count($data) === 0)
              <div class="nothing-found">
                   <p>Nothing is found ;(</p>
             </div>
       @endif
    </div>

@endsection
