<!-- resources/views/components/molecules/table/table-header.blade.php -->
<thead>
  <tr>
    @foreach ($columns as $column)
      <th>{{ strtoupper($column['label']) }}</th>
    @endforeach
  </tr>
</thead>
