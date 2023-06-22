@extends('layouts.secretary_page')
@section('page')

<div class="d-flex justify-content-between mb-4">
    <h2> Les informations des clients </h2>

</div>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">id</th>
        <th scope="col">Nom</th>
        <th scope="col">E-mail</th>
        <th scope="col">Passport Nr</th>
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

        ajax: "{{ route('customer_details.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id'},
            {data: 'name', name:'street_name'},
            {data: 'email', name:'email'},
            {data: 'PassPort', name:'PassPort'},


        ]


    });








      $("#customer-details-menu").attr("class", "nav-link active");

  });

</script>

@endsection
