<?php $__env->startSection('content'); ?>
    <?php if(auth()->guard()->guest()): ?>
        <listcollection :cc='<?php echo e(json_encode($collection)); ?>' :nbc='<?php echo e(json_encode($nbCollection)); ?>'></listcollection>
    <?php else: ?>
        <?php if(Auth::user()->isAdmin()): ?>
            <listcollection :auth='true' :cc='<?php echo e(json_encode($collection)); ?>' :nbc='<?php echo e(json_encode($nbCollection)); ?>'></listcollection>
        <?php else: ?>
            <listcollection :cc='<?php echo e(json_encode($collection)); ?>' :nbc='<?php echo e(json_encode($nbCollection)); ?>'></listcollection>
        <?php endif; ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>