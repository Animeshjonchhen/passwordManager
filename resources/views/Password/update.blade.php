<x-layout>
    <div class="container">
        <h1 class="text-primary text-center">
            Update Password!
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
                <h5 class="card-title">Update Password</h5>

                <form action="/update/password/{{$password->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <label for="Email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $password->email) }} ">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Url" class="col-sm-2 col-form-label">URL</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url" name="url"
                                value=" {{ old('url', $password->url) }} ">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <select name="category_id" id="category_id">

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Remarks" class="col-sm-2 col-form-label">Remarks</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Remarks for the password" class="form-control"
                                id="remarks" name="remarks" value="{{ old('remarks',$password->remarks) }}">
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
