<h2>Login</h2>

<!-- @if($errors->any())
    @foreach($errors->all() as $error) 
        <li>{{$error}}
    @endforeach
@endif -->
<form method="post" action="users">
    @csrf
    <input type="text" name="username" value="" />
    <br>
    @error('username'){{$message}}@enderror
    <br>
    
    <input type="password" name="password" value="" />
    <br>
    @error('password'){{$message}}@enderror
    <br>
    <button type="submit">Login</button>
</form>