@extends('layouts.admin_page')
@section('page')

    <div class="d-flex justify-content-between mb-4">
        <h2> Villas </h2>
        <button class="btn btn-success" id="createNewElement">Ajouter une nouvelle Villa</button>
    </div>
    <table class="table table-hover text-center table-bordered data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Adresse</th>
                <th scope="col">E-mail</th>
                <th scope="col">N-tele</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveau Villa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        {{ csrf_field() }} {{-- bach yet2aked anno lli rssel les infos
                    howa men form mertabet belprojet=>token --}}
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Nom:</label>
                        <input type="text" class="form-control" name="name" id="name"> {{-- had name ghadi nehtahjoha frequest hiya lli ghadi n3erfo nfer9o mabin les datas f request f controller --}}
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="col-form-label">Adresse:</label>
                        <input type="text" class="form-control" name="adresse" id="adresse">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="tele" class="col-form-label">Tele:</label>{{-- bach ila cliquit 3la label ydir wahed contour 3lih --}}
                        <input type="text" class="form-control" name="tele" id="tele">
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

        ajax: "{{ route('villas.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'house_info_name', name: 'house_info_name'},
            {data: 'street_name', name:'street_name'},
            {data: 'email', name:'email'},
            {data: 'tele', name:'tele'},
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

           // الاضافة
           $('#createNewElement').click(function () {

           $('#form').trigger("reset");

           $('#modelHeading').html("Ajouter une nouvelle villa");  // هذا العنوان

           $("#form").attr("action", "/villa/store"); // هنا وضعت الاكشن

           $('#pageModel').modal('show');

           });



           //التعديل

           $('body').on('click', '.editVilla', function () {

           var house_info_id = $(this).data('id'); //احضر الايدي تبعه

           $.get('/villa/edit/'+ house_info_id, function (data) {  // احضر البيانات

           $('#modelHeading').html("Modifier une Villa");  //غير عنوان الفورم

           $("#form").attr("action", "/villa/update/"+house_info_id);  // هنا وضعت الاكشن

           $('#pageModel').modal('show'); // لاظهار المودل

           // هنا لوضع القيم داخل الحقول


          $('#name').val(data[0].house_info_name);
          $('#adresse').val(data[0].adresse);
          $('#email').val(data[0].email);
          $('#tele').val(data[0].tele);

             })

           });


   $("#Villa-menu").attr("class", "nav-link active");

  });

</script>

@endsection
