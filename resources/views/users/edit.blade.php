<x-guest-layout>
<form method='PUT'>
 <div class="form-group" >
    <label for="biography">Edit your biography</label>
    <input class="form-control" name="biography" placeholder="Biography" value={{ $user->biography }}>
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form> 
</x-guest-layout>