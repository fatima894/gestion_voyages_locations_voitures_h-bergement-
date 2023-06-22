@extends('layouts.offer_layouts')

@section('content')


<section class="first-section">

<div class="row">
  <div class="col-6 p-5 mt-5">
    <h1 class="display-5 animated fadeIn mb-4">Trouver <span class="text" style="color: rgb(53, 219, 219)">Meilleur <br> vol</span> pour voyager avec votre famille .</h1>
                    <p class="animated fadeIn mb-4 pb-2">C'est très simple de trouver un super voyage avec ZRelaX voyages . Plus de choix, plus de destinations.</p>
  </div>
  <div class="col-6" >
    <!-- *****************************************************************************************  -->
 <!--  Start carusal  -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>

        </div>
        <div class="carousel-inner"  style=" width:100%; height: 100% !important;">
          <div class="carousel-item active">
            <img src="./img/bg_1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block ">

        </div>
          </div>
          <div class="carousel-item">
            <img src="./img/destination-4.jpg" class="d-block w-100 h-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/destination-2.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/bg_4.jpg" class="d-block w-100" alt="...">
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
  </div>
</div>

</section>

<section class="second-section mb-5">
  <form method="post" action="/flights_results">
    {{ csrf_field() }}

  <div class="row">



    <div class="col-10 row">
      <div class="col-4">
          <input class="form-control border-0 py-3" type="text" name="where_from" id="where_from" placeholder="Where from?">
      </div>
      <div class="col-4">

          <input class="form-control border-0 py-3" type="text" name="where_to" placeholder="Where to?">
      </div>
      <div class="col-4">
          <input class="form-control border-0 py-3" type="date" name="date" id="the-date">
      </div>
      </div>


      <div class="col-2 second-section-button">
          <button class="btn btn-dark border-0 w-100 py-3" type="submit">Chercher</button>
      </div>


    </div>



    </form>

</section>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="about-img position-relative p-5 pe-0 ">
                    <img class="img-fluid w-100 " src="img/balisa.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <h1 class="mb-4"> Endroit Pour Trouver La Propriété Parfaite.</h1>
                <p class="mb-4">Trouver l'endroit idéal pour ses vacances n'est pas toujours une mince
                    affaire.
                    Que l'on parte en voyage à Paris, à Marrakech, à Deauville ou à Amsterdam, c'est toujours le
                    même problème . Heureusement, grâce à notre application ,
                    il est aujourd'hui possible de trouver les meilleures offres d'hôtels et de comparer les prix et
                    équipements en toute simplicité, depuis son ordinateur ou son smartphone. Découvrez maintenant
                    comment trouver l'hébergement idéal avec ZRelaX voyages !</p>
                <p><i class="fa fa-check text-primary me-3"></i> il faut trouver un logement au centre-ville afin de
                    pouvoir facilement découvrir la ville .</p>
                <p><i class="fa fa-check text-primary me-3"></i> une chambre confortable pour pouvoir bien dormir.
                </p>
                <p><i class="fa fa-check text-primary me-3"></i>Gagner du temps dans la préparation de vos vacances
                    avec le Meilleur prix </p>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Type de propriété</h1>
            <p>Vous Êtes toujours à la recherche de l'hébergement idéal ?
                Découvrez plus d'oprions uniques pour votre séjour.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="cat-item d-block bg-light text-center rounded p-3">
                    <div class="rounded p-4 icon-bg">
                        <div class="icon mb-3">
                            <div class="icons" >
                                <img class="img-fluid" src="img/vorgan.png" alt="Icon">
                            </div>
                        </div>
                        <h4>VOYAGES ORGANISÉS</h4>
                        <h6>Notre agence de voyages située à Kénitra est dédiée à l’organisation des hotels et circuits au Maroc et à l'étranger.</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="cat-item d-block bg-light text-center rounded p-3">
                    <div class="rounded p-4 icon-bg">
                        <div class="icon mb-3">
                            <div class="icons" style="width: 140px">
                                <img class="img-fluid" src="img/icon.jpg" alt="Icon">
                            </div>
                        </div>
                        <h4>ACCOMPAGNONS</h4>
                        <h6>Notre équipe est à votre disposition pour vous accompagner et faire de vos vacances des moments agréables.</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="cat-item d-block bg-light text-center rounded p-3">
                    <div class="rounded p-4 icon-bg">
                        <div class="icon mb-3">
                            <div class="icons" style="width: 140px">
                                <img class="img-fluid" src="img/omra1.jpg" alt="Icon">
                            </div>
                        </div>
                        <h4>HAJJ OMRA</h4>
                        <h6>Zrelax Voyages vous propose durant le mois de février un pèlerinage religieux <br> à un prix imbattable. </h6>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="third-section p-3 text-center">

    <div>
        <div class="row p-4 " >
            @foreach ($showTravels as $travel)

                <div class="col-4 p-2">
                    <a href="/reserve_flight/{{$travel->travel_detail_id}}/{{$travel->price}}">
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('/storage/images/' . $travel->photo) }}" alt="" class="img-100">
                            <div class="bg-white rounded-top txt-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"> {{ $travel->to_city }}</div>
                        </div>
                        <div class="p-4 pb-0">
                            <h5 class="txt-primary mb-3">DH {{ number_format($travel->price, 2) }}/personne</h5>
                            <h5 class="txt-secondray mb-3">{{ $travel->travel_date }}</h5>
                            <p><i class="fa fa-map-marker-alt txt-primary me-2"></i>{{ $travel->f }}, {{ $travel->from_city }}, {{ $travel->from_counrty }}</p>
                        </div>

                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


<div class="logos">

            <img  src="./img/logos.png" alt="">

</div>


<script>

  function getDate() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

document.getElementById('the-date').value = getDate();

</script>
@endsection
