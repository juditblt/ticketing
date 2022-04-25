@extends('users.layout')

@section('content')
    <h1>Felhasználó - {{ $user->name }}</h1>

    Id: {{ $user['id'] }} <br/>
    Név: {{ $user['email'] }} <br/>
    Hibajegyek száma: {{ $user->ticketCount() }} <br><br>

    Hibajegyek:
    <ul>
        @forelse($user->tickets as $ticket)
            <li>
                <a href="{{ route('ticket.show', ['id'=>$ticket->id]) }}">
                    {{$ticket->id}}
                </a>
                 - {{$ticket->description}}
            </li>
        @empty
            <li>Nincsenek hibajegyek</li>
        @endforelse
    </ul>

    <hr>
    <a href="{{ route('users.index') }}">Vissza</a>
@stop
