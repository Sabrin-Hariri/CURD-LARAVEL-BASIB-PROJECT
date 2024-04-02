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


{{-- form to add your product info  --}}
<div class="container  p-5 "> 
  
  <div class="mb-3">

  <h3><p>{{$product->name}}</p></h3>
  </div>

  <div class="mb-3">
<h5>  <p>{{$product->details}}</p></h5>
</div>

<div class="mb-3">
    <img src="/images/{{$product->image}}" width="300" height="200" >
</div>


</div>



@endsection