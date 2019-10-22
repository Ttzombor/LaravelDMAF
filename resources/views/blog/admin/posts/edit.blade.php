@extends('layouts.app')

@section('content')


        @if($item->exists)
        <form method = "POST" class="form-horizontal" action="{{route('blog.admin.posts.update', $item->id)}}">
            @method('PATCH')
            @else
                <form method = "POST" class="form-horizontal" action="{{route('blog.admin.posts.store')}}">
                    @endif
            {{csrf_field()}}
            @if($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true"></span>
                            </button>
                            {{ $errors->first() }}
                        </div>
                    </div>
                </div>
                @endif
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true"></span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            {{-- Form Include --}}



            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('blog.admin.posts.partials.form')
                    </div>
                    <div class="col-md-3">
                        @include('blog.admin.posts.partials.form_additional')
                    </div>
                </div>
            </div>
        </form>

@endsection
