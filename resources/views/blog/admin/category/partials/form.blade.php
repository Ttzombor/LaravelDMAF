<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Status</label>
<select class="form-control" name="published">
    @if(isset($item->id))
        <option value="0" @if ($item->is_published == 0) selected ="" @endif>Not published
        </option>
        <option value="1" @if ($item->is_published == 1) selected ="" @endif>Published
        </option>

        @else
            <option value="0">Not published</option>
            <option value="1">Published</option>
        @endif
</select>

<label for="">Name</label>
<input type="text" class="form-control" name="title" placeholder="Title category"
value="{{$item->title ?? ""}}" required>

<label for="">Slug</label>
<input class="form-control" type="text" name="slug" placeholder="Autogeneration"
value="{{$item->slug ?? ""}}" readonly="">



<label for="">Parent category</label>
<select class="form-control" name="parent_id">
    <option value="0">-- without parent categories --</option>
    @include('blog.admin.category.partials.categories', ['categories' => $categoryList])
</select>

<hr />
                    </div>
                </div>
            </div>
            <input class="btn btn-primary mt-4" type="submit" value="Save">
        </div>

    </div>

</div>


