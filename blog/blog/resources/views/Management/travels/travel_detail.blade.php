@extends('layouts.admin_page')
@section('page')

<div class="d-flex justify-content-between mb-4">
    <h2> Les details de voyage </h2>
    <button class="btn btn-success" id="createNewElement">Ajouter un nouvel detail de voyage</button>
</div>

<table class="table table-hover text-center table-bordered data-table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Compagnie Aérienne</th>
        <th scope="col">De</th>
        <th scope="col">À</th>
        <th scope="col">Date de voyage</th>
        <th scope="col">L'heure de voyage</th>
        <th scope="col">L'heure d'arrivée</th>
        <th scope="col">Prix</th>
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
                <form id="form" method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }} {{-- bach yet2aked anno lli rssel les infos
                howa men form mertabet belprojet=>token --}}

                <div class="mb-3">
                <label for="company-name" class="col-form-label">Compagnie Aérienne:</label>
                <select class="form-select" aria-label="Default select example" id="company-name" name="company_id">
                @foreach ($travel_companies as $travel_company)
                <option value="{{$travel_company->company_id}}"> {{$travel_company->company_name}}</option>
                @endforeach
                </select>
                </div>

                <div class="mb-3">
                <label for="from_to" class="col-form-label">De / À:</label>
                <select class="form-select" aria-label="Default select example" id="from_to" name="from_to">
                @foreach ($directions as $direction)
                <option value="{{$direction->direction_id}}"> {{$direction->from_city}}  / {{$direction->to_city }}</option>
                @endforeach
                </select>
                </div>


                    <div class="mb-3">
                        <label for="travel_date" class="col-form-label">Date de voyage:</label>
                        <input type="date" class="form-control" name="travel_date" id="travel_date" >
                    </div>

                    <div class="mb-3">
                        <label for="travel_time" class="col-form-label">L'heure de voyage:</label>
                        <input type="time" class="form-control" name="travel_time" id="travel_time" >
                    </div>

                    <div class="mb-3">
                        <label for="reach_time" class="col-form-label">L'heure d'arrivée:</label>
                        <input type="time" class="form-control" name="reach_time" id="reach_time" >
                    </div>



                    <div class="mb-3">
                        <label for="price" class="col-form-label">Prix:</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="e.g. 1000.00 DH">
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





<div class="modal fade" id="discountModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Ajouter l'offre</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="discount-form" method="post" action="" enctype="multipart/form-data">
                    {{ csrf_field() }} {{-- bach yet2aked anno lli rssel les infos
                howa men form mertabet belprojet=>token --}}

                <div class="mb-3">
                  <label for="discount_percentage" class="form-label h4">Ajouter reduction pourcentage</label>
                  <input type="text" class="form-control" id="discount_percentage" name="discount_percentage" >
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

        ajax: "{{ route('traveldetails.index') }}",

        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'company_name', name: 'company_name'},
            {data: 'from_city', name:'from_city'},
            {data: 'to_city', name:'to_city'},
            {data: 'travel_date', name:'travel_date'},
            {data: 'travel_time', name:'travel_time'},
            {data: 'reach_time', name:'reach_time'},
            {data: 'price', name:'price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},


        ]

    });


           // الاضافة
        $('#createNewElement').click(function () {

           $('#form').trigger("reset");

           $('#modelHeading').html("Ajouter un nouvel Detail de voyage");  // هذا العنوان

           $("#form").attr("action", "/traveldetail/store"); // هنا وضعت الاكشن

           $('#pageModel').modal('show');

        });

           //التعديل

        $('body').on('click', '.editTravelDetail', function () {

           var travel_detail_id = $(this).data('id'); //احضر الايدي تبعه

           $.get('/traveldetail/edit/'+ travel_detail_id, function (data) {  // احضر البيانات

           $('#modelHeading').html("Modifier Detail voyage");  //غير عنوان الفورم

           $("#form").attr("action", "/traveldetail/update/"+travel_detail_id);  // هنا وضعت الاكشن

           $('#pageModel').modal('show'); // لاظهار المودل

                // هنا لوضع القيم داخل الحقول


           $('#company-name option[value='+data[0].airline_company+']').attr('selected','selected');
           $('#from_to option[value='+data[0].direction_id+']').attr('selected','selected');
           $('#travel_date').val(data[0].travel_date);
           $('#travel_time').val(data[0].travel_time);
           $('#reach_time').val(data[0].reach_time);
           $('#price').val(data[0].price);

           })

        });





        $('body').on('click', '.AddOffer', function () {

           var travel_detail_id = $(this).data('id');

           $.get('/traveldetail/edit/'+ travel_detail_id, function (data) {

           $("#discount-form").attr("action", "/traveloffer/store/"+travel_detail_id);

           $('#discountModel').modal('show'); // لاظهار المودل

            })

        });


        $("#Travel-Detail-menu").attr("class", "nav-link active");

  });

</script>

@endsection
