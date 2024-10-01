<form action="#" method="POST" class="action-buttons">
    <?php if(isset($viewData)): ?>
        <a href="<?php echo e($viewData); ?>" class="icon-button"><i class="bi bi-eye"></i></a>
    <?php endif; ?>
    <?php echo csrf_field(); ?>
    <?php echo method_field($method ?? 'POST'); ?>

    
    <?php if($submit): ?>
        
        <a href="<?php echo e($deleteData); ?>" class="icon-button" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
    <?php endif; ?>

    <?php if(isset($dropdown)): ?>
        <div class="dropdown">
            <button class="icon-button dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php $__currentLoopData = $dropdown; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a class="dropdown-item" href="<?php echo e($item['href']); ?>"><?php echo e($item['label']); ?></a></li>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field($method ?? 'POST'); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
</form>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/action-buttons.blade.php ENDPATH**/ ?>