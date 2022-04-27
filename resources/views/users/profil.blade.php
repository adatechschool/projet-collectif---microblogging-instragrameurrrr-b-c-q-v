<x-guest-layout>
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hornithotrynques') }}
        </h2>
        </x-slot>

<div style="display:flex;justify-content:center;flex-direction:column;align-items:center;text-align:left;" >
 <img src="{{ Auth::user()->img}}" style="border-radius:190px; width:auto; height:150px;" ></img> 
<!-- <img src="{{$user->img}}" style="border-radius:190px; width:auto; height:150px;"/> -->
<h1>{{$user->name}}</h1>
<h1>{{$user->biography}}</h1>

<h1>Followers : {{$followers_count}} </h1>
<h1>Following : {{$following_count}}</h1>

</div>

 <img src="{{ $user->img_url }}">

 <form role="form" action="{{ url('/users', [$user->id]) }}" method='POST'>
 {!! csrf_field() !!}
 <input type="hidden" name="_method" value="PUT">
 <div class="w-full sm:max-w-md my-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin-bottom:50px;">
        <x-label for="biography" :value="__('Edit your biography')" />
        <x-input id="biography" rows="5" cols="33" class="block mt-1 w-full" type="text" name="biography" :value="old('biography')"/>
        <div class="form-group" >
    <x-label for="img">Change your avatar</x-label>
    <x-input type="file" class="form-control" name="img" placeholder="Img" value="url"/>
</div>
        <x-button >
                    {{ __('Edit') }}
        </x-button>
</div>

</form>

        @if (!$following)
<form role="form" action="{{ url('/followers')}}" method='POST'>
{!! csrf_field() !!}
<div class="w-full sm:max-w-md my-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin-bottom:50px;">
<input type="hidden" name="user_id" value='{{$user->id}}'>
        <x-button >
                    {{ __('Follow') }}
        </x-button>
        </div>
</form>
        @else
        <form role="form" action="/followers/{{$user->id}}" method='POST'>
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="w-full sm:max-w-md my-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin-bottom:50px;">
       <x-button >
                    {{ __('Unfollow') }}
        </x-button>
        </div>
</form>
        @endif


@foreach ($user->posts as $post) 
    <p>{{$post->user->name}}:</p>
    <p>{{$post->description}}</p>
    <img src="{{ url('public/images/'.$post->img_url) }}" alt="post images" style="max-width: 600px;height: auto;margin-left: 30vw;padding: 3%;"> 
   <!--  <img src="{{ $post->img_url }}" alt="post images" style="max-width: 600px;height: auto;margin-left: 30vw;padding: 3%;">  -->
   <form role="form" action="{{ url('/likes') }}" method='POST'>
   {!! csrf_field() !!}
   <input type="hidden" name="like" value='{{$post->id}}'>
   <x-button  >
                    {{ __('Cheers to that !') }}
  </x-button>
  <p> 🍻  x {{$post->likes->count()}}</p>

</form>
@endforeach


</x-app-layout>
</x-guest-layout>