@extends('layout.base')
@section('contents')

<div class="justify-center items-center border-t border-gray-400 py-1 w-9/12 mx-auto">
    <div class="">
        <h1 class="font-bold text-30px text-teal-600">Popular</h1>
    </div>
    {{-- Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        @foreach($postData as $post)
        <div class="card border border-gray-200 rounded-3xl overflow-hidden"> 
            <div class="group card-body h-250px relative overflow-hidden">
                <img class="h-full w-full group-hover:scale-125 transition ease-in-out duration-300" src="{{ url('/thumbnails'.'/'.$post->thumbnail)}}" alt="card images">
                <div class="absolute right-0 top-12 px-2 text-20px rounded-tl-3xl rounded-bl-3xl font-semibold bg-gradient-to-r from-teal-600 to-gray-900 text-slate-50">
                    HDR +
                </div>
                <div class="absolute top-0 bottom-0 left-0 right-0 flex justify-center items-center hidden group-hover:flex">
                    <div class="w-40% h-40% flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <circle cx="12" cy="12" r="9" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                            <polygon points="10 8 16 12 10 16 10 8" fill="currentColor"/>
                        </svg>           
                    </div>
                </div>
            </div>
            <div class="card-footer p-2">
                <a href="{{ route('master.page', $post->slug) }}" class="mytitle font-semibold hover:underline underline-offset-1 hover:text-teal-600">
                     {{ $post->title }}
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="p-3"></div>
    <div class="bg-blue-300 p-2 font-bold text-black-900 !min-w-full">
        {{$postData->links()}}
    </div>
</div>

<script>
    var titleElements = document.getElementsByClassName("mytitle");

    for(var i = 0; i < titleElements.length; i++) {
        var title = titleElements[i].textContent;

        if(title.length > 90) {
            titleElements[i].textContent = title.slice(0, 90) + ".....";
        }
    }
</script>

@endsection
