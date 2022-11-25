@extends('foods.layout')

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br/>
                <br/>
            <div class="pull-left">
           <h2>Virtueller Kühlschrank</h2> 
              
                <br/>     
               
            </div>
    
            <div class="pull-right">
                <a id="addfood" class="btn btn-success" href="{{ route('foods.create') }}"> Neues Lebensmittel hinzufügen </a>
                
                <br/>
                <br/>
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
            <th>Nummer</th>
            <th>Name des Lebensmittel</th>
            <th>Weitere Details</th>
            <th width="400px">Verwalten</th>
            
        </tr>
        @foreach ($foods as $food)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $food->name }}</td>
            <td>{{ $food->detail }}</td>
            <td>
                <form action="{{ route('foods.destroy',$food->id) }}" method="POST">          <!-- hier wird eine neue Ressource erstellt, zum Löschen-->
   
                    <a class="btn btn-info" href="{{ route('foods.show',$food->id) }}">Anzeigen</a>
    
                    <a class="btn btn-primary" href="{{ route('foods.edit',$food->id) }}">Bearbeiten</a>

                   
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Löschen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="col-lg-4 margin-tb mt-5">
        <a class="btn btn-warning" id="trigger-ajax" >Trigger Ajax</a>
    </div>
    <div class="col-lg-4 margin-tb mt-5">
        <p>The Ajax Result is:</p>
        <p id="ajax-result"></p>
    </div>
  
    {{-- {!! $foods->links() !!} --}}

    <script>
        $("#trigger-ajax").click(function(){
            $.ajax({url: "{{ route('counter') }}",
                success: function(result){
                    $("#ajax-result").html(result);
                }, 
            
            });
        });
    </script>

@endsection



       

   