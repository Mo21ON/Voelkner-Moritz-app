@extends('foods.layout')

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!--Einbinden von Jquery für das JavaScript, Funktion des Buttons usw. -->
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br />
            <br />
            <div class="pull-left">
                <h2>Virtueller Kühlschrank</h2>
              <br/>
            </div>
            <div class="pull-right">
                <a id="addfood" class="btn btn-success" href="{{ route('foods.create') }}"> Neues Lebensmittel hinzufügen
                </a>

                <br />
                <br />
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
                    <form action="{{ route('foods.destroy', $food->id) }}" method="POST">
                        <!-- hier wird eine neue Ressource erstellt, zum Löschen-->

                        <a class="btn btn-info" href="{{ route('foods.show', $food->id) }}">Anzeigen</a>

                        <a class="btn btn-primary" href="{{ route('foods.edit', $food->id) }}">Bearbeiten</a>
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Entfernen</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="col-lg-4 margin-tb mt-5">
        <!-- Die ID "trigger-ajax" wird hier vergeben und unten im JS aufgerufen, diese führt dann das Click Event aus-->
        <a class="btn btn-warning" id="trigger-ajax">Lebensmittel zählen</a>
    </div>
    <div class="col-lg-4 margin-tb mt-5">
        <p>Anzahl Lebensmittel im Kühlschrank:</p>
        <p id="ajax-result"></p>
    </div>

    {{-- {!! $foods->links() !!} --}}

    <script>
        $("#trigger-ajax").click(function() {
            $.ajax({
                url: "{{ route('counter') }}", //Ajax Zhäler, das InlineJavascript  definiert hier das Ajax, als Zähler
                success: function(
                    result
                    ) { // die ID "trigger Ajax" wird aufgerufen und die Funktion click wird ausgelöst
                    $("#ajax-result").html(result);
                },

            });
        });
    </script>
@endsection
