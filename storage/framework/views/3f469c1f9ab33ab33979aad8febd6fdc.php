<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => 'Manfaat','items' => [
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Manfaat']
        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Breadcrumbs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal242b7fccb931b9335793237de2b11b36)): ?>
<?php $attributes = $__attributesOriginal242b7fccb931b9335793237de2b11b36; ?>
<?php unset($__attributesOriginal242b7fccb931b9335793237de2b11b36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal242b7fccb931b9335793237de2b11b36)): ?>
<?php $component = $__componentOriginal242b7fccb931b9335793237de2b11b36; ?>
<?php unset($__componentOriginal242b7fccb931b9335793237de2b11b36); ?>
<?php endif; ?>

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo e(__('BENEFITS')); ?></h5>
                <div class="add-btn-container">
                    <a href="<?php echo e(route('benefits.create')); ?>" class="btn-add-item">
                        <svg fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff">
                          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                          <g id="SVGRepo_iconCarrier">
                            <path d="M18,22a1,1,0,0,0,1-1V8L12,2,5,8V21a1,1,0,0,0,1,1ZM12,7a2,2,0,1,1-2,2A2,2,0,0,1,12,7ZM9,16h2V14h2v2h2v2H13v2H11V18H9Z"></path>
                          </g>
                        </svg>
                        <?php echo e(__('Add Benefits')); ?>

                    </a>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th><?php echo e(__('ID')); ?></th>
                          <th><?php echo e(__('BENEFITS NAME')); ?></th>
                          
                          <th><?php echo e(__('CREATED AT')); ?></th>
                          <th><?php echo e(__('ACTIONS')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($benefit->id); ?></td>
                              <td><?php echo e($benefit->name); ?></td>
                              
                              <td><?php echo e($benefit->created_at->format('d F Y, H:i')); ?></td>
                              <td>
                                  <?php if (isset($component)) { $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $attributes; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['deleteData' => ''.e(route('benefits.destroy', $benefit->id)).'','method' => 'DELETE','submit' => 'true','dropdown' => [ 
                                          ['href' => route('benefits.edit', $benefit->id), 'label' => 'Edit'], 
                                      ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('action-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ActionButtons::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0)): ?>
<?php $attributes = $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0; ?>
<?php unset($__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0)): ?>
<?php $component = $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0; ?>
<?php unset($__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0); ?>
<?php endif; ?>
                              </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/benefits/index.blade.php ENDPATH**/ ?>