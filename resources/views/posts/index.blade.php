
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Happy hour') }}
        </h2>
    </x-slot>

    @foreach($posts as $post)
    <p>{{$post->user->name}}:</p>
    <p>{{$post->description}}</p>
    <img src="{{ $post->img_url }}">
    @endforeach
  </x-app-layout>
