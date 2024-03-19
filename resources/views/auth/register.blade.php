<form action="/register" method="post">
    @csrf
    <input type="text" name="name" id="name">
    <input type="email" name="email" id="email">
    <input type="password" name="password" id="password">
    <button type="submit">Register</button>
    </form>