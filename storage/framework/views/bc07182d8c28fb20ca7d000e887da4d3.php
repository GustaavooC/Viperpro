
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $__env->yieldContent('title'); ?></title>

        <!-- SEO -->
        <?php echo $__env->yieldContent('seo'); ?>

        <meta name="robots" content="index, follow">
        <meta name="Version" content="v1.0.0" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <!-- favicon -->
        <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">

        <!-- Bootstrap -->
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- iziModal -->
        <link href="<?php echo e(asset('assets/css/iziModal.min.css')); ?>" rel="stylesheet" type="text/css" />

        <link href="<?php echo e(asset('assets/css/iziToast.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- Fontawesome -->
        <link href="<?php echo e(asset('assets/css/fontawesome.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- Google font-->
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500&family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500&family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
        <!-- Main Css -->
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" type="text/css" id="theme-opt" />

        <?php echo $__env->yieldPushContent('styles'); ?>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-');
        </script>
    </head>

    <body>
        <?php if(!in_array(request()->route()->getName(), ['web.vgames.show', 'web.bets.show'])): ?>
            <div class="banner-top">
                <p>Dobre o seu depósito! Deposite R$ 50 e ganhe R$ 100.</p>
            </div>

            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                    s1.async=true;
                    s1.src='https://embed.tawk.to';
                    s1.charset='UTF-8';
                    s1.setAttribute('crossorigin','*');
                    s0.parentNode.insertBefore(s1,s0);
                })();
            </script>
            <!--End of Tawk.to Script-->
        <?php endif; ?>

        <main class="page">
            <?php echo $__env->yieldContent('content'); ?>
        </main>


        <!-- javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/iziModal.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/iziToast.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <?php echo $__env->yieldPushContent('scripts'); ?>
        <?php if (isset($component)) { $__componentOriginal19a4003522af0aaeb04e6cc0d5d57e65 = $component; } ?>
<?php $component = App\View\Components\Flash::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Flash::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal19a4003522af0aaeb04e6cc0d5d57e65)): ?>
<?php $component = $__componentOriginal19a4003522af0aaeb04e6cc0d5d57e65; ?>
<?php unset($__componentOriginal19a4003522af0aaeb04e6cc0d5d57e65); ?>
<?php endif; ?>
    </body>
    <a href="https://api.whatsapp.com/send?phone=5566981015430&text=Tenho interesse no sistema Jogos Online!"
    target="_blank"
    style="position:fixed;bottom:20px;right:30px;">
    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi-KW4E8RkKkLWjRSO4wfay5C4FDphgs-5IyRXLx4T3FztlHOI1iqFHWenQOw98mFHoWGSJbtBOcTUSB7hXjNyrecJ95A2L0DK9KSnV4lUJcn6ULCI-v8qFkW4SHE6yJGWbTPrBbArlGBMS3hWIEZ4e8u01OO5xshbpnSvXwjqk0-uXKqdGAXgfcuW9e-4/s16000/whatsapp.png" width="60" height="60" alt="Contato pelo WhatsApp" />
</a>
</html>
<?php /**PATH C:\Users\PC\Desktop\genialcassino\resources\views/layouts/web.blade.php ENDPATH**/ ?>