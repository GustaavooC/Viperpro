<nav id="navbarContent" class="page__navbar">
    <div class="page__navbar__logo">
        <a class="page__navbar__logo" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" style="max-width:100%">
        </a>

        <button class="navbar-toggler-close close-button" type="button">
            <i class="fa-regular fa-circle-xmark"></i>
        </button>
    </div>
    <div class="navbar_menu_list">
        <ul class="navbar_list">
            <li class="navbar_list_links">
                <a href="<?php echo e(url('/')); ?>" title="Como funciona?">
                    <img src="<?php echo e(asset('/assets/images/svg/home2.svg')); ?>" alt="" width="24">
                    Visão geral
                </a>
            </li>
            <li class="navbar_list_links">
                <a href="<?php echo e(url('painel/affiliates')); ?>" title="Menu de Afiliado">
                    <img src="<?php echo e(asset('/assets/images/svg/affiliate.svg')); ?>" alt="" width="24">
                    Menu de Afiliado
                </a>
            </li>

            <div class="mt-5 navbar_menu_title">
                <h4>JOGOS DA CASA</h4>
            </div>
            <?php $__currentLoopData = \App\Models\GameExclusive::limit(5)->orderBy('views', 'desc')->where('active', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gameExclusive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="navbar_list_links">
                    <a href="<?php echo e(route('web.vgames.show', ['game' => $gameExclusive->uuid])); ?>">
                        <img src="<?php echo e(asset('storage/'.$gameExclusive->icon)); ?>" alt="" width="24">
                        <?php echo e($gameExclusive->name); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="mt-5 navbar_menu_title">
                <h4>CATEGORIAS</h4>
            </div>

            <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="navbar_list_links">
                    <a href="<?php echo e(route('web.category.index', ['slug' => $category->slug])); ?>" title="<?php echo e($category->name); ?>">
                        <img src="<?php echo e(asset('storage/'.$category->image)); ?>" alt="<?php echo e($category->name); ?>" width="24">
                        <?php echo e($category->name); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="mt-5 navbar_menu_title">
                <h4>INFORMAÇÕES</h4>
            </div>

            <li class="navbar_list_links">
                <a href="<?php echo e(url('/como-funciona')); ?>" title="Como funciona?">
                    <img src="<?php echo e(asset('assets/images/svg/about.svg')); ?>" alt="" width="24">
                    Como funciona?
                </a>
            </li>
            
            <li class="navbar_list_links">
                <a href="<?php echo e(url('/sobre-nos')); ?>" title="Sobre Nós">
                    <img src="<?php echo e(asset('assets/images/svg/sobre.svg')); ?>" alt="" width="24">
                    Sobre Nós
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\Users\PC\Desktop\genialcassino\resources\views/includes/navbar_left.blade.php ENDPATH**/ ?>