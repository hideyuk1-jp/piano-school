@if ($sort === $my_sort && $order === 'asc' )
    <a href="{{ url('events/'.$event->id.'?sort='.$my_sort.'&order=desc') }}" class="text-body text-decoration-none">{{ $text }} <i class="fas fa-sort-up"></i></a>
@elseif ($sort === $my_sort && $order === 'desc' )
    <a href="{{ url('events/'.$event->id.'?sort='.$my_sort.'&order=asc') }}" class="text-body text-decoration-none">{{ $text }} <i class="fas fa-sort-down"></i></a>
@else
    <a href="{{ url('events/'.$event->id.'?sort='.$my_sort.'&order=asc') }}" class="text-body text-decoration-none">{{ $text }} <i class="fas fa-sort"></i></a>
@endif