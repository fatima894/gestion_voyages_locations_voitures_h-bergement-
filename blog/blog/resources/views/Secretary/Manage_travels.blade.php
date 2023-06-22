@extends('layouts.secretary_page')
@section('page')



<h1>Managements des voyages</h1>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Le nom de Client</th>
        <th scope="col">Le nom de Compagnie</th>
        <th scope="col">De</th>
        <th scope="col">À</th>
        <th scope="col">La Date de voyage</th>
        <th scope="col">L'heure de voyage</th>
        <th scope="col">L'heure d'arrivée</th>
        <th scope="col">Prix</th>
        <th>Statuts</th>

      </tr>
    </thead>

        <tbody>


        </tbody>

</table>



@endsection

@section('scripts')

<script type="text/javascript">

  $(function () {



    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('reserve_travel.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'company_name', name: 'company_name'},
            {data: 'from_city', name: 'from_city'},
            {data: 'to_city', name: 'to_city'},
            {data: 'travel_date', name: 'travel_date'},
            {data: 'travel_time', name:'travel_time'},
            {data: 'reach_time', name:'reach_time'},
            {data: 'reservation_price', name:'reservation_price'},
            {data: 'status', name: 'status', orderable: false, searchable: false},

        ]

    });

    $("#Travels-customer-menu").attr("class", "nav-link active");

  });

</script>
@endsection
