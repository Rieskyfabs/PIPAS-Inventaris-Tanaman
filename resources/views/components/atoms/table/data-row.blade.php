<!-- resources/views/components/atoms/table/data-row.blade.php -->
<div class="d-flex flex-column">
  <div class="text-heading text-truncate">
    <span class="fw-medium">{{ Str::limit($data, 24) }}</span>
  </div>
  @isset($subtext)
    <small class="text-muted">{{ Str::limit($subtext, 24) }}</small>
  @endisset
</div>
  