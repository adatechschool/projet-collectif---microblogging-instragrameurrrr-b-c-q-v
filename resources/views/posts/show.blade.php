<x-guest-layout>
  <p>{{$post->user->name}}:</p>
  <p>{{$post->description}}</p>
  <img src="{{ $post->img_url }}">
</x-guest-layout>