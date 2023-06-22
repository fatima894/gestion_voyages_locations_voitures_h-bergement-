@extends('layouts.admin_page')
@section('page')


<div class="d-flex justify-content-center align-items-center text-center" style="height: 60vh;">

<form method="post" action="/traveloffer/store/{{$id}}">
  {{ csrf_field() }}
  <div class="mb-3">
    <label for="discount_percentage" class="form-label h4">Mettez en reduction</label>
    <input type="text" class="form-control" id="discount_percentage" name="discount_percentage" >
  </div>
  <button type="submit" class="btn btn-success ">Envoyer</button>
</form>

</div>


@endsection
