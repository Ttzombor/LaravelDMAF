@extends('layouts.app')

@section('content')

    <div class="container">
        @component('blog.admin.components.breadcrum')
            @slot('title') List Of News @endslot
            @slot('parent') Main @endslot
            @slot('active') News @endslot
        @endcomponent

        <hr>

        <a href="{{route('blog.admin.posts.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square"></i>
            Create Article
        </a>
        <table class="table table-striped">
            <thead>
            <th>#</th>
            <th>Автор</th>
            <th>Категория</th>
            <th>Заголовок</th>
            <th>Дата Публикации</th>
            <th>Опции</th>
            </thead>
            <tbody>
            @forelse($paginator as $post)
                @php
                    /** @var \App\Models\BlogPost $post */
                @endphp
                <tr @if(!$post->is_published) style="background-color: #6c757d" @endif>
                    <td>{{$post->id}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->title}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->published_at}}</td>
                    <td class="text-right">


                        <form onsubmit="if(confirm('Delete?')){return true} else{return false}"
                              action='{{route('blog.admin.posts.destroy', $post)}}'
                              method='POST'>
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}

                            <a class="btn btn-default" href="{{route('blog.admin.posts.edit', $post)}}">
                                <i class="fa fa-edit">Edit</i>
                            </a>
                            <button type="submit" class="btn" href="{{route('blog.admin.posts.destroy', $post)}}">
                                <i class="fa fa-trash">Delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>The is no Data</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$paginator->links()}}
                    </ul>

                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
