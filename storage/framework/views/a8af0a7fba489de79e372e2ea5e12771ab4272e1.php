<?php $__env->startSection('content'); ?>

    <modifypainting :paintings="<?php echo e($paintings); ?>"></modifypainting>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>