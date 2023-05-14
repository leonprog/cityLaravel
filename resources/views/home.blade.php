@extends("layout.layout")

@section("title", "Home")

@section("content")
    Выберите ваш город

    <div>
        @foreach($areas as $area)
        <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $area->name }}
        </button>
        <ul class="dropdown-menu">
                @if(count($area['cities']) === 0)
                    <li><a class="dropdown-item" href="{{url($area->slug)}}">{{ $area->name }}</a></li>
                @else
                    @foreach($area->cities as $city)
                        <li><a class="dropdown-item" href="{{ url($city->slug) }}">{{ $city->name }}</a></li>
                    @endforeach
                @endif          

        </ul>
        </div>
        @endforeach
    </div>
@endsection