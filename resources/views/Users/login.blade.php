<x-layout>
    
    <div class="container-fluid">
        <h1 class="text-primary text-center">
            Login!
        </h1>
    </div>

    <div class="container bg-light mt-5 p-4">
        <form action="/login" method="post">
            @csrf

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter email here">
            @error('email')
                {{$message}}
            @enderror
            <br>

            <label for="password" class="mt-2">Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter password here">
            <br>

            <button class="btn btn-primary mt-2" type="submit">Login</button>

        </form>
    </div>

</x-layout>