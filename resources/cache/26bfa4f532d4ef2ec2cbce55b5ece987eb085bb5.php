

<?php $__env->startSection('title', 'Inventaires'); ?>

<?php $__env->startSection('content'); ?>
    <div class="link">Inventaires</div>

    <div class="filter-form mt-25">
        <div class="wrapper">
            <div class="search_box">
                <div class="dropdown">
                    <div class="default_option">Trier Par</div>
                    <ul>
                        <?php $__currentLoopData = $tableHelper->getSortable(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="?<?php echo e(\App\Helpers\URLHelper\URL::withParams($_GET, ['sort' => $key, 'dir' => 'ASC'])); ?>"><?php echo e($item); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <form action="" method="get">
                    <div class="search_field">
                        <input type="text" autocomplete="off" name="q" class="input" id="autoComplete"
                               value="<?php echo e(request('q')); ?>"
                               placeholder="Rechercher...">
                        <i class="icon-search fi-rr-search"></i>
                        <?php if(!empty($_GET)): ?>
                            <button class="filter"><a href="<?php echo e(\App\Components\Router\Router::route(\App\Components\Router\Router::currentRoute())); ?>">Effacer les
                                    filtres <i class="fi-rr-broom"></i></a></button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="right-content d-flex gap-1">
            <div class="filter-drop dropdownList">
                <div class="default_option"><?php if(!empty($_GET['show'])): ?> <?php echo e((int)$_GET['show']); ?>/Pages <?php else: ?>
                        Affichage <?php endif; ?></div>
                <ul class="">
                    <?php for($i = 10 ; $i <= 100 ; $i += 10): ?>
                        <li><a href="?<?php echo e(\App\Helpers\URLHelper\URL::withParam($_GET, "show", $i)); ?>"><?php echo e($i); ?>/Pages</a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
            <button class="btn-primary custom__link"
                    data-url="<?php echo e(\App\Components\Router\Router::route('inventaire.addForm')); ?>">Nouveau<i
                        class="fi-rr-plus"></i></button>
        </div>
    </div>



    <div class="table-list table-bordered table-striped ">
        <table>
            <thead>
            <tr>
                <th class="w-50"></th>
                <th><?php echo $tableHelper->th('num'); ?></th>
                <th><?php echo $tableHelper->th('date'); ?></th>
                <th>Articles</th>
                <th><?php echo $tableHelper->th('utilisateurs_id'); ?></th>
                <th class="w-50"></th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="img">
                        <div>
                            <img src="/vendors/images/folder.svg " alt="folder">
                        </div>
                    </td>
                    <td><?php echo e($item->num); ?></td>
                    <td><?php echo e($item->date); ?></td>
                    <td><?php echo e($item->inventairesArticles->count()); ?> Articles</td>
                    <td><?php echo e($item->utilisateurs->nom); ?> <?php echo e($item->utilisateurs->prenom); ?></td>
                    <td class="table_drop_action">
                        <i class='icon fi-rr-menu-dots-vertical'></i>
                        <div class="dropdown">
                            <ul>
                                <li>
                                    <a href="<?php echo e(\App\Components\Router\Router::route('inventaire.print', ['id' => $item->id])); ?>" target="_blank" data-turbolinks="false"><i class="fi-rr-print"></i> Imprimer</a>
                                </li>
                            </ul>
                        </div>
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

    <div class="table-nav">
        <div class="pagination">
            <?php echo (new \App\Helpers\Pagination\PaginationHelper($data->lastPage(), $_GET))->getPagination(); ?>

        </div>
        <p><span><?php echo e($data->lastPage() > 1 ? (($data->currentPage() - 1) * $data->perPage()) + $data->count() : $data->count()); ?>/<?php echo e($data->total()); ?></span>
            Elements</p>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Inventaires/index.blade.php ENDPATH**/ ?>