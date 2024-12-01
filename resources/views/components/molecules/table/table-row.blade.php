<!-- resources/views/components/molecules/table/table-row.blade.php -->
<tr>
  @foreach ($columns as $column)
    <td>
      @if (isset($column['render']))
        {{-- If render callback exists, use it to output --}}
        {!! call_user_func($column['render'], $item) !!}
      @else
        {{-- Get data based on key --}}
        @php
          $keys = explode('.', $column['key']);
          $value = $item;
          foreach ($keys as $key) {
            $value = $value->{$key} ?? null;
          }
        @endphp
        {{-- Display data or fallback --}}
        @if($column['key'] === 'name') 
          <x-atoms.table.data-row :data="$value" :subtext="$item->subtext ?? 'Deskripsi belum tersedia'" />
        @else
          {!! $value ?? ($column['fallback'] ?? 'Data tidak tersedia') !!}
        @endif
      @endif
    </td>
  @endforeach
</tr>
