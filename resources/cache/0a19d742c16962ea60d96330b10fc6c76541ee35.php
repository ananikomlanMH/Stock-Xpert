

<?php $__env->startSection('title', 'Nouveau inventaire'); ?>

<?php
    $form = new \App\Helpers\FormHelper\Form();

?>

<?php $__env->startSection('content'); ?>
    <div class="link">
        <a href="<?php echo e(\App\Components\Router\Router::route('inventaire')); ?>">Inventaire</a>
        <i class="fi-rr-angle-small-right"></i> Nouveau (<a href=""><?php echo e($inventaire->getNumeroInventaire()); ?></a>)
    </div>

    <div style="padding-bottom: 75px;margin-top: 40px;">

        <form action="<?php echo e(\App\Components\Router\Router::route('inventaire.add')); ?>" id="form__submit" method="post">
            <?php if(!empty($_SESSION['vente_direct'])): ?>
                <?php echo $form->getInput("text", "", "client", "Client", null, null, "noEmpty", 255); ?>

            <?php endif; ?>
            <div class="table-list table-bordered table-striped">
                <table>
                    <thead>
                    <tr>
                        <th class="w-50"></th>
                        <th>Article</th>
                        <th>Catégorie</th>
                        <th>PU</th>
                        <th style="text-align:center;" class="w-180">Quantité</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="img">
                                <div>
                                    <img src="/vendors/images/folder.svg " alt="folder">
                                    <input type="hidden" name="id[]" value="<?php echo e($item->id); ?>">
                                </div>
                            </td>
                            <td><?php echo e($item->articles->libelle); ?></td>
                            <td><?php echo e($item->articles->categories->libelle); ?></td>
                            <td><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat($item->articles->pv)); ?></td>
                            <td>
                                <?php echo $form->getInput("text", "number-format", "qte[]", "", null, 0, "noEmpty", 255, null); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="20" style="text-align: center"> Aucun enregistrement trouvé</td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <div class="sticky__footer d-flex gap-2">
        <button style="height: 42px;" class="btn-primary submit__form" data-id="form__submit">Enregistrer <i
                    class='fi-rr-disk'></i></button>
        <button style="height: 42px;" class="btn-primary link_delete"
                data-url="<?php echo e(\App\Components\Router\Router::route('inventaire.remove')); ?>">Annuler <i
                    class='fi-rr-trash'></i></button>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Inventaires/form.blade.php ENDPATH**/ ?>