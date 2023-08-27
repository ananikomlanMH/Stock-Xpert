<?php
    header("HTTP/1.1 500 Internal Server Error");
?>

<?php if(empty($_SESSION["username"])): ?>
    
<?php endif; ?>

<?php $__env->startSection('title', '500'); ?>

<?php $__env->startSection('content'); ?>
    <div class="countainer-404">
        <div class="img">
            <img src="/vendors/images/svg/500.svg" alt="500">
        </div>
        <div class="content">
            <h1 class="title">Oups ! Ce n’est pas ce que vous cherchiez
            </h1>
            <p>
                Il semble qu'une erreur interne du serveur est survenue. Veuillez réessayer ultérieurement..
            </p>
            <p>
                Tentez à nouveau en revenant à la <a href="">page d'acceuil</a>
            </p><br>
            <p>Voici la panne:</p>
            <p><?php echo $message; ?></p>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Errors/500.blade.php ENDPATH**/ ?>