<!-- view/landing-page/components/AboutSectionComponent.blade.php -->
<section class="about" id="about">
    <div class="container about-wrapper">
        <div class="content-left">
            <div class="img-wrapper">
                <img src="<?php echo e(asset('/images/Visuals.png')); ?>" alt="">
            </div>
        </div>
        <div class="content-right">
            <h1 class="heading">Tentang <span>PIPAS</span></h1>
            <p class="subHeading"><span>Kegiatan PIPAS</span> merupakan karakter dan kemampuan yang dibangun <br> dalam keseharian dan dalam diri setiap individu peserta <br>didik melalui budaya satuan pendidikan, dan <br>pembelajaran intrakurikuler.</p>
            <?php echo $__env->make('landing-page.components._about-card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/landing-page/components/_about-section.blade.php ENDPATH**/ ?>