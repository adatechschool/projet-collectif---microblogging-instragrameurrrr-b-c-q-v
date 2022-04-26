
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Happy hour') }}
        </h2>
    </x-slot>
    
    <form role="form" action="{{ url('/posts') }}" method='POST' enctype="multipart/form-data">
 {!! csrf_field() !!}
 <div class="form-group" >
    <x-label for="description">Strike a prost</x-label>
    <x-input class="form-control" name="description" placeholder="Blabla" value="Type anything"/>
</div>
<div class="form-group" >
    <x-label for="img_url">image</x-label>
    <x-input type="file" class="form-control" name="img_url" placeholder="Img" value="url"/>
</div>
  <!-- <input type="hidden" name="user_id" value="1"/> -->
  <x-button >
                    {{ __('Prost') }}
  </x-button>
</form> 
    @foreach($posts as $post)
    <p>{{$post->user->name}}:</p>
    <p>{{$post->description}}</p>
    <img src="{{ url('public/images/'.$post->img_url) }}"style="max-width: 600px;height: auto;margin-left: 30vw;padding: 3%;">
    @endforeach
  </x-app-layout>
