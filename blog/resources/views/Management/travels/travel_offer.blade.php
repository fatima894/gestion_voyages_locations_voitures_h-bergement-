@extends('layouts.admin_page')
@section('page')

<div class="d-flex justify-content-between mb-4">
    <h2> Offres de voyage </h2>
</div>

<table class="table table-hover  text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Compagnie aérienne</th>
        <th scope="col">De </th>
        <th scope="col">À</th>
        <th scope="col">Date de voyage</th>
        <th scope="col">L'heure de voyage</th>
        <th scope="col">Prix</th>
        <th scope="col">Réduction</th>
        <th scope="col">Prix d'Offre</th>
        <th>Action</th>

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

        ajax: "{{ route('traveloffers.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'company_name', name: 'company_name'},
            {data: 'from_city', name:'from_city'},
            {data: 'to_city', name:'to_city'},

            {data: 'travel_date', name:'travel_date'},
            {data: 'travel_time', name:'travel_time'},
            {data: 'price', name:'price'},
            {data: 'discount_percentage', name:'discount_percentage'},
            {data: 'Offer_Price', name:'Offer_Price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},


        ]

    });


    $("#Travel-Offer-menu").attr("class", "nav-link active");

  });

</script>

@endsection

