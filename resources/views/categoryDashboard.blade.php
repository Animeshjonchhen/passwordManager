<x-layout>
    @can('add category')
        <div class="mt-3">
            <a href="/create/category" class="container">Create new Category</a>
        </div>
    @endcan

    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Category Id</th>
                    <th scope="col">Category Name</th>
                    @can('edit category')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row"> {{ $category->id }} </th>
                        <td> {{ $category->name }} </td>
                        @can('edit category')
                            <td class="d-flex">

                                <a href="/update/category/{{ $category->id }}" class="flex btn btn-primary"> Edit</a>

                                <form action="/delete/category/{{ $category->id }}" method="post" class="flex">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-3">Delete</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
