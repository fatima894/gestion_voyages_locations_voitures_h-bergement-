@extends('layouts.app')

@section('sideMenu')

<ul class="nav nav-pills flex-column mb-auto" >
      <li>
        <a href="/hotels" id ="Hotel-menu" class="nav-link link-dark ">
          Hotels
        </a>
      </li>
      <li>
        <a href="/appartements" id ="Appartement-menu" class="nav-link link-dark">
        Appartements
        </a>
      </li>
      <li>
        <a href="/villas" id ="Villa-menu" class="nav-link link-dark">
        Villas
        </a>
      </li>
      <li>
        <a href="/rooms" id ="Room-menu" class="nav-link link-dark">
        Chambres
        </a>
      </li>
      <li>
        <a href="/countries" id ="Country-menu" class="nav-link link-dark">
        Pays
        </a>
      </li>
      <li>
        <a href="/cities" id ="City-menu" class="nav-link link-dark">
        Villes
        </a>
      </li>
      <li>
        <a href="/addresses" id ="Address-menu" class="nav-link link-dark">
        Adresses
        </a>
      </li>
      <li>
        <a href="/airports" id ="Airport-menu" class="nav-link link-dark">
        Aéroports
        </a>
      </li>
      <li>
        <a href="/directions" id ="Direction-menu" class="nav-link link-dark">
        Directions
        </a>
      </li>
      <li>
        <a href="/car_companies" id ="Car-Company-menu" class="nav-link link-dark">
        Compagnies des voitures
        </a>
      </li>
      <li>
        <a href="/travel_companies" id ="Airline-menu" class="nav-link link-dark">
        Compagnies Aériennes
        </a>
      </li>
      <li>
        <a href="/cardetails" id ="Car-Detail-menu" class="nav-link link-dark">
        Details des voitures
        </a>
      </li>
      <li>
        <a href="/traveldetails" id ="Travel-Detail-menu" class="nav-link link-dark">
        Details des voyages
        </a>
      </li>
      <li>
        <a href="/traveloffers" id ="Travel-Offer-menu" class="nav-link link-dark">
        Offres des voyages
        </a>
      </li>
</ul>


@endsection


@section('content')

 @yield('page')

@endsection
