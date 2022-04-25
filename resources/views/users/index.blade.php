{{-- layout fájl betöltése --}}
@extends('users.layout')

@section('content')
Felhasználók
@if(count($users) > 0)
    <table border="1">
        <tr>
            <td>Név</td>
            <td>Email</td>
            <td>Hibajegyek</td>
            <td></td>
        </tr>

        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach($user->tickets as $ticket)
                        <a href="{{ route('ticket.show', ["id"=>$ticket->id]) }}">
                            {{$ticket->id}}
                        </a>
                    @endforeach
                </td>
                <td></td>
            </tr>
        @endforeach
    </table>
@endif

{{--
Felhasználó (id-nem)
@if(count($users) > 0)
<ul>
    @foreach($users as $user)
    <li>
        <a href="{{ route('users.show', ['userid' =>$user['id']]) }}">
            {{$user['name']}}
        </a>
         ({{$user['id']}} - {{$user['gender']}})
    </li>
    @endforeach
</ul>
@endif
--}}
@stop
