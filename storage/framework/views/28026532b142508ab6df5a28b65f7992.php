<div class="pagetitle">
  <h1><?php echo e($title); ?></h1>
  <nav>
    <ol class="breadcrumb">
      <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($loop->last): ?>
          <li class="breadcrumb-item active"><?php echo e($item['label']); ?></li>
        <?php else: ?>
          <li class="breadcrumb-item">
            <a href="<?php echo e(route($item['route'])); ?>"><?php echo e($item['label']); ?></a>
          </li>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
  </nav>
</div>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/breadcrumbs.blade.php ENDPATH**/ ?>