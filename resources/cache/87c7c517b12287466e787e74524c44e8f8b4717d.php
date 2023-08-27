<?php
    header("HTTP/1.1 404 Not Found");
?>



<?php $__env->startSection('title', '404'); ?>

<?php $__env->startSection('content'); ?>
    <div class="countainer-404">
        <div class="img">
            <img src="/vendors/images/svg/404.svg" alt="404">
        </div>
        <div class="content">
            <h1 class="title">Oups ! Ce n’est pas ce que vous cherchiez
            </h1>
            <p>
                Il semble que vous essayez d'accéder à une page qui a été supprimée ou qui n'a même jamais existé.
            </p>
            <p>
                Tentez à nouveau en revenant à la <a href="">page d'acceuil</a>
            </p><br>
            <p>Voici quelques conseils:</p>
            <ul>
                <li>Vérifiez l'url de la page.</li>
                <li>Vérifiez les câbles réseau, le modem et le routeur.</li>
                <li>Contactez l'administrateur.</li>
            </ul>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Errors/404.blade.php ENDPATH**/ ?>