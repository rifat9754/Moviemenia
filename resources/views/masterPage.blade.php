@extends('layout.base')

@section('contents')
        <div class="sm:text-[30px] sm:text-[30px] text-lg font-bold mb-4">
            {{ $data->title }}
        </div>
        <div class="sm:px-[10%] lg:px-[12%] text-lg px-[5%]">
            {!! $data->description !!}

        </div>

@endsection



