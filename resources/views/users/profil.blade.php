<x-guest-layout>
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



</x-guest-layout>