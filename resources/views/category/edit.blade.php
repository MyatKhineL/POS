@extends('layouts.master');
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('category.update',$category->id)}}" method="post">
                            @csrf
                            @method('put')
                            <label>Category Name</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$category->title}}">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror <br>

                            <button class="btn btn-primary mt-4 ">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
