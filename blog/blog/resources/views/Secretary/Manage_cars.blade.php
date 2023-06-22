@extends('layouts.secretary_page')
@section('page')


<div class="d-flex justify-content-between mb-4">
<h1>Management des voitures</h1>
</div>
<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Le nom de Client</th>
        <th scope="col">Nom de Compagnie</th>
        <th scope="col">La Date de réception</th>
        <th scope="col">l'heure de réception</th>
        <th scope="col">La Date de retour</th>
        <th scope="col">L'heure de retour</th>
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

        ajax: "{{ route('reserve_car.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'car_company_name', name: 'car_company_name'},
            {data: 'pickup_date', name: 'pickup_date'},
            {data: 'pickup_time', name: 'pickup_time'},
            {data: 'return_date', name:'return_date'},
            {data: 'return_time', name:'return_time'},
            {data: 'reservation_price', name:'reservation_price'},
            {data: 'status', name: 'status', orderable: false, searchable: false},

        ]

    });


    $("#Cars-customer-menu").attr("class", "nav-link active");

  });

</script>
@endsection
