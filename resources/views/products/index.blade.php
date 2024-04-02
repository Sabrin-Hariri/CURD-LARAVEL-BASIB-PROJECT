@extends('products.layout')
@section('content')

<br>
{{-- <div class="container">
    <div class="row">
      <div class="col align-self-start">

<a href="{{route('products.create')}}" class="btn btn-primary active" role="button">Create Product</a>
{{-- <a href="{{route('products.edit')}}" class="btn btn-primary active" role="button">Edit Product</a> --}}
{{-- <a href="{{route('products.show')}}" class="btn btn-primary active" role="button">Show Product</a> --}}
    {{-- </div> --}}
{{-- </div> --}}
  {{-- </div> --}}
<br> 

products


  @if($message=Session::get('success'))
  <div class="alert alert-info" role="alert">
            {{$message}}
  </div>
  @endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Details</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $item)
          
       <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->details}}</td>
        <td><img src="/images/{{$item->image}}" width="300" height="200" ></td>
        <td>
          <br>
          @auth
              <form action="{{route('products.destroy',$item->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
             </form>
             <a class="btn btn-primary" href="{{route('products.edit',$item->id)}}">Edit  </a>


          @endauth
            
    <a class="btn btn-info" href="{{route('products.show',$item->id)}}">Show  </a>     
    </td>
</tr>
      @endforeach
    </tbody>
  </table>

{!! $products->links() !!}




    
@endsection