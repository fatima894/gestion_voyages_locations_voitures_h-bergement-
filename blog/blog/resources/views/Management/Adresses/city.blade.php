@extends('layouts.admin_page')



@section('content')


<div class="d-flex justify-content-between mb-4">
    <h2> Villes </h2>
    <button class="btn btn-success"  id="createNewElement" >Ajouter une nouvelle ville</button>
</div>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom de ville</th>
        <th scope="col">Nom de pays</th>
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
                    <select class="form-select" aria-label="Default select example" name="country" id="country">
                    @foreach ($allCountries as $country)
                    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
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

        ajax: "{{ route('cities.index') }}",

        columns: [

            {data: 'city_id', name: 'city_id'},
            {data: 'city_name', name:'city_name'},
            {data: 'country_name', name:'country_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });


           // الاضافة
           $('#createNewElement').click(function () {

           $('#form').trigger("reset");

           $('#modelHeading').html("Ajouter une nouvelle ville");  // هذا العنوان

           $("#form").attr("action", "/city/store"); // هنا وضعت الاكشن

           $('#pageModel').modal('show');

     });


            //التعديل

            $('body').on('click', '.editCity', function () {

            var city_id = $(this).data('id'); //احضر الايدي تبعه

            $.get('/city/edit/'+ city_id, function (data) {  // احضر البيانات

            $('#modelHeading').html("Modifier une ville");  //غير عنوان الفورم

            $("#form").attr("action", "/city/update/"+city_id);  // هنا وضعت الاكشن

            $('#pageModel').modal('show'); // لاظهار المودل

                 // هنا لوضع القيم داخل الحقول


            $('#name').val(data[0].city_name);
            $('#country option[value='+data[0].country_id+']').attr('selected','selected');

            })

            });


            $("#City-menu").attr("class", "nav-link active");

  });

</script>

@endsection
