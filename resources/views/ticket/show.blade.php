@extends('ticket.layout')

@section('content')
    <h1>TICKET - {{ $ticket->id }}</h1>

    Bejelentő:
    @if($ticket->user != null)
    <a href="{{ route('users.show', ['id' => $ticket->user->id]) }}">
        {{ $ticket->user->name }}
    </a>
    @else
        -törölt felhasználó-
    @endif

    <br>

    Kategória: {{ $ticket->category_id }} <br>
    Állapot: {{ $ticket->status }} <br>
    Prioritás: {{ $ticket->priority }} <br>
    Leírás: <br>
    {{ $ticket->description }}
@stop

