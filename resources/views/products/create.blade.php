@extends('products.layout')
@section('content')


<div class="container p-5">
  <div class="row">
    <div class="col align-self-start">

<a href="{{route('products.index')}}" class="btn btn-primary active" role="button">All Product</a>
{{-- <a href="{{route('products.edit',$item->id)}}" class="btn btn-primary active" role="button">Edit Product</a> --}}
{{-- <a href="{{route('products.show')}}" class="btn btn-primary active" role="button">Show Product</a> --}}
  </div>
</div>
</div>

{{-- for error  --}}
@if ($errors->any())
{{-- <div class="alert alert-dark" role="alert"> --}}

<div class="alert alert-danger " role="alert">
  <ul>
    @foreach ($errors->all() as $item )
    <li>{{$item}}</li>
    @endforeach
  
  </ul>
</div>
@endif

{{-- form to add your product info  --}}
<div class="container  p-5 "> 
  <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data"  > 
  
  @csrf
  
  <div class="mb-3">
    <label for=" " class="form-label">Name</label>
    <input type="text"    class="form-control"   name="name"   aria-describedby="helpId"  placeholder=""  />
  </div>
<div class="mb-3">
  <label for="" class="form-label"> Add Details </label>
  <textarea class="form-control" name="details" id="" rows="3"></textarea>
</div>

<div class="mb-3">
  <label for=" " class="form-label">Uploud image </label>
  <input type="file"    class="form-control"   name="image"   aria-describedby="helpId"  placeholder=""  />
</div>

<button  type="submit" class="btn btn-primary" >Save </button>

  </form>

</div>






















@endsection