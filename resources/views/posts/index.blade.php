<x-guest-layout>
  @foreach($posts as $post)
  <p>{{$post->user->name}}:</p>
  <p>{{$post->description}}</p>
  <img src="{{ $post->img_url }}">
  @endforeach
</x-guest-layout>