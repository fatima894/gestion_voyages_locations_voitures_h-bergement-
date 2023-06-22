@extends('layouts.offer_layouts')

@section('content')

<section class="first-section">

<div class="row">
  <div class="col-6 p-5 mt-5">
    <h1>Profitez les <span class="text"
        style="color: rgb(53, 219,219)">meilleurs prix</span> de votre voiture à notre site</h1>
        <h3>Vous souhaitez louer une voiture à Kénitra.
        <br>venez découvrir notre vaste gamme de voiture de location,<br> roulez en toute liberté dans une voiture récente et adaptée à vos besoins.
        </h3>
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
            <img src="./img/voiture9.jpg" class="d-block w-100 h-100" alt="...">
            <div class="carousel-caption d-none d-md-block ">

        </div>
          </div>
          <div class="carousel-item">
            <img src="./img/voiture6.jpg" class="d-block w-100 h-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/voiture23.jpg" class="d-block w-100 h-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/voiture21.jpg" class="d-block w-100 h-100" alt="...">
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
    <form method="post" action="/cars_results">
    {{ csrf_field() }}
    <div class="row">
    <div class="col-10 row">

        <div class="col-2">
            <input class="form-control border-0 py-3" type="text" name="where_from" placeholder="pick-up location">
        </div>


        <div class="col-3 check-date">
            <label  for="pick_up_date">Date de prise en charge</label>
            <input  class="form-control border-0 py-3" type="date" name="pick_up_date" id="pick_up_date">
        </div>

        <div class="col-2">
            <select class="form-select border-0 py-3" name="pick_up_time" id="">
                <option value="00:00">00:00</option>
                <option value="00:30">00:30</option>
                <option value="01:00">01:00</option>
                <option value="01:30">01:30</option>
                <option value="02:00">02:00</option>
                <option value="02:30">02:30</option>
                <option value="03:00">03:00</option>
                <option value="03:30">03:30</option>
                <option value="04:00">04:00</option>
                <option value="04:30">04:30</option>
                <option value="05:00">05:00</option>
                <option value="05:30">05:30</option>
                <option value="06:00">06:00</option>
                <option value="06:30">06:30</option>
                <option value="07:00">07:00</option>
                <option value="07:30">07:30</option>
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
                <option value="23:30">23:30</option>
            </select>
        </div>

        <div class="col-3 check-date">
            <label  for="return_date">Date de réstitution </label>
            <input class="form-control border-0 py-3" type="date" name="return_date" id="return_date">
        </div>

        <div class="col-2 ">
            <select class="form-select border-0 py-3 " name="return_date_time" id="">
                <option value="00:00">00:00</option>
                <option value="00:30">00:30</option>
                <option value="01:00">01:00</option>
                <option value="01:30">01:30</option>
                <option value="02:00">02:00</option>
                <option value="02:30">02:30</option>
                <option value="03:00">03:00</option>
                <option value="03:30">03:30</option>
                <option value="04:00">04:00</option>
                <option value="04:30">04:30</option>
                <option value="05:00">05:00</option>
                <option value="05:30">05:30</option>
                <option value="06:00">06:00</option>
                <option value="06:30">06:30</option>
                <option value="07:00">07:00</option>
                <option value="07:30">07:30</option>
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
                <option value="18:00">18:00</option>
                <option value="18:30">18:30</option>
                <option value="19:00">19:00</option>
                <option value="19:30">19:30</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                <option value="22:30">22:30</option>
                <option value="23:00">23:00</option>
                <option value="23:30">23:30</option>
            </select>
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
                            <div class="icons" style="width: 140px">
                                <img class="img-fluid" src="img/audi1.PNG" alt="Icon">
                            </div>
                        </div>
                        <h4>Voiture Luxe</h4>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="cat-item d-block bg-light text-center rounded p-3">
                    <div class="rounded p-4 icon-bg">
                        <div class="icon mb-3">
                            <div class="icons" >
                                <img class="img-fluid" src="img/auto.png" alt="Icon">
                            </div>
                        </div>
                        <h4>Voiture Familiale</h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="cat-item d-block bg-light text-center rounded p-3">
                    <div class="rounded p-4 icon-bg">
                        <div class="icon mb-3">
                            <div class="icons" style="width: 140px">
                                <img class="img-fluid" src="img/autoo.PNG" alt="Icon">
                            </div>
                        </div>
                        <h4>Voiture Maison</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="about-img position-relative p-5 pe-0 ">
                    <img class="img-fluid w-100 " src="img/GEN4.jpg">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                <h1 class="mb-4"> Louez votre voiture à prix avantageux avec Zrelax .</h1>
                <p class="mb-4">Nos prix sont vraiment économiques parce que des milliers de personnes réservent avec nous tous les jours. Et parce que nous avons beaucoup de réservations, vous pouvez obtenir votre voiture moins cher avec nous que tout autre endroit.
                    </p>
                <p><i class="fa fa-check text-primary me-3"></i> il faut trouver une voiture la plus populaire au Maroc .</p>
                <p><i class="fa fa-check text-primary me-3"></i> une voiture confortable pour s'amuser.</p>
                <p><i class="fa fa-check text-primary me-3"></i> une voiture confortable pour s'amuser.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Gagner du temps dans la préparation de vos vacances
                    avec le Meilleur prix </p>
            </div>
        </div>
    </div>
</div>
<section class="third-section p-3 text-center">

    <div>
        <div class="row p-4" >
            @foreach ($showCars as $car)
                <div class="col-4 p-2 selection" data-car_id="{{$car->car_id}}">
                    <div class="property-item rounded overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('/storage/images/' . $car->photo) }}" alt="" class="img-100">
                            <div class="bg-white rounded-top txt-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $car->car_company_name }}</div>
                        </div>
                        <div class="p-4 pb-0">
                            <h5 class="txt-primary mb-3">DH {{ number_format($car->price, 2) }}/jr</h5>
                            <h5 class="txt-secondray mb-3">{{ $car->car_name }}</h5>
                            <p><i class="fa fa-map-marker-alt txt-primary me-2"></i>{{ $car->street_name }}, {{ $car->city_name }}, {{ $car->country_name }}</p>
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

                <label  for="pick_up_date">Date de location</label>
                <input  class="form-control border-0 py-3" type="date" name="pick_up_date" id="pick_up_date">

                <label  for="pick_up_date">heure de ramassage</label>
                <select class="form-select border-0 py-3" name="pick_up_time" id="">
                    <option value="00:00">00:00</option>
                    <option value="00:30">00:30</option>
                    <option value="01:00">01:00</option>
                    <option value="01:30">01:30</option>
                    <option value="02:00">02:00</option>
                    <option value="02:30">02:30</option>
                    <option value="03:00">03:00</option>
                    <option value="03:30">03:30</option>
                    <option value="04:00">04:00</option>
                    <option value="04:30">04:30</option>
                    <option value="05:00">05:00</option>
                    <option value="05:30">05:30</option>
                    <option value="06:00">06:00</option>
                    <option value="06:30">06:30</option>
                    <option value="07:00">07:00</option>
                    <option value="07:30">07:30</option>
                    <option value="08:00">08:00</option>
                    <option value="08:30">08:30</option>
                    <option value="09:00">09:00</option>
                    <option value="09:30">09:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                    <option value="22:00">22:00</option>
                    <option value="22:30">22:30</option>
                    <option value="23:00">23:00</option>
                    <option value="23:30">23:30</option>
                </select>

                <label  for="return_date">Date de retourne </label>
                <input class="form-control border-0 py-3" type="date" name="return_date" id="return_date">

                <label  for="pick_up_date">heure de retour</label>
                <select class="form-select border-0 py-3 " name="return_date_time" id="">
                    <option value="00:00">00:00</option>
                    <option value="00:30">00:30</option>
                    <option value="01:00">01:00</option>
                    <option value="01:30">01:30</option>
                    <option value="02:00">02:00</option>
                    <option value="02:30">02:30</option>
                    <option value="03:00">03:00</option>
                    <option value="03:30">03:30</option>
                    <option value="04:00">04:00</option>
                    <option value="04:30">04:30</option>
                    <option value="05:00">05:00</option>
                    <option value="05:30">05:30</option>
                    <option value="06:00">06:00</option>
                    <option value="06:30">06:30</option>
                    <option value="07:00">07:00</option>
                    <option value="07:30">07:30</option>
                    <option value="08:00">08:00</option>
                    <option value="08:30">08:30</option>
                    <option value="09:00">09:00</option>
                    <option value="09:30">09:30</option>
                    <option value="10:00">10:00</option>
                    <option value="10:30">10:30</option>
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                    <option value="14:00">14:00</option>
                    <option value="14:30">14:30</option>
                    <option value="15:00">15:00</option>
                    <option value="15:30">15:30</option>
                    <option value="16:00">16:00</option>
                    <option value="16:30">16:30</option>
                    <option value="17:00">17:00</option>
                    <option value="17:30">17:30</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    <option value="20:30">20:30</option>
                    <option value="21:00">21:00</option>
                    <option value="21:30">21:30</option>
                    <option value="22:00">22:00</option>
                    <option value="22:30">22:30</option>
                    <option value="23:00">23:00</option>
                    <option value="23:30">23:30</option>
                </select>


                <input type="hidden" id="car_id" name="car_id" value="">
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


                $('body').on('click', '.selection', function () {

                $('#form').trigger("reset");
                var car_id = $(this).data('car_id');

                $.get('/reserve_car/getdata/'+ car_id, function (data) {

                    var car_id = data[0].car_id ;
                    var price = data[0].price ;
                    $('#car_id').val(car_id) ;
                    $('#price').val(price) ;
                    $('#modelHeading').html("Ajoutez les détails suivants");
                    $("#form").attr("action", "/reserve_car/store");
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

document.getElementById('pick_up_date').value = getDate();

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


document.getElementById('return_date').value = getDatePlusOne();

</script>
@endsection
