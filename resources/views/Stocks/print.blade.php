<!doctype html>
<html lang="en">
<head>
    <title>SITUTATION DU STOCK</title>

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
    <img src='@if ($configuration->header === null){{ 'vendors/images/header.png' }}@else{{ 'vendors/images/uploads/'.$configuration->header }}@endif'
         alt=''>
</htmlpageheader>

<htmlpagefooter name='myfooter'>
    <img src='@if ($configuration->footer === null){{ 'vendors/images/footer.png' }}@else{{ 'vendors/images/uploads/'.$configuration->footer }}@endif'
         alt=''>
</htmlpagefooter>

<main>
    <h2 style="text-decoration:underline;">Situation du stock au <span
                style="color:#007ee5;">{{ date('d/m/y H:i') }}</span></h2>


    <div style="border: 1px solid #e2e2e2;border-radius: 5px">
        <table>
            <thead>
            <tr style="font-weight:bold;">
                <th>#</th>
                <th>Article</th>
                <th>Categorie</th>
                <th>Pu</th>
                <th>Qte Alerte</th>
                <th>Qte Stock</th>
            </tr>
            </thead>

            <tbody>
                @forelse($stock as $key => $item)
                    <tr>
                        <td style="border-top: 1px solid #e2e2e2;">{{ $key + 1 }}</td>
                        <td style="border-top: 1px solid #e2e2e2;">{{ $item->articles->libelle }}</td>
                        <td style="border-top: 1px solid #e2e2e2;">{{ $item->articles->categories->libelle }}</td>
                        <td style="border-top: 1px solid #e2e2e2;">{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->articles->pv) }}</td>
                        <td style="border-top: 1px solid #e2e2e2;">{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->qte_alerte) }}</td>
                        <td style="border-top: 1px solid #e2e2e2;">{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->qte_stock) }}</td>
                    </tr>
                @empty
                    <tr style="border-top: 1px solid #e2e2e2;">
                        <td colspan="10" style="text-align: center;border-top: 1px solid #e2e2e2;"> Aucun enregistrement
                            trouvé
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
</body>
</html>