@extends('layouts.layout')

@section('title', 'Approvisionnement')

@section('content')
    <div class="link">Approvisionnement</div>

    <div class="filter-form mt-25">
        <div class="wrapper">
            <div class="search_box">
                <div class="dropdown">
                    <div class="default_option">Trier Par</div>
                    <ul>
                        @foreach($tableHelper->getSortable() as $key => $item)
                            <li>
                                <a href="?{{ \App\Helpers\URLHelper\URL::withParams($_GET, ['sort' => $key, 'dir' => 'ASC']) }}">{{ $item }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <form action="" method="get">
                    <div class="search_field">
                        <input type="text" autocomplete="off" name="q" class="input" id="autoComplete"
                               value="{{ request('q') }}"
                               placeholder="Rechercher...">
                        <i class="icon-search fi-rr-search"></i>
                        @if(!empty($_GET))
                            <button class="filter"><a href="{{ \App\Components\Router\Router::route(\App\Components\Router\Router::currentRoute()) }}">Effacer les
                                    filtres <i class="fi-rr-broom"></i></a></button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="right-content d-flex gap-1">
            <div class="filter-drop dropdownList">
                <div class="default_option">@if(!empty($_GET['show'])) {{ (int)$_GET['show'] }}/Pages @else
                        Affichage @endif</div>
                <ul class="">
                    @for($i = 10 ; $i <= 100 ; $i += 10)
                        <li><a href="?{{ \App\Helpers\URLHelper\URL::withParam($_GET, "show", $i) }}">{{ $i }}/Pages</a>
                        </li>
                    @endfor
                </ul>
            </div>
            <button class="btn-primary custom__link"
                    data-url="{{ \App\Components\Router\Router::route('appro.addForm') }}">Nouveau<i
                        class="fi-rr-plus"></i></button>
        </div>
    </div>

    <div class="table-list table-bordered table-striped ">
        <table>
            <thead>
            <tr>
                <th class="w-50"></th>
                <th>{!! $tableHelper->th('num') !!}</th>
                <th>{!! $tableHelper->th('date') !!}</th>
                <th>{!! $tableHelper->th('fournisseur') !!}</th>
                <th>{!! $tableHelper->th('utilisateurs_id') !!}</th>
                <th>Total TTC</th>
                <th class="w-50"></th>
            </tr>
            </thead>
            <tbody>
            @forelse($data as $item)
                <tr>
                    <td class="img">
                        <div>
                            <img src="/vendors/images/folder.svg " alt="folder">
                        </div>
                    </td>
                    <td>{{ $item->num }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->fournisseur }}</td>
                    <td>{{ $item->utilisateurs->nom }} {{ $item->utilisateurs->prenom }}</td>
                    <td>{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat($item->total()) }}</td>
                    <td class="table_drop_action">
                        <i class='icon fi-rr-menu-dots-vertical'></i>
                        <div class="dropdown">
                            <ul>
                                <li>
                                    <a href="{{ \App\Components\Router\Router::route('appro.print', ['id' => $item->id]) }}" target="_blank" data-turbolinks="false"><i class="fi-rr-print"></i> Imprimer</a>
                                </li>
                                <li>
                                    <form action="{{ \App\Components\Router\Router::route('appro.delete', ['id' => $item->id]) }}" method="post" class="deleteForm">
                                        <button type="submit" name="delete" class="dropdown__delete__form_button"
                                                value="delete"><i class="fi-rr-trash"></i>Supprimer
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
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

    <div class="table-nav">
        <div class="pagination">
            {!! (new \App\Helpers\Pagination\PaginationHelper($data->lastPage(), $_GET))->getPagination() !!}
        </div>
        <p><span>{{ $data->lastPage() > 1 ? (($data->currentPage() - 1) * $data->perPage()) + $data->count() : $data->count() }}/{{ $data->total() }}</span>
            Elements</p>
    </div>


@endsection