@extends('layouts.admin_page')
@section('page')

<div class="d-flex justify-content-between mb-4">
    <h2> chambres </h2>
    <button class="btn btn-success"  id="createNewElement">Ajouter une nouvelle chambre</button>
</div>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom d'hébergement</th>
        <th scope="col">Adresse</th>
        <th scope="col">dimension</th>
        <th scope="col">Prix</th>
        <th scope="col">personne</th>
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
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <h4 class="modal-title" id="modelHeading"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form" method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }} {{-- bach yet2aked anno lli rssel les infos
                howa men form mertabet belprojet=>token --}}

                <div class="mb-3">

                <label for="house-name" class="col-form-label">Nom de hébergements:</label>
                <select class="form-select" aria-label="Default select example" id="house-name" name="house_id">
                @foreach ($houses as $house)
                <option value="{{$house->house_info_id}}"> {{$house->house_info_name}},  {{$house->street_name}},  {{$house->city_name }}</option>
                @endforeach
                </select>
                </div>

                    <div class="mb-3">
                        <label for="roomsize" class="col-form-label">dimensions:</label>
                        <input type="text" class="form-control" name="roomsize" id="roomsize" placeholder="e.g. 300m"> {{-- had name ghadi nehtahjoha frequest hiya lli ghadi n3erfo nfer9o mabin les datas f request f controller --}}
                    </div>
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Prix:</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="e.g. 1000.00DH">
                    </div>
                    <div class="mb-3">
                        <label for="persons_per_room" class="col-form-label">personne:</label>
                        <input type="number" class="form-control" name="persons_per_room" id="persons_per_room" min="1" max="7" value="{{1}}">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="col-form-label">Photo:</label>
                        <input type="file" class="form-control" name="photo" id="photo" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                        <button type="submit" class="btn btn-primary">sauvegarder</button>
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

        ajax: "{{ route('rooms.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'house_info_name', name: 'house_info_name'},
            {data: 'street_name', name:'street_name'},
            {data: 'room_size', name:'room_size'},
            {data: 'price', name:'price'},
            {data: 'persons_per_room', name:'persons_per_room'},
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });


           // الاضافة
           $('#createNewElement').click(function () {

           $('#form').trigger("reset");

           $('#modelHeading').html("Créer une nouvelle chambre");  // هذا العنوان

           $("#form").attr("action", "/room/store"); // هنا وضعت الاكشن

           $('#pageModel').modal('show');

           });





                  //التعديل

           $('body').on('click', '.editRoom', function () {

           var room_id = $(this).data('id'); //احضر الايدي تبعه

           $.get('/room/edit/'+ room_id, function (data) {  // احضر البيانات

           $('#modelHeading').html("Modifier une chambre");  //غير عنوان الفورم

           $("#form").attr("action", "/room/update/"+room_id);  // هنا وضعت الاكشن

           $('#pageModel').modal('show'); // لاظهار المودل

                // هنا لوضع القيم داخل الحقول

           $('#house-name option[value='+data[0].house_id+']').attr('selected','selected');
           $('#roomsize').val(data[0].room_size);
           $('#price').val(data[0].price);
           $('#persons_per_room').val(data[0].persons_per_room);


           })

           });





           $("#Room-menu").attr("class", "nav-link active");

  });

</script>

@endsection
