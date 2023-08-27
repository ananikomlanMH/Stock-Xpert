<?php
    $form = new \App\Helpers\FormHelper\Form();
    
    $form->getInput("text", "", "nom", "Nom", null, $utilisateur->nom, "noEmpty", 255);
    $form->getInput("text", "", "prenom", "Prénom", null, $utilisateur->prenom, "noEmpty", 255);
    $form->getInput("tel", "", "telephone", "Téléphone", null, $utilisateur->telephone, "", 255);
    $form->getInput("text", "", "adresse", "Adresse", null, $utilisateur->adresse, "noEmpty", 255);
    $form->getSelectInput("custom-select", "type", "Type", $utilisateur->type, "noEmpty", ['Caisiers', 'Comptable', 'Administrateur']);
    $form->getText("<div class='d-flex gap-2'>");
    $form->getInput("text", "", "login", "Login", null, $utilisateur->login, "noEmpty", 255);
    $form->getInput("password", "", "password", "Password", null, null, "noEmpty", 255);
    $form->getText('</div>');

    if (empty($utilisateur->id)){
        $url = \App\Components\Router\Router::route('settings.utilisateur.add');
    }else{
        $url = \App\Components\Router\Router::route('settings.utilisateur.edit', ['id' => $utilisateur->id]);
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
            <p>Utilisateurs</p>
            <?php if(empty($utilisateur->id)): ?>
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
</div><?php /**PATH C:\wamp64\www\StockXpert\resources\views/settings/Utilisateurs/form.blade.php ENDPATH**/ ?>