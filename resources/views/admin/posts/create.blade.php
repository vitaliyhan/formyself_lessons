@extends('admin.layouts.layout')

@section('content')

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
                <h3 class="card-title">Добавить статью</h3>

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
            <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror "
                               id="title"
                               placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="2" name="description" id="description"
                                  placeholder="Цитата"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" rows="5" name="content" id="content"
                                  placeholder="Контент"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select class=" select2bs4  @error('category_id') is-invalid @enderror"  id="category_id" name="category_id" style="width: 100%">
                            @foreach($categories as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select class="select2 @error('tags') is-invalid @enderror" name="tags[]" multiple="multiple" id="tags"
                                data-placeholder="Выбор тегов" style="width: 100%;">

                            @foreach($tags as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Выберите картинку</label>
                            </div>

                        </div>
                    </div>
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

@endsection

