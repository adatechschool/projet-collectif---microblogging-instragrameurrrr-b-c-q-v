
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Happy hour') }}
        </h2>
    </x-slot>
 
    <div class="w-full sm:max-w-md my-5 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin:50px;">
    <form role="form" action="{{ url('/posts') }}" method='POST' enctype="multipart/form-data">
 {!! csrf_field() !!}
 <div class="form-group" style="margin:10px;" >
    <x-label for="description">Strike a prost</x-label>
    <x-input class="form-control" name="description" placeholder="Blabla" value="Type anything"/>
</div>
<div class="form-group" style="margin:10px;">
    <x-label for="img_url">Upload an image</x-label>
    <x-input type="file" class="form-control" name="img_url" placeholder="Img" value="url"/>
</div>
  <!-- <input type="hidden" name="user_id" value="1"/> -->
  <div style="display: block; float: right;">
  <x-button >
                    {{ __('Prost') }}
  </x-button>
</div>
</form> 
</div>

    @foreach($posts as $post)
    <div style="display:flex; flex-direction: column; align-items:center; justify-content: center;">
    <div style="border: 5px solid black; margin:10px; width: 700px; height:auto; padding: 20px;">
    <div style="display: flex; align-items:center;">
    <img src="{{ $post->user->img}}" style="border-radius:190px; width:auto; height:60px;" ></img> 
    <a href="users/{{$post->user->id}}"> <h1 style="font-size: 5vh; margin-left: 10px;">{{$post->user->name}}</h1></a>
</div>

   <img src="{{ url('public/images/'.$post->img_url) }}" alt="post images" style="max-width: 600px;height: auto;padding: 3%; margin: auto;">

   <h3 style="font-size: 3vh;">{{$post->description}}</h3> 
<div style="display:flex;justify-content:flex-end;">
   <form role="form" action="{{ url('/likes') }}" method='POST'>
   {!! csrf_field() !!}
   <input type="hidden" name="like" value='{{$post->id}}'>
   <div style="margin-right:20px;">
   <x-button  >
                    {{ __('Cheers to that !') }}
  </x-button>

  <p> 🍻  x {{$post->likes->count()}}</p>
  </div>
</form>

   <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
    @csrf
    <input type="hidden" name="_method" value="DELETE"> 
  <x-button >
                    {{ __('Adios') }}
  </x-button>

</form>
</div>
</div>
</div>
 
    @endforeach


    
  </x-app-layout>
