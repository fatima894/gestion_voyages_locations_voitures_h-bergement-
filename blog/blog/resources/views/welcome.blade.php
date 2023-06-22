@extends('layouts.offer_layouts')

<style>
    h4 {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }

    .behind-fire {
        padding-left: 10px;
    }

</style>

@section('content')
<!--  Start carusal  -->

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>

    </div>
    <div class="carousel-inner mb-5" >
      <div class="carousel-item active">
        <img src="./img/c4.jpg" class="d-block w-100 h-80" alt="...">
        <div class="carousel-caption d-none d-md-block ">

    </div>
      </div>
      <div class="carousel-item">
        <img src="./img/c1.jpg" class="d-block w-100 h-80" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/c3.jpg" class="d-block w-100 h-80" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/c2.jpg" class="d-block w-100 h-80" alt="...">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


<!--  End carusal  -->
    <!-- Start About Section  -->

    <section>

        <div class="row ">

            <div class="col-lg-6 bg-about d-none d-lg-block"></div>
            <div class="col-lg-6 bg-gray py-5 col-sm-12">
                <div class="right-about">
                    <h1> <span class="orange-color">Zrelax</span> voyages</h1>
                    <p>Agence de voyage à Kénitra - Maroc vous propose une variété de choix de destinations afin de répondre
                        aux besoin de toute notre clientèle.

                        Zrelax voyages met aux services de ses clients son expérience, sa créativité et son
                        professionnalisme, en organisation et gestion du voyage. Et ce grâce à une approche personnalisée,
                        proposant des offres de qualité et adaptées à leurs besoins. Nos conseillers de voyages vous
                        proposeront de découvrir de nombreux circuits avec dates de départ garanties.

                        Zrelax voyages est aussi une agence spécialisée dans le voyage OMRA, en proposant des vols avec
                        prise en charge de l’ensemble des formalités administratives et logistiques pour vous garantir un
                        voyage spirituel en toute tranquillité.</p>

                </div>

            </div>


        </div>



    </section>

    <!-- End About Section  -->
    <div class="row ">

        <div class="row ">
            <div class="col-4">

            </div>
            <div class="col-1">
                <div class="text-center">
                    <div class="col-4">
                        <img src="img/fire.png" alt="" style="width: 110px">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="behind-fire">
                    <h1> <b> Prime</b></h1>
                    <h3>Meilleures offres</h3>
                    <h4 style="color: red">Vous ne trouverez ces prix qu'ici !</h4>
                </div>
            </div>

            <div class="col-3">

            </div>
        </div>


    </div>
    <div class="container">
        <div class="row">

            @foreach ($data as $offer)
                <div class="col-6 m-3 offer-card" style="width: 400px">
                    <a
                        href="/reserve_flight/{{ $offer->travel_id }}/{{ ($offer->price * $offer->discount_percentage) / 100 }}">
                        <img src="{{ asset('/storage/images/' . $offer->photo) }}" class="offer-card-img" alt="">
                        <div class="img-background"></div>
                        <div class="text-end">
                            @php
                                $months = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];
                            @endphp
                            <p class="mb-1">{{ (int) substr($offer->travel_date, 8) }}{{ $months[(int) substr($offer->travel_date, 5, 2)] }}</p>
                                <p class="mb-1 offer-card-txt">De {{ $offer->from_city }}</p>
                            <p class="mb-1 offer-card-txt">aaa  {{ $offer->to_city }}</p>
                            <p class="mb-1 badge rounded-pill offer-card-pill">-{{ 100 - $offer->discount_percentage }}%
                            </p>
                            <p class="mb-1 fs-5 price-color">DH<span class="fs-3 fw-bold"
                                    style="width: 40%">{{ number_format(($offer->price * $offer->discount_percentage) / 100, 2) }}</span><br><span
                                    class="text-decoration-line-through text-secondary ">DH{{ number_format($offer->price, 2) }}</span>
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
