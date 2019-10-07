@foreach($categories as $category_list)

    <option value="{{$category_list->id or ""}}"

        @isset($item->id)
            @if($item->parent_id == $category_list->id)
                selected
            @endif


            @if($item->id == $category_list->id)
                hidden=""
            @endif

        @endisset

    >
        {!! $delimiter ?? "" !!}{{$category_list->title}}
    </option>



    @endforeach
