<?php $__env->startSection('content'); ?>

    <?php if(auth()->guard()->check()): ?>
        <paintinglist :auth='true' :paintings='<?php echo e(json_encode($paintings)); ?>'></paintinglist>
    <?php endif; ?>

    <?php if(auth()->guard()->guest()): ?>
        <paintinglist :paintings='<?php echo e(json_encode($paintings)); ?>'></paintinglist>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>