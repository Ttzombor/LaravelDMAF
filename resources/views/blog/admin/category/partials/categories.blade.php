@foreach($categories as $category_list)

    <option value="{{$category_list->id ?? ""}}"

        @isset($item->id)
            @if($item->id_title == $category_list->id)
                selected
            @endif


            @if($item->id == $category_list->id)
                hidden=""
            @endif

        @endisset

    >
        {!! $delimiter ?? "" !!}{{$category_list->id_title}}
    </option>



    @endforeach
