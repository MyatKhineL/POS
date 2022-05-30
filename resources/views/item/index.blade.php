@extends('layouts.master');
@section('content')
    <section class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-md-8 mt-5">
                  <div class="card">
                      <div class="card-header border-transparent">
                          <h3 class="card-title">
                              <i class="fas fa-list-ul"></i>
                              Item Lists
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

                                      <th>Name</th>
                                      <th>Category</th>
                                      <th>Price</th>
                                      <th>Photo</th>
                                      <th>Action</th>
                                      <th>Time</th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                  @foreach($items as $t)
                                      <tr>

                                          <td>{{$t->name}}</td>
                                          <td>{{$t->category->title}}</td>
                                          <td>{{$t->price}}</td>
                                          <td>
                                              <img src="{{asset('storage/photo/'.$t->photo)}}" width="50px" height="50px">
                                          </td>
                                          <td>
                                              <a href="{{route('item.edit',$t->id)}}" class="btn btn-warning">
                                                  <i class="fas fa-pencil-alt text-white"></i>
                                              </a>
                                              <form action="{{route('item.destroy',$t->id)}}" method="post" class="d-inline">
                                                  @csrf
                                                  @method('delete')
                                                  <button class="btn btn-danger">
                                                      <i class="fas fa-trash-alt text-white"></i>
                                                  </button>
                                              </form>
                                          </td>
                                          <td>{{$t->created_at->diffForHumans()}}</td>
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
              <div class="col-md-4 mt-5">
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

                                      <th>Time</th>
                                  </tr>
                                  </thead>
                                  <tbody>

                                  @foreach($categories as $c)
                                      <tr>

                                          <td>{{$c->title}}</td>

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
