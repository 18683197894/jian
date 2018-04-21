@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled pagers"><span>上一页</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">上一页</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $k => $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            
            {{-- Array Of Links --}}
            @if (is_array($element))
            <?php 
            $a = 3;
            $b = 3;
            $co = count($element);
            if(($co - $paginator->currentPage()) < 2)
            {
                $a = 5 - ($co - $paginator->currentPage());
            }
            if($paginator->currentPage() <= 2 )
            {
                $b = 6 - $paginator->currentPage();
            }
            ?>
                @foreach ($element as $page => $url)
          
                    
                        @if ($page > ($paginator->currentPage() - $a) && $page < ($paginator->currentPage() + $b) && $page !== $paginator->currentPage())
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @endif
                 
                            <!-- <li class="active"><span>{{ $page }}</span></li>
                            <li><a href="{{ $url }}">{{ $page }}</a></li> -->
                @endforeach

            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a></li>
        @else
            <li class="disabled pagers"><span>下一页</span></li>
        @endif
    </ul>
@endif
