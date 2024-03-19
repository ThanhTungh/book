<form action="/login" method="post">
    @csrf
    <input type="email" name="email" id="email">
    <input type="password" name="password" id="password">
    <button type="submit">Login</button>
    </form>