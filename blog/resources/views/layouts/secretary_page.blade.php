@extends('layouts.app')

@section('sideMenu')

<ul class="nav nav-pills flex-column mb-auto">

      <li>
        <a href="/Secretary/houses_managment" id ="Houses-customer-menu" class="nav-link link-dark">
       Hébergements réservés
        </a>
      </li>
      <li>
        <a href="/Secretary/cars_managment" id ="Cars-customer-menu" class="nav-link link-dark">
        Voitures réservés
        </a>
      </li>
      <li>
        <a href="/Secretary/travels_managment" id ="Travels-customer-menu" class="nav-link link-dark">
        Vols réservés
        </a>
      </li>
      <li>
        <a href="/customer_details" id ="customer-details-menu" class="nav-link link-dark">
          Les détails des clients
        </a>
      </li>
</ul>


@endsection


@section('content')

@yield('page')

@endsection
