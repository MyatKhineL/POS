@extends('layouts.master');
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('item.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label>Item</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <br>
                            <label>Price</label>
                            <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>
                            <label>Select Category</label>
                            <select name="category" class="form-select form-control">
                                @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->title}}</option>
                                @endforeach
                            </select>

                            <br>
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control p-2 @error('photo') is-invalid @enderror">
                            @error('photo')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>


                            <button class="btn btn-primary mt-4 ">Create</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
