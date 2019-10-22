<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <input class="btn btn-primary " type="submit" value="Save">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <label for="">Status</label>
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled">
                    <li>ID: {{$item->id}}</li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Created</label>
                        <input type="text" class="form-control"
                               value="{{$item->created_at ?? ""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Edited</label>
                        <input type="text" class="form-control"
                               value="{{$item->updated_at ?? ""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="title">Published</label>
                        <input type="text" class="form-control"
                               value="{{$item->published_at ?? ""}}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


