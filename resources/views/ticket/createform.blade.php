@extends('ticket.layout')

@section('content')

    <h1>Hibajegy létrehozása</h1>
    <form action="{{route('ticket.store')}}" method="post">
        @csrf
        <label for="category_id">Kategória:</label>

        <input type="number" id="category_id" name="category_id" value="{{ old('category_id') }}"
               @error('category_id') style="border: solid red 1px"
            @enderror>

        @error('category_id')
        {{ $message  }}
        @enderror
        <br>

        <label for="priority">Prioritás:</label>
        <input type="number" id="priority" name="priority" value="{{ old('priority') }}"
           @error('priority') style="border: solid red 1px"
        @enderror>

        @error('priority')
        {{ $message  }}
        @enderror
        <br>

        <label for="description">Hiba leírása:</label>
        <textarea name="description" id="description"
              @error('description') style="border: solid red 1px"
                  @enderror
                  cols="30" rows="10">{{ old('description') }}</textarea>

        @error('description')
        {{ $message  }}
        @enderror
        <br>

        <input type="submit" value="Létrehozás">
    </form>
@stop


