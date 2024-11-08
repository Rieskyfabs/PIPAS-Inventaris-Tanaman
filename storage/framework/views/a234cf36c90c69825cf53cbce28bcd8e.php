<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo $__env->make('landing-page/components/_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

    <body>
    <!-- navigation -->
        <?php echo $__env->make('landing-page/components/_navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /navigation -->

        <main>
            <!-- Hero, Home Page Section -->
                <?php echo $__env->make('landing-page/components/_hero-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Hero, Home Page Section -->

            <!-- About Us Page -->
                <?php echo $__env->make('landing-page.components._about-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End About Us Page -->

            <!-- Galeri Page -->
                <?php echo $__env->make('landing-page.components._galeri-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Galeri Page -->

            <!-- Start Team Page -->
                <?php echo $__env->make('landing-page.components._team-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Team Page -->

            <!-- Highlighted CTA -->
                <?php echo $__env->make('landing-page.components._highlighted-cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Highlighted CTA -->

            <!-- Contact Form -->
                <?php echo $__env->make('landing-page.components._contact-section', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- END Contact Form -->
        </main>

        <!-- Footer -->
            <?php echo $__env->make('landing-page.components._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- END Footer -->

        <!-- # JS Plugins -->
        <script src="<?php echo e(asset('front/plugins/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('front/plugins/bootstrap/bootstrap.min.js')); ?>"></script>

        <!-- Main Script -->
        <script src="<?php echo e(asset('js/appScript.js')); ?>"></script>

        <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/landingPage.blade.php ENDPATH**/ ?>