@extends('foods.layout')
<!-- die edit.blade erbt ebenfalls von der Food.Layout. Die Edit.Blade ist eine Verknüpfung. Hier wird der Bereich der Seite definiert--> 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br/>          
            <div class="pull-left">
                <h2>Lebensmittel bearbeiten</h2>
                <br/>
               
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('foods.index') }}"> Zurück</a>            
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Es gab ein Problem mit deiner Eingabe.<br><br>        
            <ul>  <!--hier kommt ebenfalls eine Fehlermeldung, sobald z.B auf den Button geclickt wird, ohne das etwas in de Felder eingegeben wurde-->
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('foods.update',$food->id) }}" method="POST">
        @csrf
        @method('PUT')
   
        <br/>
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" value="{{ $food->name }}" class="form-control" placeholder="Name">
                    <br/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong >Details:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $food->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br/>
              <button type="submit" class="btn btn-primary">Bestätigen</button>
              
            </div>
        </div>
   
    </form>
@endsection