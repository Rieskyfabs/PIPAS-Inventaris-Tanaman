<!-- resources/views/components/organisms/table/universal-table.blade.php -->
<table class="table table-bordered table-hover datatable">
  {{-- Header --}}
  <x-molecules.table.table-header :columns="$columns" />

  {{-- Body --}}
  <tbody>
    @foreach ($data as $item)
      <x-molecules.table.table-row :item="$item" :columns="$columns" />
    @endforeach
  </tbody>
</table>
