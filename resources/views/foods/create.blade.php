@extends('foods.layout')
<!--  hier erbt die Instanz jeweils von der Foods.Layout -->
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <br/>
        <div class="pull-left">
            <h2>Neues Lebensmittel hinzufügen</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('foods.index') }}"> Zurück</a>      <!-- Zurück Button, der wieder zu der Hauptseite "Foods" geführt wird -->
        </div>
    </div>
</div>
   

@if ($errors->any())                   
    <div class="alert alert-danger">
        <strong>Huch!</strong> Es gab ein Problem mit deiner Eingabe.<br><br>       <!-- hier kommt eine Fehlermeldung, sobald z.B auf den Button geclickt wird, ohne das etwas in de Felder eingegeben wurde-->
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                                                                 
<form action="{{ route('foods.store') }}" method="POST">    <!-- Die Store-Funktion wird hier aufgeruft und per POST Methode wird der Eintrag in der Datenbank abgelegt-->
    @csrf <!-- hiermit wird ein verstecktes INput feld eingebaut, das verhindert das mehrere Input Felder mehrfach verwendet werden können--> 
    <!-- hierbei handelt es sich um eine Laravel Funktion-->   
    <!-- Quelle: https://www.youtube.com/watch?v=ZGVhSAW2NYw&t=601s -->
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br/>
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>                                                        <!-- HTML Code für die Felder von Details-->
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Details"></textarea>
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Bestätigen</button>
        </div>
    </div>
   
    
</form>
@endsection