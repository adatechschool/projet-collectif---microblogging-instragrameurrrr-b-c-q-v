<x-guest-layout>
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hornithotrynques') }}
        </h2>
        </x-slot>
 <p>{{$user->name}}:</p>
  <p>{{$user->biography}}</p>
 <img src="{{ $user->img_url }}">

 <form role="form" action="{{ url('/users', $user->id) }}" method='POST'>
 {!! csrf_field() !!}
 <input type="hidden" name="_method" value="PUT">
 <div class="form-group" >
    <label for="biography">Edit your biography</label>
    <input class="form-control" name="biography" placeholder="Biography" value="Type anything">
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>  



</x-app-layout>
</x-guest-layout>