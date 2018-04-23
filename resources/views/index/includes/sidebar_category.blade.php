<div class="categories">
    @if(count($sidebar_category))
        @foreach($sidebar_category as $item)
            <div class="category">
                <p data-toggle="1">{{$item->title}} <i class=" icon_category"></i></p>
                @if(count($item->children))
                    <div class="category_menu category_menu_show">
                        <ul>
                            @foreach($item->children as $child)
                                <li><a href="/category{{$child->link}}">{{$child->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>