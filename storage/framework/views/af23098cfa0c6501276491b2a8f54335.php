<div>
    <?php if($message = Session::get('message')): ?>
        <script>
            $(function () {
                iziToast.success({
                    title: "<?php echo e(__('Success')); ?>",
                    message: "<?php echo e($message); ?>",
                    position: 'topRight'
                });
            });
        </script>
    <?php endif; ?>

    <?php if($message = Session::get('success')): ?>
        <script>
            $(function () {
                iziToast.success({
                    title: "<?php echo e(__('Success')); ?>",
                    message: "<?php echo e($message); ?>",
                    position: 'topRight'
                });
            });
        </script>
    <?php endif; ?>

    <?php if(session('status')): ?>
        <script>
            $(function () {
                iziToast.success({
                    title: "<?php echo e(__('Success')); ?>",
                    message: "<?php echo e(session('status')); ?>",
                    position: 'topRight'
                });
            });
        </script>
    <?php endif; ?>

    <?php if($message = Session::get('error')): ?>
        <?php if(isset($message['error'])): ?>
            <script>
                $(function () {
                    iziToast.error({
                        title: "<?php echo e(__('Error')); ?>",
                        message: "<?php echo e($message['error']); ?>",
                        position: 'topRight'
                    });
                });
            </script>
        <?php else: ?>
            <?php if(is_array($message) && count($message) > 0): ?>
                <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_array($msg)): ?>
                        <?php $__currentLoopData = $msg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <script>
                                $(function () {
                                    iziToast.error({
                                        title: "<?php echo e(__('Error')); ?>",
                                        message: "<?php echo e($m); ?>",
                                        position: 'topRight'
                                    });
                                });
                            </script>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php if(!empty($msg)): ?>
                            <script>
                                $(function () {
                                    iziToast.error({
                                        title: "<?php echo e(__('Error')); ?>",
                                        message: "<?php echo e($msg); ?>",
                                        position: 'topRight'
                                    });
                                });
                            </script>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <script>
                    $(function () {
                        iziToast.error({
                            title: "<?php echo e(__('Error')); ?>",
                            message: "<?php echo e($message); ?>",
                            position: 'topRight'
                        });
                    });
                </script>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>


    <?php if($message = Session::get('warning')): ?>
        <script>
            $(function () {
                iziToast.warning({
                    title: "<?php echo e(__('Attention!')); ?>",
                    message: "<?php echo e($message); ?>",
                    position: 'topRight'
                });
            });
        </script>
    <?php endif; ?>


    <?php if($message = Session::get('info')): ?>
        <script>
            $(function () {
                iziToast.info({
                    title: "<?php echo e(__('Information!')); ?>",
                    message: "<?php echo e($message); ?>",
                    position: 'topRight'
                });
            });
        </script>
    <?php endif; ?>


    <?php if(isset($errors) && $errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                $(function () {
                    iziToast.error({
                        title: "<?php echo e(__('Error')); ?>",
                        message: "<?php echo e($error); ?>",
                        position: 'topRight'
                    });
                });
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</div>
<?php /**PATH C:\Users\PC\Desktop\genialcassino\resources\views/components/flash.blade.php ENDPATH**/ ?>