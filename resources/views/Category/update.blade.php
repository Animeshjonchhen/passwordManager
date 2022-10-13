<x-layout>

    <div class="container">
        <h1 class="text-primary text-center">
            Update Category!
        </h1>
        <div class="card">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <h5 class="card-title">Update Category Form</h5>

                <form action="/update/category/{{ $category->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label for="Category Name" class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-layout>
