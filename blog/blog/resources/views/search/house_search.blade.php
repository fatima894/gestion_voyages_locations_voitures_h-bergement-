@extends('layouts.offer_layouts')

@section('content')
    <section class="first-section">

        <div class="row">
            <div class="col-6 p-5 mt-5">
                <h1 class="display-5 animated fadeIn mb-4"> Trouver <span class="text"
                        style="color: rgb(53, 219,219)">Meilleur hébergement</span> pour vivez avec votre famille .</h1>
                <p class="animated fadeIn mb-4 pb-2">C'est très simple de trouver un super appartements ,villas et hotels avec
                    ZRelaX voyages . Plus de choix, plus de destinations.</p>
            </div>
            <div class="col-6">
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
            <img src="./img/property-6.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block ">

        </div>
          </div>
          <div class="carousel-item">
            <img src="./img/header1.jpg" class="d-block w-100 h-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/hotel-3.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/property-3.jpg" class="d-block w-100" alt="...">
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
        <form method="post" action="/houses_results">
            {{ csrf_field() }}
            <div class="row">

                <div class="col-10 row">

                    <div class="col-3">
                        <input class="form-control border-0 py-3" type="text" name="which_city"
                            placeholder="Where are you going?">
                    </div>

                    <div class="col-3">
                        <select class="form-select border-0 py-3" name="house_type" id="">
                            <option value="1">Hotel</option>
                            <option value="2">Appartement</option>
                            <option value="3">Villa</option>
                        </select>

                    </div>

                    <div class="col-3 check-date">
                        <label class="check_in_date" for="check_in_date">La date de réception</label>
                        <input class="form-control border-0 py-3" type="date" name="check_in_date" id="check_in_date">

                    </div>

                    <div class="col-3 check-date">
                        <label class="check_in_date" for="check_out_date">La date de retour</label>
                        <input class="form-control border-0 py-3" type="date" name="check_out_date" id="check_out_date">
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
                        <img class="img-fluid w-100 " src="img/property-6.jpg">
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
                                <div class="icons">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                            </div>
                            <h4>Appartement</h4>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="cat-item d-block bg-light text-center rounded p-3">
                        <div class="rounded p-4 icon-bg">
                            <div class="icon mb-3">
                                <div class="icons">
                                    <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                                </div>
                            </div>
                            <h4>Villa</h4>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="cat-item d-block bg-light text-center rounded p-3">
                        <div class="rounded p-4 icon-bg">
                            <div class="icon mb-3">
                                <div class="icons">
                                    <img class="img-fluid" src="img/hotel.png" alt="Icon">
                                </div>
                            </div>
                            <h4>Hotel</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="third-section p-3 text-center">


        <div>
            <div class="row p-4 m-5" >
                @foreach ($showhouse as $room)
                    <div class="col-4" style="padding-bottom: 25px">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ asset('/storage/images/' . $room->photo) }}" alt="" class="img-100">
                                <div
                                    class="bg-white rounded-top txt-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                    {{ $room->name }}</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="txt-primary mb-3">DH {{ number_format($room->price, 2) }}/jr</h5>
                                <a class="d-block h5 mb-2 txt-secondray">{{ $room->house_info_name }}</a>
                                <p><i class="fa fa-map-marker-alt txt-primary me-2"></i>{{ $room->street_name }},
                                    {{ $room->city_name }}, {{ $room->country_name }}</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-ruler-combined txt-primary me-2"></i>{{ $room->room_size }}
                                    Sqft</small>
                                <small class="flex-fill text-center  py-2"><i
                                        class="fa fa-bed txt-primary me-2"></i>{{ $room->persons_per_room }} Bed</small>
                                <small class="flex-fill text-center"><a class="btn btn-su btn-lg btn-block select-id"
                                        data-room_id="{{$room->room_id}}"
                                        data-price="{{$room->price}}"
                                        >select</a></small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>



    <!-- Modal -->
<div class="modal fade" id="pageModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" method="post" action="">
                    {{ csrf_field() }} {{-- bach yet2aked anno lli rssel les infos
                howa men form mertabet belprojet=>token --}}
                <label class="check_in_date" for="check_in_date">La date de réception</label>
                <input class="form-control border-0 py-3" type="date" name="check_in_date" id="check_in_date1" required>
                <label class="check_in_date" for="check_out_date">La date de libération</label>
                <input class="form-control border-0 py-3" type="date" name="check_out_date" id="check_out_date1" required>
                <input type="hidden" id="room_id" name="room_id" value="">
                <input type="hidden" id="price" name="price" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">

$(function () {


                $('body').on('click', '.select-id', function () {

                $('#form').trigger("reset");
                var room_id = $(this).data('room_id');

                $.get('/reserve_hotel/getdata/'+ room_id, function (data) {

                    var room_id = data[0].room_id ;
                    var price = data[0].price ;
                    $('#room_id').val(room_id) ;
                    $('#price').val(price) ;
                    $('#modelHeading').html("Ajoutez les détails suivants");
                    $("#form").attr("action", "/reserve_hotel/store");
                    $('#pageModel').modal('show');


                })

                });




});

</script>



























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

        document.getElementById('check_in_date').value = getDate();


        function getDatePlusOne() {
            var d = new Date();
            d.setDate(d.getDate() + 1);

            var month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }


        document.getElementById('check_out_date').value = getDatePlusOne();
    </script>
@endsection
