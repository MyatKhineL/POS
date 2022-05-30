@extends('layouts.master');
@section('content')
    <section class="content">
        <div class="container-fluid">
             <div class="col-md-4">
                 <div class="card">
                     <div class="card-body">
                         <form action="{{route('category.store')}}" method="post">
                             @csrf
                             <label>Category Name</label>
                             <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                             @error('title')
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
