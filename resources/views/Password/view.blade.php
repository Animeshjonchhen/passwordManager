<x-layout>
    <h1>Display all password</h1>

    <div class="container-fluid">
        @can('view password')
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">URL</th>
                        <th scope="col">Remarks</th>
                        @can('edit password')
                            <th scope="col">Action</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    @isset($password)
                        <tr>
                            <td scope="col">{{ $password->email }}</td>
                            <td scope="col">{{ Crypt::decryptString($password->password) }}</td>
                            <td scope="col">{{ $password->url }}</td>
                            <td scope="col">{{ $password->remarks }}</td>

                            @can('view password')
                                <td scope="col" class="d-flex">

                                    @can('edit password')
                                        <a href="/update/password/{{ $password->id }} " class="btn btn-primary mx-3">Edit</a>
                                    @endcan

                                    @if (auth()->user()->id == $password->user->id ||
                                        auth()->user()->name == 'Example Super-Admin User' ||
                                        auth()->user()->name == 'Example admin' ||
                                        auth()->user()->name == 'Example user')
                                        @can('delete password')
                                            <form action="/delete/password/{{ $password->id }} " method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger mx-3" type="submit">Delete</button>
                                            </form>
                                        @endcan
                                    @endif
                                </td>
                            @endcan
                        </tr>
                    @endisset()

                </tbody>
            </table>
        @endcan
</x-layout>
