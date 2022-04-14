<x-guest-layout>
  <p>{{$user->name}}:</p>
  <p>{{$user->biography}}</p>
 <img src="{{ $user->img_url }}">
 <form action='/users/1' method='PATCH'>
 <div class="form-group" >
    <label for="biography">Edit your biography</label>
    <input class="form-control" name="biography" placeholder="Biography" value={{ $user->biography }}>
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form> 

</x-guest-layout>