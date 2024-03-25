<!-- use Illuminate\Support\Str; -->
@extends('website_layouts.master')

@section('content')


<div class="w-[95%] md:w-[70%] lg:w-[60%]  mx-auto space-y-10 my-20">
    @foreach($hotels as $hotel)
        <div class="bg-gray-100 shadow-lg w-full min-h-[250px] h-max flex flex-col lg:flex-row items-center  ">
        @if(count($hotel->images) > 0 )
            <!-- <img src="{{asset('images/hotels/test-hotel.jpg')}}" alt="" class="lg:h-[250px]  lg:w-[30%]  object-cover"> -->
            <img src="{{ asset($hotel->images[0]->path) }}" alt="" class="lg:h-[250px]  lg:w-[30%]  object-cover">
        @else
            <img src="{{asset('images/hotels/default-hotel.jpg')}}" alt="" class="lg:h-[250px]  lg:w-[30%]  object-cover">
        @endif    
        
        
            
            <div class="space-y-5 px-10 py-5">
                <h4 class="font-semibold text-xl">{{$hotel->name}}</h4>
                <p>{{ Str::of($hotel->description)->limit(300, '...') }}</p>
                <a href="/hotel-id/{{$hotel->id}}" class="bg-[#9a1d21] inline-block cursor-pointer text-white py-2 px-7 rounded-md hover:bg-opacity-90">View Details</a>            
            </div>
        </div>  
    @endforeach    
    
    {{ $hotels->links() }}

</div>


@endsection