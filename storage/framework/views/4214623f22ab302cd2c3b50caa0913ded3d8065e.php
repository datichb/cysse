<?php $__env->startSection('content'); ?>

    <showpainting :painting="<?php echo e(json_encode($painting)); ?>"></showpainting>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>