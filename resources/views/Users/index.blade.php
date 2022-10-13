<x-layout>
    @can('add user')
        <div class="mt-3">
            <a href="/create/user" class="container">Create new user</a>
        </div>
    @endcan

    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">User Id</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    @can('edit users')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"> {{ $user->id }} </th>
                        <td> {{ $user->name }} </td>
                        <td> {{ $user->email }} </td>
                        @can('edit users')
                            <td class="d-flex">

                                <a href="/update/users/{{ $user->id }}" class="flex btn btn-primary"> Edit</a>

                                @can('delete user')
                                    <form action="/delete/users/{{ $user->id }}" method="post" class="flex">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger mx-3">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
