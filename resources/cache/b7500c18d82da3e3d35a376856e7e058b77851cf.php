

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="link">Dashboard</div>
<div class="stats-countainer">
    <div class="stat-item">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Vente Direct (<?php echo e(\App\Models\Factures::all()->count()); ?>)</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>

    <div class="stat-item">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Dépenses (<?php echo e(\App\Models\Depenses::all()->count()); ?>)</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>

    <div class="stat-item mt-20">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Articles (<?php echo e(\App\Models\Articles::all()->count()); ?>)</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>

    <div class="stat-item">
        <div class="icon">
            <i class="fi-rr-badge"></i>
        </div>
        <div class="text">
            <p>Categorie (<?php echo e(\App\Models\Categories::all()->count()); ?>)</p>
            <h3>
                <span></span>
            </h3>
        </div>
    </div>
</div>
<div style="margin-top: 20px;display:flex;">
    <div class="chartJS" style="border-right: 1px solid #e2e2e2;width: 69%;padding-right: 10px;">
        <canvas id="chart__stats_year"></canvas>
    </div>
    <div style="width: 30%;margin-left: 25px;">
        <canvas id="chart__stats_doughnut"></canvas>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    var categorie_article = <?php echo $categorie_article; ?>;
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\StockXpert\resources\views/home/index.blade.php ENDPATH**/ ?>