<?php
    $form = new \App\Helpers\FormHelper\Form();
    
    $form->getInput("text", "", "motif", "Motif", null, $depense->motif, "noEmpty", 255);
    $form->getInput("date", "date-picker", "date", "Date", null, $depense->date, "noEmpty", 255);
    $form->getInput("text", "number-format", "montant", "Montant", null, $depense->montant, "noEmpty", 255);

    if (empty($depense->id)){
        $url = \App\Components\Router\Router::route('depense.add');
    }else{
        $url = \App\Components\Router\Router::route('depense.edit', ['id' => $depense->id]);
    }
?>
<div class="modal__box edit">
    <div class="modal__container w-7x">
        <div class="form-loader">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="modal__header">
            <p>Dépense</p>
            <?php if(empty($depense->id)): ?>
                <i class="fi-rr-cross close__modal"></i>
            <?php else: ?>
                <?php echo $__env->make('includes.formToggle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        </div>
        <div class="modal__body">
            <form action="<?php echo e($url); ?>">
                <?php echo $form->render(); ?>

            </form>
        </div>
        <div class="modal__footer">
            <input class="close__modal" type="reset" value="Annuler">
            <input type="submit" class="modalForm__submit" name="add" value="Enregistrer">
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\StockXpert\resources\views/Depenses/form.blade.php ENDPATH**/ ?>