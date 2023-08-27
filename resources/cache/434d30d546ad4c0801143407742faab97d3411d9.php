

<?php $__env->startSection('title', 'Configuration'); ?>

<?php
    $i = 0;
    $form = (new \App\Helpers\FormHelper\Form());
    $form->getInput("number", "number-format", "margin_top", "Margin Top", null, $configuration->margin_top , "noEmpty", 10, "data-max=100");
    $form->getInput("number", "number-format", "margin_bottom", "Margin Bottom", null, $configuration->margin_bottom , "noEmpty", 10, "data-max=100");
    $form->getInputFile('header', 'Header', false);
    $form->getInputFile('footer', 'Footer', false);
?>
<?php $__env->startSection('content'); ?>
    <div class="link">Configuration</div>

    <div class="form-content mt-25">
        <div class="d-flex">
            <form action="<?php echo e(\App\Components\Router\Router::route('configuration.edit')); ?>" method="post" style="width: 30%;"
                  class="custom__form" enctype="multipart/form-data">
                <?php echo $form->render(); ?>

                <div class="">
                    <button type="submit" class="btn-primary">Enregister<i class="fi-rr-disk"></i></button>
                </div>
            </form>
            <div style="margin-left: 30px; width: 70%;">
                <p style="font-weight:500;" class="mb-5">Entête:</p>
                <div class="img__box" style="padding: 20px;">
                    <img style="max-width: 100%"
                         data-img="<?php if($configuration->header === null): ?>
                         <?php echo e('/vendors/images/header.png'); ?>

                         <?php else: ?>
                         <?php echo e('/vendors/images/uploads/'.$configuration->header); ?>

                         <?php endif; ?>"
                         src="<?php if($configuration->header === null): ?>
                         <?php echo e('/vendors/images/header.png'); ?>

                         <?php else: ?>
                         <?php echo e('/vendors/images/uploads/'.$configuration->header); ?>

                         <?php endif; ?>"
                         alt="header" id="load__previewImg_header" class="previewImg">
                </div>
                <p style="font-weight:500;" class="mb-5 mt-30">Pied de page:</p>
                <div class="img__box" style="padding: 20px;">
                    <img style="max-width: 100%"
                         data-img="<?php if($configuration->footer === null): ?>
                         <?php echo e('/vendors/images/footer.png'); ?>

                         <?php else: ?>
                         <?php echo e('/vendors/images/uploads/'.$configuration->footer); ?>

                         <?php endif; ?>"
                         src="<?php if($configuration->footer === null): ?>
                         <?php echo e('/vendors/images/footer.png'); ?>

                         <?php else: ?>
                         <?php echo e('/vendors/images/uploads/'.$configuration->footer); ?>

                         <?php endif; ?>"
                         alt="footer" id="load__previewImg_footer" class="previewImg">
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\StockXpert\resources\views/settings/Configuration/index.blade.php ENDPATH**/ ?>