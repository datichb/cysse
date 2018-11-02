<?php $__env->startSection('content'); ?>

    <createpainting :plumes="<?php echo e(json_encode($plumes)); ?>" :sizes="<?php echo e(json_encode($sizes)); ?>"></createpainting>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>