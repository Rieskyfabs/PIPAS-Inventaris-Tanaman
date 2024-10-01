<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="<?php echo e($actionUrl); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div>
<!-- End Search Bar -->
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/sidebar-search.blade.php ENDPATH**/ ?>