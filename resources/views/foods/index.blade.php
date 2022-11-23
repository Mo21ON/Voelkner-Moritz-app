@extends('foods.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Virtueller Kühlschrank</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('foods.create') }}"> Neues Lebensmittel hinzufügen </a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($foods as $food)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $food->name }}</td>
            <td>{{ $food->detail }}</td>
            <td>
                <form action="{{ route('foods.destroy',$foods->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('foods.show',$foods->id) }}">Anzeigen</a>
    
                    <a class="btn btn-primary" href="{{ route('foods.edit',$food->id) }}">Bearbeiten</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Löschen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $foods->links() !!}
      
@endsection