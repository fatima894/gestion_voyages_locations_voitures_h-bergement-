@extends('layouts.admin_page')
@section('page')

<div class="d-flex justify-content-between mb-4">
    <h2>Details voitures</h2>
    <button class="btn btn-success" id="createNewElement">Ajouter les détails des voitures</button>
</div>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom Companie</th>
        <th scope="col">Adresse</th>
        <th scope="col">Ville</th>
        <th scope="col">nom de la voiture</th>
        <th scope="col">Nombre de voiture</th>
        <th scope="col">Prix</th>
        <th>Action</th>

      </tr>
    </thead>
        <p></p>
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
                <form id="form" method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }} {{-- bach yet2aked anno lli rssel les infos
                howa men form mertabet belprojet=>token --}}

                <div class="mb-3">
                <label for="company-name" class="col-form-label">Nom Companie:</label>
                <select class="form-select" aria-label="Default select example" id="company-name" name="company_id">
                @foreach ($car_companies as $car_company)
                <option value="{{$car_company->car_company_id}}"> {{$car_company->car_company_name}}</option>
                @endforeach
                </select>
                </div>

                <div class="mb-3">
                <label for="address" class="col-form-label">Adresse:</label>
                <select class="form-select" aria-label="Default select example" id="address" name="car_address">
                @foreach ($addresses as $address)
                <option value="{{$address->street_id}}"> {{$address->street_name}},  {{$address->city_name }}</option>
                @endforeach
                </select>
                </div>

                    <div class="mb-3">
                        <label for="car_name" class="col-form-label">nom de la voiture:</label>
                        <input type="text" class="form-control" name="car_name" id="car_name" placeholder="e.g. Santa Fe ">
                    </div>
                    <div class="mb-3">
                        <label for="car_number" class="col-form-label">Nombre de voiture:</label>
                        <input type="text" class="form-control" name="car_number" id="car_number" placeholder="e.g. AT4521 ">
                    </div>

                    <div class="mb-3">
                        <label for="price" class="col-form-label">Prix:</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="e.g. 1000.00DH">
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="col-form-label">Photo:</label>
                        <input type="file" class="form-control" name="photo" id="photo" >
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

        ajax: "{{ route('cardetails.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'car_company_name', name: 'car_company_name'},
            {data: 'street_name', name:'street_name'},
            {data: 'city_name', name:'city_name'},
            {data: 'car_name', name:'car_name'},
            {data: 'car_number', name:'car_number'},
            {data: 'price', name:'price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},


        ]

    });


               // الاضافة
               $('#createNewElement').click(function () {

               $('#form').trigger("reset");

               $('#modelHeading').html("Ajouter les details des voitures");  // هذا العنوان

               $("#form").attr("action", "/cardetail/store"); // هنا وضعت الاكشن

               $('#pageModel').modal('show');

               });


                      //التعديل

               $('body').on('click', '.editCarDetail', function () {

               var car_id = $(this).data('id'); //احضر الايدي تبعه

               $.get('/cardetail/edit/'+ car_id, function (data) {  // احضر البيانات

               $('#modelHeading').html("Modifier Detail voiture");  //غير عنوان الفورم

               $("#form").attr("action", "/cardetail/update/"+car_id);  // هنا وضعت الاكشن

               $('#pageModel').modal('show'); // لاظهار المودل

                    // هنا لوضع القيم داخل الحقول


               $('#company-name option[value='+data[0].company_id+']').attr('selected','selected');
               $('#address option[value='+data[0].adress_id+']').attr('selected','selected');
               $('#car_name').val(data[0].car_name);
               $('#car_number').val(data[0].car_number);
               $('#price').val(data[0].price);



               })

               });





               $("#Car-Detail-menu").attr("class", "nav-link active");
  });

</script>

@endsection

