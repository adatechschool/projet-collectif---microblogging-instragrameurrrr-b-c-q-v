<x-app-layout>
<form role="form" action="{{ url('/posts') }}" method='POST'>
 {!! csrf_field() !!}
 <div class="form-group" >
    <x-label for="description">Strike a prost</x-label>
    <x-input class="form-control" name="description" placeholder="Blabla" value="Type anything"/>
</div>
<div class="form-group" >
    <x-label for="img_url">image</x-label>
    <x-input class="form-control" name="img_url" placeholder="Img" value="url"/>
</div>
  <input type="hidden" name="user_id" value="1"/>
  <x-button >
                    {{ __('Prost') }}
  </x-button>
</form> 
</x-app-layout>