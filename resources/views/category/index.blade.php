@extends('layouts.master');
@section('content')
    <section class="content">
        <div class="container-fluid">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header border-transparent">
                      <h3 class="card-title">
                      <i class="fas fa-layer-group"></i>
                           Category Lists
                      </h3>

                      <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table m-0">
                              <thead>
                              <tr>

                                  <th>Title</th>
                                  <th>Action</th>
                                  <th>Time</th>
                              </tr>
                              </thead>
                              <tbody>

                              @foreach($categories as $c)
                                  <tr>

                                      <td>{{$c->title}}</td>
                                      <td>
                                          <a href="{{route('category.edit',$c->id)}}" class="btn btn-warning">
                                              <i class="fas fa-pencil-alt text-white"></i>
                                          </a>
                                          <form action="{{route('category.destroy',$c->id)}}" method="post" class="d-inline">
                                              @csrf
                                              @method('delete')
                                              <button class="btn btn-danger">
                                                  <i class="fas fa-trash-alt text-white"></i>
                                              </button>
                                          </form>
                                      </td>
                                      <td>{{$c->created_at->diffForHumans()}}</td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                      <!-- /.table-responsive -->
                  </div>
                  <!-- /.card-body -->

                  <!-- /.card-footer -->
              </div>
          </div>
        </div>
    </section>
@endsection
@section('script')
   <script>
       @if(session('create'))
       Swal.fire({
           title:'Successfully created',
           text:'{{session('create')}}',
           icon:'success',
       });
       @endif
   </script>
@endsection
