 <ul class="uk-pagination uk-margin-medium-top uk-margin-medium-bottom">
    <li class="{{ ($pagination->currentPage() == 1) ? 'uk-disabled' : '' }}">
        <a href="{{ $pagination->url(1) }}"><span><i class="uk-icon-angle-double-left"></i></span></a>
    </li>
    @for ($i = 1; $i <= $pagination->lastPage(); $i++)
    <li class="{{ ($pagination->currentPage() == $i) ? ' uk-active' : '' }}">
        <a href="{{ $pagination->url($i) }}">{{ $i }}</a>
    </li>
    @endfor
    <li class="{{ ($pagination->currentPage() == $pagination->lastPage()) ? 'uk-disabled' : '' }}">
        <a href="{{ $pagination->url($pagination->currentPage()+1) }}" ><i class="uk-icon-angle-double-right"></i></a></a>
    </li>
</ul>