@extends('layouts.secretary_page')
@section('page')



<h1>Management des hébergements</h1>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Le nom de Client</th>
        <th scope="col">Id chambre</th>
        <th scope="col">La date de réception</th>
        <th scope="col">La date de libération</th>
        <th scope="col">Prix de réservation</th>
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

        ajax: "{{ route('reserve_house.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'room_id', name: 'room_id'},
            {data: 'check_in_date', name: 'check_in_date'},
            {data: 'check_out_date', name: 'check_out_date'},
            {data: 'reservation_price', name:'reservation_price'},
            {data: 'status', name: 'status', orderable: false, searchable: false},

        ]

    });


    $("#Houses-customer-menu").attr("class", "nav-link active");

  });

</script>
@endsection
