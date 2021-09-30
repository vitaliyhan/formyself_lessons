@extends('admin.layouts.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--                    <h1></h1>--}}
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
                <h3 class="card-title">Редактировать статью "{{ $post->title }}"</h3>

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
            <form method="post" action="{{ route('posts.update',['post'=>$post->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror "
                               id="title"
                               value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Цитата</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" rows="2"
                                  name="description" id="description"
                        >{{ $post->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Контент</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" rows="5" name="content"
                                  id="content"
                        >{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Категория</label>
                        <select class=" select2bs4  @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" style="width: 100%">
                            @foreach($categories as $key => $value)
                                <option value="{{ $key }}"
                                        @if($key == $post->category_id) selected @endif >{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select class="select2 @error('tags') is-invalid @enderror" name="tags[]" multiple="multiple"
                                id="tags"
                                data-placeholder="Выбор тегов" style="width: 100%;">

                            @foreach($tags as $key => $value)
                                <option
                                    value="{{ $key }}"
                                    @if(in_array($key, $post->tags->pluck('id')->all())) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('thumbnail') is-invalid @enderror"
                                       id="thumbnail" name="thumbnail">
                                <label class="custom-file-label" for="thumbnail">Выберите картинку</label>
                            </div>

                        </div>
                    </div>

                    @if($post->thumbnail)
                        <div class="form-group">
                            <img src="{{ $post->getImage() }}" alt="" style="max-height: 300px">
                            <div class="btn bg-gradient-danger"
                                 onclick="if(confirm('Удалить изображение?')){
                                     $.ajax({
                                     'url': '{{ route('posts_img.delete_img',['post'=> $post->id]) }}' + id,
                                     'type': 'DELETE',
                                     headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                                     }).always(function() {
                                     window.location = window.location.href;
                                     });
                                     }">
                                <i class="far fa-trash-alt"></i>
                            </div>

                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </form>

            <!-- /.card-body -->


            <!-- /.card-body -->
        {{--                <div class="card-footer clearfix">--}}

        {{--                </div>--}}
        <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection

