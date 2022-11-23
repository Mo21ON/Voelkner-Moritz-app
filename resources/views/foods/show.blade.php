@extends('foods.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dein Lebensmittel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('foods.index') }}"> Zurück</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $food->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $food->detail }}
            </div>
        </div>
    </div>
@endsection