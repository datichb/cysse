<!DOCTYPE html>

<html>

<head>

    <title></title>

</head>

<body>

    <h1>Vous avez une nouvelle demande d'information de <?php echo e($info->name); ?></h1>
    <p><?php echo e($info->email); ?></p>
    <p><?php echo e($info->message); ?></p>


</body>
</html>