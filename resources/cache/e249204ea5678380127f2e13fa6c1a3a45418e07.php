

<?php $__env->startSection('title', 'Nouvelle vente'); ?>

<?php
    $form = new \App\Helpers\FormHelper\Form();

    $articles = [];
    foreach (\App\Models\Stocks::where('qte_stock', '>', '0')->get() as $item){
        $articles[] =[
            'id' => $item->id,
            'libelle' => $item->articles->libelle,
            'attr' => 'data-price='.$item->articles->pv,
    ];
    }
    $form->getSelectInput("custom-select", "article", "Article", null, "noEmpty", $articles);
    $form->getInput("text", "number-format", "price", "Prix", null, null, "", 255, 'disabled');
    $form->getInput("text", "number-format", "qte", "Quantité", null, null, "noEmpty", 255, null);
    $form->getInput("text", "number-format", "total", "Total", null, null, "", 255, 'disabled');

$qte_total = 0;
$total = 0;
?>

<?php $__env->startSection('content'); ?>
    <div class="link">
        <a href="<?php echo e(\App\Components\Router\Router::route('vente')); ?>">Vente Direct</a>
        <i class="fi-rr-angle-small-right"></i> Nouveau (<a href=""><?php echo e($facture->getNumeroFacture()); ?></a>)
        <?php if(!empty($_SESSION['vente_direct'])): ?>
            <span class="good-span" style="margin-left: 10px;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat(array_sum(array_map(fn($item) => $item['pu'] * $item['qte'], $_SESSION['vente_direct'])))); ?></span>
        <?php endif; ?>
    </div>

    <div class="group__input d-flex gap-1 mt-20" style="width: 100%;">
        <form method="post" class="custom__form" action="<?php echo e(\App\Components\Router\Router::route('vente.addArticle')); ?>"
              id="vente_form" style="flex-grow: 1;"
              data-stock="<?php echo e(\App\Components\Router\Router::route('stock.getStock')); ?>">
            <?php echo $form->render(); ?>

            <button style="margin-left: 15px;white-space: nowrap" type="submit" class="btn-primary h-40">Ajouter <i
                        class="fi-rr-plus"></i></button>
        </form>
    </div>

    <div style="padding-bottom: 75px;margin-top: 40px;">

        <form action="<?php echo e(\App\Components\Router\Router::route('vente.add')); ?>" id="form__submit" method="post">
            <?php if(!empty($_SESSION['vente_direct'])): ?>
                <?php echo $form->getInput("text", "", "client", "Client", null, null, "noEmpty", 255); ?>

            <?php endif; ?>
            <div class="table-list table-bordered table-striped">
                <table>
                    <thead>
                    <tr>
                        <th class="w-50"></th>
                        <th>Article</th>
                        <th>PU</th>
                        <th style="text-align:center;">Qte</th>
                        <th>Total</th>
                        <th class="w-50"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = ($_SESSION['vente_direct'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $qte_total += (int)$item['qte'];
                            $total += (int)$item['qte'] * (int)$item['pu'];
                        ?>
                        <tr>
                            <td class="img">
                                <div>
                                    <img src="/vendors/images/folder.svg " alt="folder">
                                </div>
                            </td>
                            <td>
                                <input type="hidden" name="id[]" value="<?php echo e($item['id']); ?>">
                                <input type="hidden" name="qte[]" value="<?php echo e($item['qte']); ?>">
                                <?php echo e($item['article']); ?>

                            </td>
                            <td><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat($item['pu'])); ?></td>
                            <td style="text-align:center;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item['qte'])); ?></td>
                            <td><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat((int)$item['qte'] * (int)$item['pu'])); ?></td>
                            <td>
                                <button type="submit" name="delete" class="link__table delete_link link_delete"
                                        value="delete"
                                        data-url="<?php echo e(\App\Components\Router\Router::route('vente.deleteArticle', ['id' => $item['id']])); ?>">
                                    <i class="fi-rr-trash"></i>Supprimer
                                </button>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="20" style="text-align: center"> Aucun enregistrement trouvé</td>
                        </tr>
                    <?php endif; ?>
                    <?php if(!empty($_SESSION['vente_direct'])): ?>
                        <tr>
                            <td colspan="3" style="text-align:center;"><b>Total Général</b></td>
                            <td style="border-left: 1px solid #e2e2e2;text-align:center;">
                                <b><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($qte_total)); ?></b></td>
                            <td style="border-left: 1px solid #e2e2e2;">
                                <b><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat($total)); ?></b></td>
                            <td></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <?php if (!empty($_SESSION['vente_direct'])): ?>
    <div class="sticky__footer d-flex gap-2">
        <button style="height: 42px;" class="btn-primary submit__form" data-id="form__submit">Enregistrer <i
                    class='fi-rr-disk'></i></button>
        <button style="height: 42px;" class="btn-primary link_delete"
                data-url="<?php echo e(\App\Components\Router\Router::route('vente.remove')); ?>">Annuler <i
                    class='fi-rr-trash'></i></button>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Ventes/form.blade.php ENDPATH**/ ?>