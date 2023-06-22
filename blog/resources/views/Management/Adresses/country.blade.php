@extends('layouts.admin_page')



@section('page')


<div class="d-flex justify-content-between mb-4">
    <h2>   Pays </h2>
    <button class="btn btn-success" id="createNewElement">Ajouter un nouvel pays</button>
</div>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>

</table>


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
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nom:</label>
                        <input type="text" class="form-control" name="name" id="name"> {{-- had name ghadi nehtahjoha frequest hiya lli ghadi n3erfo nfer9o mabin les datas f request f controller --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






@endsection


@section('scripts')

<script type="text/javascript">

  $(function () {



    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('countries.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'country_name', name:'country_name'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });


       // الاضافة
       $('#createNewElement').click(function () {

       $('#form').trigger("reset");

       $('#modelHeading').html("Ajouter un nouvel pays");  // هذا العنوان

       $("#form").attr("action", "/country/store"); // هنا وضعت الاكشن

       $('#pageModel').modal('show');

       });



       //التعديل

       $('body').on('click', '.editCountry', function () {

       var country_id = $(this).data('id'); //احضر الايدي تبعه

       $.get('/country/edit/'+ country_id, function (data) {  // احضر البيانات

       $('#modelHeading').html("Modifier un pays");  //غير عنوان الفورم

       $("#form").attr("action", "/country/update/"+country_id);  // هنا وضعت الاكشن

       $('#pageModel').modal('show'); // لاظهار المودل

            // هنا لوضع القيم داخل الحقول


       $('#name').val(data[0].country_name);

       })

       });







       $("#Country-menu").attr("class", "nav-link active");


  });

</script>

@endsection
