@php
    $form = new \App\Helpers\FormHelper\Form();
    $categorie = [];
    foreach (\App\Models\Categories::all() as $item){
        $categorie[] =[
            'id' => $item->id,
            'libelle' => $item->libelle,
    ];
    }
    $form->getInput("text", "", "libelle", "Article", null, $article->libelle, "noEmpty", 255);
    $form->getSelectInput("custom-select", "categories_id", "Catégorie", $article->categories_id, "noEmpty", $categorie);
    $form->getInput("text", "number-format", "pv", "Prix de vente", null, $article->pv, "noEmpty", 255);

    if (empty($article->id)){
        $url = \App\Components\Router\Router::route('settings.article.add');
    }else{
        $url = \App\Components\Router\Router::route('settings.article.edit', ['id' => $article->id]);
    }
@endphp
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
            <p>Article</p>
            @if(empty($article->id))
                <i class="fi-rr-cross close__modal"></i>
            @else
                @include('includes.formToggle')
            @endif
        </div>
        <div class="modal__body">
            <form action="{{ $url }}">
                {!! $form->render() !!}
            </form>
        </div>
        <div class="modal__footer">
            <input class="close__modal" type="reset" value="Annuler">
            <input type="submit" class="modalForm__submit" name="add" value="Enregistrer">
        </div>
    </div>
</div>