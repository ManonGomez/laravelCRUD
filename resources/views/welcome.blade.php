@extends('layouts.app')

@section('content')

    <div class="col-md-6 mx-auto">
        <div class="accordion" id="accordionExample">
            @foreach ($stars as $star)
            <div class="accordion-item">
                <h2 class="accordion-header" id="{{ $star->id }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $star->id }}" aria-expanded="true" aria-controls="collapseOne">
                    {{ $star->firstName }} {{ $star->lastName }}
                </button>
                </h2>
                @if ($loop->first)
                <div id="collapse{{ $star->id }}" class="accordion-collapse collapse show" aria-labelledby="{{ $star->id }}" data-bs-parent="#accordionExample">
                @else
                <div id="collapse{{ $star->id }}" class="accordion-collapse collapse" aria-labelledby="{{ $star->id }}" data-bs-parent="#accordionExample">
                @endif
                <div class="accordion-body">
                    <img src="/image/{{ $star->image }}" width="100px">
                    {{ $star->description }}
                </div>
                </div>
            </div>
            @endforeach
        <div>
    </div>
        
@endsection