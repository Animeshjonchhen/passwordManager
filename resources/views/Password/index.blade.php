<x-layout>
    <h1>Display all password</h1>

    <div class="container-fluid">
        @can('view password')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Password Id</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">URL</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Category</th>
                        @can('edit password')
                            <th scope="col">Action</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    @isset($passwords)
                        @foreach ($passwords as $password)
                            <tr>
                                <td scope="col">{{ $password->id }} </td>
                                <td scope="col">{{ $password->username }}</td>
                                <td scope="col">{{ Crypt::decryptString($password->password) }}</td>
                                <td scope="col">{{ $password->url }}</td>
                                <td scope="col">{{ $password->remarks }}</td>
                                <td scope="col">{{ $password->category->name }}</td>

                                @can('edit password')
                                    <td scope="col" class="d-flex">
                                        <a href="/update/password/{{ $password->id }} " class="btn btn-primary">Edit</a>

                                        <form action="/delete/password/{{ $password->id }} " method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger mx-3" type="submit">Delete</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    @endisset()

                </tbody>
            </table>
        @endcan
</x-layout>
