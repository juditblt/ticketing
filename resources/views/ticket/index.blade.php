@extends('ticket.layout')

@section('content')
    <h1>TICKET INDEX</h1>
    <table border="1">
        <thead>
        <tr>
            <th>Bejelentő</th>
            <th>Kategória</th>
            <th>Állapot</th>
            <th>Piroritás</th>
            <th>Leírás</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td colspan="6">
                <a href="{{ route('ticket.create') }}">
                    Létrehozás
                </a>
            </td>
        </tr>

        @forelse($tickets as $ticket)
            <tr>
                <td>{{ $ticket->user->name ?? "-törölt-" }}</td>
                <td>{{ $ticket['category_id'] }}</td>
                <td>{{ $ticket['status'] }}</td>
                <td>{{ $ticket->statusPrio() }}</td>
                <td>{{ $ticket['description'] }}</td>
                <td>
                    <a href="{{ route('ticket.show', ["id"=>$ticket["id"]]) }}">Részletek</a>
                    <br/>
                </td>
                <td>
                    <a href="{{ route('ticket.delete', ["id"=>$ticket["id"]]) }}">Törlés</a>
                    <br/>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">
                    Nincsenek hibajegyek
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{--
    Üdv {{$name}}!

    @if($name == "István")  <!-- lehet ezt is: (strlen($name) < 5) -->
        Cimborám!
    @else
        Van ingyen körtéd?
    @endif
    <hr>
    <!-- Amíg nincs egy break, megjelenít mindent! -->
    @switch($number)
        @case(1)
        First case
        @break
        @case(2)
        Second case
        @break
        @default
        Default case
    @endswitch
    <hr>
    @forelse($books as $book)
        {{ $book['name'] }}
    @empty
        Nincsenek könyvek
    @endforelse
    --}}
@stop
