<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Inventaire N°<?php echo e($inventaire->num); ?></title>

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
    <h2 style="text-decoration:underline;">Inventaire <span style="color:#007ee5;">N°<?php echo e($inventaire->num); ?></span></h2>

    <div style="border: 1px solid #e2e2e2;border-radius: 5px">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Article</th>
                    <th>Categorie</th>
                    <th>Pu</th>
                    <th>Qte physique</th>
                    <th>Qte virtuel</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $inventaire->inventairesArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td style="border-top: 1px solid #e2e2e2;"><?php echo e($key + 1); ?></td>
                    <td style="border-top: 1px solid #e2e2e2;"><?php echo e($item->articles->libelle); ?></td>
                    <td style="border-top: 1px solid #e2e2e2;"><?php echo e($item->articles->categories->libelle); ?></td>
                    <td style="border-top: 1px solid #e2e2e2;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->articles->pv)); ?></td>
                    <td style="border-top: 1px solid #e2e2e2;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->qte)); ?></td>
                    <td style="border-top: 1px solid #e2e2e2;"><?php echo e(\App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->qte_virtuel)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr style="border-top: 1px solid #e2e2e2;">
                    <td colspan="9" style="text-align: center;border-top: 1px solid #e2e2e2;"> Aucun enregistrement
                        trouvé
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>

        </table>
    </div>
    <br>
    <p style="text-align:right;">
        <u>Signature</u> <br>
        <b><?php echo e($inventaire->utilisateurs->nom); ?> <?php echo e($inventaire->utilisateurs->prenom); ?></b>
    </p>
</main>
</body>
</html><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Inventaires/print.blade.php ENDPATH**/ ?>