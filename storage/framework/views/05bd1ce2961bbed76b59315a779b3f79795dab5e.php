<?php $__env->startSection('content'); ?>
    <?php if(auth()->guard()->guest()): ?>
        <showcollection :collection="<?php echo e(json_encode($collection)); ?>"></showcollection>
    <?php else: ?>
        <?php if(Auth::user()->isAdmin()): ?>
            <showcollection :auth="true" :collection="<?php echo e(json_encode($collection)); ?>"></showcollection>
        <?php else: ?>
            <showcollection :collection="<?php echo e(json_encode($collection)); ?>"></showcollection>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>