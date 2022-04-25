{{-- Ha léteznek üzenetek... --}}
{{--
@isset($messages)

Üzenetek:
<ul>
    @foreach($messages as $message)
    <li>{{ $message['text'] }}</li>
    @endforeach
</ul>
@endisset
--}}

@if ($errors->any())
    <div class="alert alert-danger">
        Üzenetek:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div>
    @foreach(['danger', 'warning', 'success', 'info'] as $type)
        @if(Session::has('alert-' . $type))
            <p class="alert alert-{{ $type }}">
                {{ Session::get('alert-'. $type) }}
            </p>
        @endif
    @endforeach
</div>
