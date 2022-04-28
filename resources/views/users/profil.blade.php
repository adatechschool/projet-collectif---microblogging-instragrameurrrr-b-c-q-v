
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hornithotrynques') }}
        </h2>
        </x-slot>
<div style="display: flex; justify-content: center; margin-top: 30px;">
<div style="display:flex;justify-content:center;flex-direction:column;align-items:center;text-align:left;" >
    <div>
        <img src="{{ Auth::user()->img}}" style="border-radius:190px; width:auto; height:150px;" ></img>  
        <!-- <img src="{{$user->img}}" style="border-radius:190px; width:auto; height:150px;"/>  -->
        <h1>{{$user->name}}</h1>
        <h1>{{$user->biography}}</h1>
        <h1>Followers : {{$followers_count}} </h1>
        <h1>Following : {{$following_count}}</h1>
    </div>

<!--  <img src="{{ $user->img_url }}"> -->

    <div>
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
    </div>
</div>

 <div class="w-full sm:max-w-md my-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin:50px;">
    <form role="form" action="{{ url('/users', [$user->id]) }}" method='POST'>
    {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">
            <div style="margin:10px;">
                <x-label for="biography" :value="__('Edit your biography')" />
                <x-input id="biography" rows="5" cols="33" class="block mt-1 w-full" type="text" name="biography" :value="old('biography')"/>
            </div>
        <div class="form-group" style="margin:10px;">
            <x-label for="img">Change your avatar</x-label>
            <x-input type="file" class="form-control" name="img" placeholder="Img" value="url"/>
        </div>
        <div style="display: block; float: right;">
            <x-button >
                    {{ __('Edit') }}
            </x-button>
        </div>
</div>

</form>
</div>
</div>


<div style="background-color: #F3F4F6; margin-top: -150px;">
@foreach($user->posts as $post)
    <div style="display:flex; flex-direction: column; align-items:center; justify-content: center;">
        <div style="border: 5px solid black; margin:10px; min-width: 700px; padding: 20px;">
            <div style="display: flex; align-items:center;">
                <img src="{{ $post->user->img}}" style="border-radius:190px; width:auto; height:60px;" ></img> 
                <h1 style="font-size: 5vh; margin-left: 10px;">{{$post->user->name}}</h1>
            </div>
            <img src="{{ url('public/images/'.$post->img_url) }}" alt="post images" style="max-width: 600px;height: auto;padding: 3%; margin: auto;">
            <h3 style="font-size: 3vh;">{{$post->description}}</h3> 
        </div>
    </div>
 <!-- 
   <img src="{{ $post->img_url }}" alt="post images" style="max-width: 600px;height: auto;margin-left: 30vw;padding: 3%;"> 
    -->
    @endforeach
</div>

</x-app-layout>
