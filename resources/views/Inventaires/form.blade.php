@extends('layouts.layout')

@section('title', 'Nouveau inventaire')

@php
    $form = new \App\Helpers\FormHelper\Form();

@endphp

@section('content')
    <div class="link">
        <a href="{{ \App\Components\Router\Router::route('inventaire') }}">Inventaire</a>
        <i class="fi-rr-angle-small-right"></i> Nouveau (<a href="">{{ $inventaire->getNumeroInventaire() }}</a>)
    </div>

    <div style="padding-bottom: 75px;margin-top: 40px;">

        <form action="{{ \App\Components\Router\Router::route('inventaire.add') }}" id="form__submit" method="post">
            @if(!empty($_SESSION['vente_direct']))
                {!!  $form->getInput("text", "", "client", "Client", null, null, "noEmpty", 255) !!}
            @endif
            <div class="table-list table-bordered table-striped">
                <table>
                    <thead>
                    <tr>
                        <th class="w-50"></th>
                        <th>Article</th>
                        <th>Catégorie</th>
                        <th>PU</th>
                        <th style="text-align:center;" class="w-180">Quantité</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($stock as $item)
                        <tr>
                            <td class="img">
                                <div>
                                    <img src="/vendors/images/folder.svg " alt="folder">
                                    <input type="hidden" name="id[]" value="{{ $item->id }}">
                                </div>
                            </td>
                            <td>{{ $item->articles->libelle }}</td>
                            <td>{{ $item->articles->categories->libelle }}</td>
                            <td>{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat($item->articles->pv) }}</td>
                            <td>
                                {!!  $form->getInput("text", "number-format", "qte[]", "", null, 0, "noEmpty", 255, null); !!}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="20" style="text-align: center"> Aucun enregistrement trouvé</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
        </form>
    </div>

    <div class="sticky__footer d-flex gap-2">
        <button style="height: 42px;" class="btn-primary submit__form" data-id="form__submit">Enregistrer <i
                    class='fi-rr-disk'></i></button>
        <button style="height: 42px;" class="btn-primary link_delete"
                data-url="{{ \App\Components\Router\Router::route('inventaire.remove') }}">Annuler <i
                    class='fi-rr-trash'></i></button>
    </div>

@endsection