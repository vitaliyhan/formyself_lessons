@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Главная</h1>
                    </div>
                    {{--                    <div class="col-sm-6">--}}
                    {{--                        <ol class="breadcrumb float-sm-right">--}}
                    {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--                            <li class="breadcrumb-item active">Blank Page</li>--}}
                    {{--                        </ol>--}}
                    {{--                    </div>--}}
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Изменить тег</h3>

                    {{--                    <div class="card-tools">--}}
                    {{--                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">--}}
                    {{--                            <i class="fas fa-minus"></i>--}}
                    {{--                        </button>--}}
                    {{--                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">--}}
                    {{--                            <i class="fas fa-times"></i>--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}
                </div>

                <!-- form start -->
                <form method="post" action="{{ route('posts.update', ['[post]'=>$post->id] )}}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Имя</label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror "
                                   id="title" value="{{ $post->title }}">
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label for="exampleInputPassword1">Password</label>--}}
                        {{--                            <input type="text" class="form-control" id="slug"--}}
                        {{--                                   placeholder="Slug" name="slug">--}}
                        {{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                    <!-- /.card-body -->


                </form>
                <!-- /.card-body -->
            {{--                <div class="card-footer clearfix">--}}

            {{--                </div>--}}
            <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection

