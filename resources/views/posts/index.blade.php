
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Happy hour') }}
        </h2>
    </x-slot>
    
    <form role="form" action="{{ url('/posts') }}" method='POST'>
 {!! csrf_field() !!}
 <div class="form-group" >
    <label for="description">write your post</label>
    <input class="form-control" name="description" placeholder="Blabla" value="Type anything">
</div>
<div class="form-group" >
    <label for="img_url">image</label>
    <input class="form-control" name="img_url" placeholder="Img" value="url">
</div>
  <input type="hidden" name="user_id" value="1">
<button type="submit" class="btn btn-default">Submit</button>
</form> 
    @foreach($posts as $post)
    <p>{{$post->user->name}}:</p>
    <p>{{$post->description}}</p>
    <img src="{{ $post->img_url }}">
    @endforeach
  </x-app-layout>
