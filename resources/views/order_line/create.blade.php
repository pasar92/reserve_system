@extends('layouts.app')


@section('content')
<div class="row container" >
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New product to order</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('order_line.index', ['order' => $order->id]) }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('order.order_line.store', ['order' => $order->id]) }}" method="POST" class="container">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Amount:</strong>
                <input type="number" name="amount" class="form-control" placeholder="Enter amount">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product:</strong>
              <select name="product_id" required class="form-control">
                <option selected disabled>Select a product</option>
                @foreach($products as $product)
                  <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
              </select>
            </div>
        </div>

      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection

