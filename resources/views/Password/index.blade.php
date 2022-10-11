<x-layout>
    <h1>Display all password</h1>

    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Password Id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">URL</th>
                    <th scope="col">Remarks</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>

            <tbody>
                @foreach($passwords as $password)
                    <tr>
                        <td scope="col">{{ $password->id }} </td>
                        <td scope="col">{{ $password->username }}</td>
                        <td scope="col">{{ Crypt::decryptString($password->password) }}</td>
                        <td scope="col">{{ $password->url }}</td>
                        <td scope="col">{{ $password->remarks }}</td>
                        {{-- <td scope="col">{{ $password->category->name }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
</x-layout>