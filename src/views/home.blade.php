@extends('bp-admin.layouts.admin.index')
@section('content')
    <div class='row'>
        <div class='col-md-6'>
            <!-- Box -->
           

        <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
				
              <h3 class="box-title">Recently Posts</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @foreach ($post as $p)
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <!-- <div class="product-img">
                    <img src="{{ url('/img/dota.png')  }}" alt="Product Image">
                  </div> -->
                  <div class="product-info1">
                    <a href="javascript::;" class="product-title">{{$p->title}}
                      <span class="label label-warning pull-right">{{calculate_time_span($p->created_at)}}</span></a>
                        <span class="product-description">
                          {{$p->body}}
                        </span>
                  </div>
                </li>
                @endforeach
              </ul>
              <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ url("bp-admin/post")}}" class="uppercase">View All Posts</a>
                </div>
            </div>
          </div>
        </div>

            <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">

                    {{-- @foreach ($allUser as $userAll) --}}
                      {{-- expr --}}

                    <span class="label label-danger"> {{ $allUser }} New Admin </span>

                {{--       @endforeach --}}

                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    
                  @foreach($latestUser as $latestUsers )
                    <li>
                      <img src="{{ url('/img/avatar2.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">  {{ $latestUsers->name }} </a>
                      <span class="users-list-date">Today</span>
                    </li>
                  @endforeach

                    <!-- <li>
                      <img src="{{ url('/img/avatar.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Yesterday</span>
                    </li>
                    <li>
                      <img src="{{ url('/img/avatar3.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Jane</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="{{ url('/img/avatar5.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">John</a>
                      <span class="users-list-date">12 Jan</span>
                    </li>
                    <li>
                      <img src="{{ url('/img/avatar.png') }}" alt="User Image">
                      <a class="users-list-name" href="#">Alexander</a>
                      <span class="users-list-date">13 Jan</span>
                    </li>
                    <li>
                      <img src="{{ url('/img/avatar5.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Sarah</a>
                      <span class="users-list-date">14 Jan</span>
                    </li>
                    <li>
                      <img src="{{ url('/img/avatar3.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Nora</a>
                      <span class="users-list-date">15 Jan</span>
                    </li>
                    <li>
                      <img src="{{ url('/img/avatar2.png')}}" alt="User Image">
                      <a class="users-list-name" href="#">Nadia</a>
                      <span class="users-list-date">15 Jan</span>
                    </li> -->
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ url("bp-admin/user")}}" class="uppercase">View All Users</a>
                </div>
                </div>

    </div><!-- /.row -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
        });
    </script>
@endpush