@php
    $form = new \App\Helpers\FormHelper\Form();

    $articles = [];
    foreach (\App\Models\Articles::all() as $item){
        $articles[] =[
            'id' => $item->id,
            'libelle' => $item->libelle,
    ];
    }
    $form->getSelectInput("custom-select", "articles_id", "Article", $stock->articles_id, "noEmpty", $articles);
    $form->getInput("text", "number-format", "qte_alerte", "Qte Alerte", null, $stock->qte_alerte, "noEmpty", 255);
    $form->getInput("text", "number-format", "qte_stock", "Qte Stock", null, $stock->qte_stock, "noEmpty", 255);

    if (empty($stock->id)){
        $url = \App\Components\Router\Router::route('stock.add');
    }else{
        $url = \App\Components\Router\Router::route('stock.edit', ['id' => $stock->id]);
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
            <p>Stock</p>
            @if(empty($stock->id))
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