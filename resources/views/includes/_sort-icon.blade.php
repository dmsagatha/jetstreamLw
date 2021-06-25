@if ($sortField !== $field)
  <i class="fas fa-sort float-right mt-1 text-muted"></i>
@elseif ($sortAsc)
  <i class="fas fa-sort-alpha-up-alt float-right mt-1 text-blue-300"></i>
@else
  <i class="fas fa-sort-alpha-down-alt float-right mt-1 text-blue-300"></i>
@endif