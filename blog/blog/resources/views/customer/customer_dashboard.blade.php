@extends('layouts.main_nav')

@section('main')

<div class="c-dashboard">
<h2 class="text-center pt-5">Tableau du bord</h2>
<div class="pdf-export">
<a href="/export_customer_pdf/paid" class="btn btn-success me-5">Exporter la Facture payée</a><a href="/export_customer_pdf/active" class="btn btn-success me-5">Export Reserved Facture</a>
</div>


<div class="row">
    <div class="col-2">
        <div class="c-d-sidemenu">
            <ul>
                <li><a href="/customer/dashboard/flights">Voyages</a></li>
                <li><a href="/customer/dashboard/hotels">Hébergements</a></li>
                <li><a href="/customer/dashboard/cars">Voitures</a></li>

            </ul>
        </div>
    </div>
    <div class="col-9">
    @yield('main_section')
    </div>
</div>

</div>







@endsection
