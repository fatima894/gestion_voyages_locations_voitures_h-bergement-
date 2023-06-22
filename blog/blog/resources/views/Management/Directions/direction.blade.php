@extends('layouts.admin_page')



@section('page')


<div class="d-flex justify-content-between mb-4">
    <h2>Directions</h2>
    <button class="btn btn-success" id="createNewElement">Ajouter une nouvelle Direction</button>
</div>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">De l'Aéroport</th>
        <th scope="col">À  l'Aéroport</th>
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
                <label for="from_airport" class="col-form-label">De l'Aéroport :</label>
                <select class="form-select" aria-label="Default select example" id="from_airport" name="from_airport">
                    @foreach ($allAirports as $from_airport)
                    <option value="{{$from_airport->airport_id}}">{{$from_airport->airport_name}}</option>
                    @endforeach
                    </select>
                    <label for="to_airport" class="col-form-label">À  l'Aéroport :</label>
                    <select class="form-select" aria-label="Default select example" id="to_airport" name="to_airport">
                    @foreach ($allAirports as $to_airport)
                    <option value="{{$to_airport->airport_id}}">{{$to_airport->airport_name}}</option>
                    @endforeach
                    </select>
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

        ajax: "{{ route('directions.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'f', name: 'f'},
            {data: 't', name:'t'},
            {data: 'action', name: 'action', orderable: false, searchable: false},


        ]

    });


               // الاضافة
               $('#createNewElement').click(function () {

               $('#form').trigger("reset");

               $('#modelHeading').html("Ajouter une nouvelle Direction");  // هذا العنوان

               $("#form").attr("action", "/direction/store"); // هنا وضعت الاكشن

               $('#pageModel').modal('show');

               });


                      //التعديل

              $('body').on('click', '.editDirection', function () {

              var direction_id = $(this).data('id'); //احضر الايدي تبعه

              $.get('/direction/edit/'+ direction_id, function (data) {  // احضر البيانات

              $('#modelHeading').html("Modifier une Direction");  //غير عنوان الفورم

              $("#form").attr("action", "/direction/update/"+direction_id);  // هنا وضعت الاكشن

              $('#pageModel').modal('show'); // لاظهار المودل

                   // هنا لوضع القيم داخل الحقول


               $('#from_airport option[value='+data[0].from_airport_id+']').attr('selected','selected');
               $('#to_airport option[value='+data[0].to_airport_id+']').attr('selected','selected');

              })

              });

              $("#Direction-menu").attr("class", "nav-link active");

  });

</script>

@endsection
