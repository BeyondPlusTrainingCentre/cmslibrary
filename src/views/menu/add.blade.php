@extends('bp-admin.layouts.admin.index')

@section('title', 'Menu')

@section('content')
 <div class="row">

        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4>Title</h4>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-5">
                            {{ Form::open([
                                'url' => 'bp-admin/menu',
                                'method' => 'post',
                                'files' => 'true',
                                ]) }}
                          
                            @if ($errors->all())
                                <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </div>
                            @endif
                            {{--  --}}
                            
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                {{ Form::text('menu_name', null,['class'=>'form-control']) }}
                               
                            </div>
                            <div class="form-group">
                                <label class="control-label">Layouts</label>
                                {{ Form::text('layouts', null,['class'=>'form-control', 'placeholder' => 'Default Layout Not Required']) }}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Parent Name</label>
                                {{ Form::select('parent_id',$menus,null, array('class' => 'form-control', 'placeholder' => 'Choose Parent ...')) }}
                            </div> 
                            <div class="form-group">
                                <label class="control-label">Weight</label>
                                {{ Form::text('menu_weight', 0,['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Active</label>
                                {{ Form::select('menu_active', [
                                    'yes' => 'Yes',
                                    'no' => 'No',
                                ],  null, ['class'=> 'form-control']) }}
                            </div>
                            <div class="">
                                <button type="submit" class="pull-right btn btn-success">Create</button>
                            </div>
                            {{ Form::close() }}
                        </div>{{-- end of form wrapper div --}}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
           /// alert("aa");
        });
    </script>
@endpush