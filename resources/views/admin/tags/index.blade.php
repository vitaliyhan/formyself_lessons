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
                    <h3 class="card-title">Теги</h3>

                    {{--                    <div class="card-tools">--}}
                    {{--                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">--}}
                    {{--                            <i class="fas fa-minus"></i>--}}
                    {{--                        </button>--}}
                    {{--                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">--}}
                    {{--                            <i class="fas fa-times"></i>--}}
                    {{--                        </button>--}}
                    {{--                    </div>--}}
                </div>
                <div class="card-body">
                    <a href="{{ route('tags.create') }}" class="btn  btn-primary mb-3">
                        Добавить тег
                    </a>
                    @if($tags->count())
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>
                                        Имя
                                    </th>
                                    <th>Slug</th>
                                    <th style="width: 40px">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td>{{ $tag->slug }}</td>
                                        <td>
                                            <a href="{{ route('tags.edit', ['tag'=>$tag->id]) }}"
                                               class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form
                                                action="{{ route('tags.destroy', ['tag'=>$tag->id]) }}"
                                                method="post" class="float-left">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit"
                                                        onclick="return confirm('подтвердите удаление')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div>Тегов нет</div>
                    @endif
                    {{ $tags->links() }}
                </div>


            </div>
            <!-- /.card-body -->
        {{--            <div class="card-footer clearfix">--}}

        {{--            </div>--}}
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->

@endsection
