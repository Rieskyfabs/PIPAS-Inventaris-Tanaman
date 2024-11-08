<!-- view/landing-page/components/HeroSectionComponent.blade.php -->
<section class="home" id="home">
    <div class="container home-wrapper">
        <div class="content-left">
            <h1 class="heading">Tingkatkan <span>Kemampuan</span> mu Dengan <span>PIPAS</span></h1>
            <p class="subHeading">Bakar semangatmu dengan mengikuti <span>Pendidikan Ilmu Pengetahuan Alam dan Sosial</span> yang diadakan di sekolah sebagai ajang bagi dirimu untuk meningkatkan nilai dan sikap bagi para siswa.</p>
            <div class="box-wrapper">
                <div class="box">
                    <?php echo $__env->make('landing-page.components._auth-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="box">
                    <a href="#about" class="btn-about"><i class="fas fa-info-circle"></i> Tentang PIPAS</a>
                </div>
            </div>
        </div>
        <div class="content-right">
            <div class="img-wrapper">
                <img src="<?php echo e(asset('/images/Hero-tanaman-IMG.png')); ?>" alt="">
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/landing-page/components/_hero-section.blade.php ENDPATH**/ ?>