<!-- resources/views/components/atoms/table/email-column.blade.php -->
<span class="text-muted">
  <i class="ri-mail-line me-2"></i>{{ Str::limit($email ?? 'Data Email tidak ditemukan', 30)}}
</span>