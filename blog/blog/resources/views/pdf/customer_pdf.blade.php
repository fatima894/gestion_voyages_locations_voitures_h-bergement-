<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Zrelax</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray;
        font-weight: bold;
    }
</style>

</head>
<body>

<h3 align="center">Facture</h3>

  <table width="100%">
    <tr>

        <td >
            <strong>Zrelaxvoyage</strong><br>
            Bureau n°5 entrée B <br> avenue Med V angle rues - Kenitra<br>
                contact@zrelaxvoyages.com<br>
                (+212) 537 32 57 02<br>
                (+212) 661 09 18 30<br>
        </td>
        <td valign="top"><img src="../public/img/ZLogo.jpg" alt="" width="150"/></td>
        <td align="right">
        Customer Name: <strong>{{$user[0]->name}}</strong><br>
        Passport Nr: <strong>{{$user[0]->PassPort}}</strong>
        <br><br>
              <strong>date:</strong> {{date('Y-m-d')}}<br>
              <strong> Mode: </strong>@if($mode =="active") Reserved @else Paid @endif
        </td>
    </tr>


  </table>

  <br>

  @php

    $total = 0 ;
    $tax = 0 ;
  @endphp


  @if(count($flights))

  @php

   $flight_total = 0 ;


  @endphp
  <table width="100%">
    <tr>
        <td><strong>Flight:</strong></td>
    </tr>
  </table>

  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Resevered ID</th>
        <th>From</th>
        <th>To</th>
        <th>Travel Date</th>
        <th>Travel Time</th>
        <th>Airline</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($flights as $flight)
      <tr>
        <th scope="row">{{ $loop->index +1 }}</th>
        <td align="center">{{$flight->flight_reservation_id}}</td>
        <td align="center">{{$flight->from_city}}</td>
        <td align="center">{{$flight->to_city}}</td>
        <td align="center">{{$flight->travel_date}}</td>
        <td align="center">{{$flight->travel_time}}</td>
        <td align="center">{{$flight->company_name}}</td>
        <td align="right">{{$flight->reservation_price}}</td>
      </tr>
    </tbody>
          @php
            $flight_total += $flight->reservation_price ;
          @endphp
    @endforeach
    <tfoot>
        <tr>
            <td colspan="6"></td>
            <td align="right">Flights Total </td>
            <td align="right" class="gray">
            @php
                $total += $flight_total ;
                echo $flight_total ;
           @endphp
            </td>
        </tr>
    </tfoot>
  </table>

@endif




@if(count($cars))

  @php

   $car_total = 0 ;


  @endphp
  <table width="100%">
    <tr>
        <td><strong>Car:</strong></td>
    </tr>
  </table>

  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Resevered ID</th>
        <th>City</th>
        <th>Car Number</th>
        <th>Pickup Date</th>
        <th>return Date</th>
        <th>Company</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($cars as $car)
      <tr>
        <th scope="row">{{ $loop->index +1 }}</th>
        <td align="center">{{$car->car_reservation_id}}</td>
        <td align="center">{{$car->city_name}}</td>
        <td align="center">{{$car->car_number}}</td>
        <td align="center">{{$car->pickup_date}}</td>
        <td align="center">{{$car->return_date}}</td>
        <td align="center">{{$car->car_company_name}}</td>
        <td align="right">{{$car->reservation_price}}</td>
      </tr>
    </tbody>
          @php
            $car_total += $car->reservation_price ;
          @endphp
    @endforeach
    <tfoot>
        <tr>
            <td colspan="6"></td>
            <td align="right">Cars Total </td>
            <td align="right" class="gray">
            @php
                $total += $car_total  ;
                echo $car_total ;
           @endphp
            </td>
        </tr>
    </tfoot>
  </table>

@endif



@if(count($houses))

  @php

   $house_total = 0 ;

  @endphp
  <table width="100%">
    <tr>
        <td><strong>House:</strong></td>
    </tr>
  </table>

  <br/>
  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Resevered ID</th>
        <th>House Name</th>
        <th>type</th>
        <th>City</th>
        <th>Check-in</th>
        <th>Check-out</th>
        <th>Persons</th>
        <th>Size</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($houses as $house)
      <tr>
        <th scope="row">{{ $loop->index +1 }}</th>
        <td align="center">{{$house->house_reservation_id}}</td>
        <td align="center">{{$house->house_info_name}}</td>
        <td align="center">{{$house->name}}</td>
        <td align="center">{{$house->city_name}}</td>
        <td align="center">{{$house->check_in_date}}</td>
        <td align="center">{{$house->check_out_date }}</td>
        <td align="center">{{$house->persons_per_room}}</td>
        <td align="center">{{$house->room_size}}</td>
        <td align="right">{{$house->reservation_price}}</td>
      </tr>
    </tbody>
          @php
            $house_total += $house->reservation_price ;
          @endphp
    @endforeach
    <tfoot>
        <tr>
            <td colspan="8"></td>
            <td align="right">Houses Total </td>
            <td align="right" class="gray">
            @php
              $total += $house_total ;
              echo $house_total ;
           @endphp
            </td>
        </tr>
    </tfoot>
  </table>

@endif


<br><br>
<table align="right" width="30%">
<tr>
            <td align="right">Total</td>
            <td align="right" class="gray">
            @php
                echo $total;
           @endphp
            </td>
  </tr>
  <tr>
            <td align="right">Tax</td>
            <td align="right" class="gray">
            @php
                $tax = $total * 0.2;
                echo $tax;
           @endphp
            </td>
        </tr>
    <tr>
        <td align="right"><strong>Total + Tax</strong></td>
        <td align="right" class="gray">
           @php
              echo $total *= 1.2 ;
           @endphp
        </td>
    </tr>
  </table>



</body>
</html>
