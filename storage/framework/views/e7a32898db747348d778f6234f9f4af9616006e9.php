<?php $__env->startSection('content'); ?>
    <div class="content">
        <div style="height: 20%;"></div>
        <div class="visit-card">
            <h2>
            <span></span>
            Cette page n'est pas disponible actuellement
            <span></span>
            </h2>
            <p class="Subtitle">
                Revenez plus tard pour découvrir toutes nos nouveautés !
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<style>
    h2 {
        margin-left:20%;
        display: flex;
        align-items: center;
        width: 60%;
        font-size: 60pt;
        font-family: "Dancing Script";
    }

    h2 span {
        content:"";
        flex: 1 1 auto;
        border-top: 1px solid #000;
        margin: 20px;
    }

    .visit-card{
        width: 100%;
        height: 20%;
    }

    .Subtitle{
        margin-top: 1%;
        text-align: center;
        width: 100%;
        color: black;
        font-size: 30pt;
        font-family: "Sorts Mill Goudy";
    }
</style>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>