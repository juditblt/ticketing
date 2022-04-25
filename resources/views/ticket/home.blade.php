@extends('ticket.layout')

@section('content')
{{--
    <form action="{{ route('ticket.create') }}" method="post">
        @csrf

        <h2>Hibajegy létrehozása</h2>

        <label for="name">Feladó neve:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @if($errors->has('name'))
            <p style="color: red;">
                {{$errors->first('name')}}
            </p>
        @endif
        <br>

        <label for="email">Feladó email címe:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @if($errors->has('email'))
            <p style="color: red;">
                {{$errors->first('email')}}
            </p>
        @endif
        <br>

        Prioritás:
        @for($i = 1; $i < 6; $i++)
            @if(old('priority') == $i)
            <input type="radio" name="priority" id="priority-{{$i}}" value="{{$i}}" checked="checked">
            @else
            <input type="radio" name="priority" id="priority-{{$i}}" value="{{$i}}">
            @endif
            <label for="priority-{{$i}}">
                {{$i}}
            </label>
        @endfor
        <br>

        <label for="department">Részleg:</label>
        <select name="department" id="department">
            <option disabled selected>Válassz!</option>
            <option value="it" {{old('department') == 'it' ? 'selected="selected"' : ''}}>Informatika</option>
            <option value="cleaning" {{old('department') == 'cleaning' ? 'selected="selected"' : ''}}>Takarítás</option>
            <option value="maintenance" {{old('department') == 'maintenance' ? 'selected="selected"' : ''}}>Karbantartás</option>
        </select>
        <br>

        Bejelentés szövege:
        <textarea name="text" cols="30" rows="10">{{ old('text') }}</textarea>
        <br>

        <input type="submit" value="Létrehozás">
    </form>

    <hr>

    <table>
        <tr>
            <td>Sender</td>
            <td>Message</td>
            <td>Priority</td>
        </tr>

        {{-- Adatokat tartalmazó sorok generálása
                a controllerből átadott ticketek alapján --}}
    {{--
        @forelse($tickets as $ticket)
        <tr>
            <td>{{$ticket['sender']}}</td>
            <td>{{$ticket['message']}}</td>
            <td>{{$ticket['priority']}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3">
                Nincsenek ticketek
            </td>
        </tr>
        @endforelse
    </table>

    --}}
@stop
