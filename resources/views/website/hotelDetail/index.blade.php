@extends('website_layouts.master')

@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('css/hotelDetailSlider.css') }}">
@endsection

@section('content')

<div class="w-[95%] md:w-[80%] mx-auto space-y-10 my-20">
    
    <h2 class="font-semibold text-2xl">{{$hotel->name}}</h2>
    <span class="text-gray1">Note: {{$hotel->note}}</span>
    <div class="w-full h-[600px]">
        @include('website_layouts.partials._HotelDetailSlider1', ['hotel_images' => $hotel_images])
    </div>

    <div>
        <h4 class="font-semibold text-xl pb-3">{{$hotel->excerpt}}</h4>
        <p>{!!$hotel->description!!}</p>
    </div>

    <div class="bg-red-500 flex">
        {!! $hotel->google_map !!}
    </div>
</div>


@endsection