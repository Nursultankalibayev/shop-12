 <ul class="pagination">
    <li class="{{ ($pagination->currentPage() == 1) ? 'uk-disabled' : '' }}">
        <a href="{{ $pagination->url(1) }}"><span> < </span></a>
    </li>
    @for ($i = 1; $i <= $pagination->lastPage(); $i++)
    <li class="{{ ($pagination->currentPage() == $i) ? 'active' : '' }}">
        <a href="{{ $pagination->url($i) }}">{{ $i }}</a>
    </li>
    @endfor
    <li class="{{ ($pagination->currentPage() == $pagination->lastPage()) ? 'uk-disabled' : '' }}">
        <a href="{{ $pagination->url($pagination->currentPage()+1) }}"><span> > </span></a>
    </li>
</ul>