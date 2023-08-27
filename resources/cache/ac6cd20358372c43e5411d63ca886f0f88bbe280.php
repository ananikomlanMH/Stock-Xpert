<!doctype html>
<html lang="en">
<head>
    <title>SITUTATION DU STOCK</title>

    <style>
        @page {
            header: myheader;
            footer: myfooter;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: .8em;
        }

        tr.head {
            border-top: 1px solid #b9b9b9;
            border-bottom: 1px solid #b9b9b9;
        }

        tr.head td {
            background: rgba(236, 236, 236, 0.5);
            border-left: 1px solid #b9b9b9;
        }

        main {
            margin: 0 35px;
        }
    </style>
</head>
<body>

<htmlpageheader name='myheader'>
    <img src='<?php if($configuration->header === null): ?><?php echo e('vendors/images/header.png'); ?><?php else: ?><?php echo e('vendors/images/uploads/'.$configuration->header); ?><?php endif; ?>'
         alt=''>
</htmlpageheader>

<htmlpagefooter name='myfooter'>
    <img src='<?php if($configuration->footer === null): ?><?php echo e('vendors/images/footer.png'); ?><?php else: ?><?php echo e('vendors/images/uploads/'.$configuration->footer); ?><?php endif; ?>'
         alt=''>
</htmlpagefooter>

<main>
    <h2 style="text-decoration:underline;">Situation du stock au <span
                style="color:#007ee5;"><?php echo e(date('d/m/y H:i')); ?></span></h2>


    <div style="border: 1px solid #e2e2e2;border-radius: 5px">
        <table>
            <thead>
            <tr style="font-weight:bold;">
                <th>#</th>
                <th>Article</th>
                <th>Categorie</th>
                <th>Pu</th>
                <th>Qte Alerte</th>
                <th>Qte Stock</th>
            </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td style="border-top: 1px solid #e2e2e2;"><?php echo e($key + 1); ?></td>
                        <td style="border-top: 1px solid #e2e2e2;"><?php echo e($item->articles->libelle); ?></td>
                        <td style="border-top: 1px solid #e2e2e2;"><?php echo e($item->articles->categories->libelle); ?></td>
                        <td style="border-top: 1px solid #e2e2e2;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->articles->pv)); ?></td>
                        <td style="border-top: 1px solid #e2e2e2;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->qte_alerte)); ?></td>
                        <td style="border-top: 1px solid #e2e2e2;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->qte_stock)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr style="border-top: 1px solid #e2e2e2;">
                        <td colspan="10" style="text-align: center;border-top: 1px solid #e2e2e2;"> Aucun enregistrement
                            trouvé
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Stocks/print.blade.php ENDPATH**/ ?>