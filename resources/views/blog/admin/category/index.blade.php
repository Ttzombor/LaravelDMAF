@extends('layouts.app')

@section('content')

    <div class="container">
        @component('blog.admin.components.breadcrum')
            @slot('title') List Of News @endslot
            @slot('parent') Main @endslot
            @slot('active') News @endslot
        @endcomponent

        <hr>

        <a href='{{route('blog.admin.categories.create')}}' class="btn btn-primary pull-right">
            <i class="fa fa-plus-square"></i>
            Create Article
        </a>
        <table class="table table-striped">
            <thead>
            <th>Name</th>
            <th>Id</th>
            <th>Parent ID</th>
            <th class="text-right">Doing</th>
            </thead>
            <tbody>
            @forelse($items as $item)
                @php /** @var \App\Models\BlogCategory $item  */  @endphp
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->id}}</td>
                    <td>@if(in_array($item->parent_id, [0,1]))@endif
                        {{$item->parent_id}}
                    </td>
                    <td class="text-right">


                        <form onsubmit="if(confirm('Delete?')){return true} else{return false}"
                              action='{{route('blog.admin.categories.destroy', $item)}}'
                              method='POST'>
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}

                            <a class="btn btn-default" href="{{route('blog.admin.categories.edit', [$item, $categoryList])}}">
                                <i class="fa fa-edit">Edit</i>
                            </a>
                            <button type="submit" class="btn">
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
                        {{$items->links()}}
                    </ul>

                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection

