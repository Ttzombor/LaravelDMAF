<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                    @else
                    Не опубликовано
                    @endif
                </div>
                <div class="card-body">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#adddata" role="tab">Доп. данные</a>
                            </li>
                        </ul>
                        <br>

                        <div class="tab-content">
                            <div class="tab-pane active" id="maindata" role="tabpanel">
                                <div class="form-group">
                                    <label for="">Заголовок</label>
                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           placeholder="Title category"
                                           value="{{$item->title ?? ""}}" required>
                                </div>
                                <div class="form-group">
                                    Статья
                                    <textarea name="description"
                                              id = "description"
                                              class="form-control"
                                              rows="20">
                                             {{old('description', $item->content_raw)}}
                                     </textarea>
                                </div>
                            </div>



                        <div class="tab-pane active" id="adddata" role="tabpanel">
                            <div class="form-group">
                                <label for="">Статус</label>
                                <select class="form-control" name="is_published">
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
                                <label for="">Идентификатор</label>
                                <input class="form-control" type="text" name="slug" placeholder="Autogeneration"
                                       value="{{$item->slug ?? ""}}">



                                <label for="">Категория</label>
                                <select class="form-control" name="parent_id" value="{{$item->category_id ?? ""}}">
                                    <option ></option>
                                    @include('blog.admin.posts.partials.categories', ['categories' => $categoryList])
                                </select>


                                <label for="">Выдержка</label>
                                <textarea name="description"
                                          id = "description"
                                          class="form-control"
                                          rows="8">
                                             {{old('excerpt', $item->excerpt)}}
                                     </textarea>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



