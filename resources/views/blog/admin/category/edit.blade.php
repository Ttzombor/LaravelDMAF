@extends('layouts.app')

@section('content')

        <form method = "POST" class="form-horizontal" action="{{route('blog.admin.categories.update', $item)}}">
            @method('PUT')
            {{csrf_field()}}

            {{-- Form Include --}}

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('blog.admin.category.partials.form')
                    </div>
                    <div class="col-md-3">
                        @include('blog.admin.category.partials.form_additional')
                    </div>
                </div>
            </div>
        </form>

@endsection
