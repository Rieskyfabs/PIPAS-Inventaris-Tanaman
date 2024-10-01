<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <?php if (isset($component)) { $__componentOriginal44ba7e2b03d66adbb4b0f78d01969f76 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44ba7e2b03d66adbb4b0f78d01969f76 = $attributes; } ?>
<?php $component = App\View\Components\LogoSidebar::resolve(['logoSrc' => ''.e(asset('images/wikrama-logo.png')).' ','logoText' => 'SIM PIPAS'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('logo-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\LogoSidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44ba7e2b03d66adbb4b0f78d01969f76)): ?>
<?php $attributes = $__attributesOriginal44ba7e2b03d66adbb4b0f78d01969f76; ?>
<?php unset($__attributesOriginal44ba7e2b03d66adbb4b0f78d01969f76); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44ba7e2b03d66adbb4b0f78d01969f76)): ?>
<?php $component = $__componentOriginal44ba7e2b03d66adbb4b0f78d01969f76; ?>
<?php unset($__componentOriginal44ba7e2b03d66adbb4b0f78d01969f76); ?>
<?php endif; ?>
    <!-- End Logo -->

    <?php if (isset($component)) { $__componentOriginale6ac12e1b4c8ba8b88cc0f498d1979d5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale6ac12e1b4c8ba8b88cc0f498d1979d5 = $attributes; } ?>
<?php $component = App\View\Components\SidebarSearch::resolve(['actionUrl' => '#'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SidebarSearch::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale6ac12e1b4c8ba8b88cc0f498d1979d5)): ?>
<?php $attributes = $__attributesOriginale6ac12e1b4c8ba8b88cc0f498d1979d5; ?>
<?php unset($__attributesOriginale6ac12e1b4c8ba8b88cc0f498d1979d5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6ac12e1b4c8ba8b88cc0f498d1979d5)): ?>
<?php $component = $__componentOriginale6ac12e1b4c8ba8b88cc0f498d1979d5; ?>
<?php unset($__componentOriginale6ac12e1b4c8ba8b88cc0f498d1979d5); ?>
<?php endif; ?>
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon -->

            <?php if(auth()->guard()->check()): ?>
                <?php if(Auth::user()->role->name == 'admin'): ?>
                    <?php if (isset($component)) { $__componentOriginal699377a90a0a35fe31dd57e04150b051 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal699377a90a0a35fe31dd57e04150b051 = $attributes; } ?>
<?php $component = App\View\Components\NotificationDropdown::resolve(['notificationCount' => 4,'notifications' => [
                            ['icon' => 'bi-exclamation-circle', 'iconColor' => 'text-warning', 'title' => 'Lorem Ipsum', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '30 min. ago'],
                            ['icon' => 'bi-x-circle', 'iconColor' => 'text-danger', 'title' => 'Atque rerum nesciunt', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '1 hr. ago'],
                            ['icon' => 'bi-check-circle', 'iconColor' => 'text-success', 'title' => 'Sit rerum fuga', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '2 hrs. ago'],
                            ['icon' => 'bi-info-circle', 'iconColor' => 'text-primary', 'title' => 'Dicta reprehenderit', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '4 hrs. ago']
                        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notification-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\NotificationDropdown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal699377a90a0a35fe31dd57e04150b051)): ?>
<?php $attributes = $__attributesOriginal699377a90a0a35fe31dd57e04150b051; ?>
<?php unset($__attributesOriginal699377a90a0a35fe31dd57e04150b051); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal699377a90a0a35fe31dd57e04150b051)): ?>
<?php $component = $__componentOriginal699377a90a0a35fe31dd57e04150b051; ?>
<?php unset($__componentOriginal699377a90a0a35fe31dd57e04150b051); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        
            <?php if (isset($component)) { $__componentOriginalac2c439a70dfd4c1cdc14ad708110032 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac2c439a70dfd4c1cdc14ad708110032 = $attributes; } ?>
<?php $component = App\View\Components\ProfileDropdown::resolve(['profileImage' => ''.e(Auth::user()->profile_image ?? Avatar::create(Auth::user()->username)->toBase64()).'','username' => ''.e(Auth::user()->username).'','email' => ''.e(Auth::user()->email).'','role' => ''.e(Auth::user()->role->name).'','profileUrl' => 'users-profile.html','helpUrl' => 'pages-faq.html'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('profile-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ProfileDropdown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac2c439a70dfd4c1cdc14ad708110032)): ?>
<?php $attributes = $__attributesOriginalac2c439a70dfd4c1cdc14ad708110032; ?>
<?php unset($__attributesOriginalac2c439a70dfd4c1cdc14ad708110032); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac2c439a70dfd4c1cdc14ad708110032)): ?>
<?php $component = $__componentOriginalac2c439a70dfd4c1cdc14ad708110032; ?>
<?php unset($__componentOriginalac2c439a70dfd4c1cdc14ad708110032); ?>
<?php endif; ?>

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
<!-- End Header -->
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/header.blade.php ENDPATH**/ ?>