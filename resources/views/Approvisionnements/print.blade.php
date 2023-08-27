<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Approvisionnement N°{{ $appro->num }}</title>

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

        tr.head{
            border-top: 1px solid #b9b9b9;
            border-bottom: 1px solid #b9b9b9;
        }
        tr.head td {
            background: rgba(236, 236, 236, 0.5);
            border-left: 1px solid #b9b9b9;
        }
        main{
            margin: 0 35px;
        }
    </style>
</head>
<body>

<htmlpageheader name='myheader'>
    <img src='@if ($configuration->header === null){{ 'vendors/images/header.png' }}@else{{ 'vendors/images/uploads/'.$configuration->header }}@endif' alt=''>
</htmlpageheader>

<htmlpagefooter name='myfooter'>
    <img src='@if ($configuration->footer === null){{ 'vendors/images/footer.png' }}@else{{ 'vendors/images/uploads/'.$configuration->footer }}@endif' alt=''>
</htmlpagefooter>

<main>
<h2 style="text-decoration:underline;">Approvisionnement <span style="color:#007ee5;">N°{{ $appro->num }}</span></h2>
<p style="line-height: 1.6;">
    Fournisseur: {{ $appro->fournisseur }} <br>
    Date: {{ $appro->date }} <br>
</p>
    <div style="border: 1px solid #e2e2e2;border-radius: 5px">
        <table>
            <tr>
                <td>Article</td>
                <td>Qte</td>
                <td>Pa</td>
                <td>Total</td>
            </tr>
            @forelse($appro->approvissionnmentArticles as $item)
            <tr>
                <td style="border-top: 1px solid #e2e2e2;">{{ $item->articles->libelle }}</td>
                <td style="border-top: 1px solid #e2e2e2;border-left: 1px solid #e2e2e2;">{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->qte) }}</td>
                <td style="border-top: 1px solid #e2e2e2;border-left: 1px solid #e2e2e2;">{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat2($item->pa) }}</td>
                <td style="border-top: 1px solid #e2e2e2;border-left: 1px solid #e2e2e2;">{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat($item->qte*$item->pa) }}</td>
            </tr>
            @empty
                <tr style="border-top: 1px solid #e2e2e2;">
                    <td colspan="4" style="text-align: center;border-top: 1px solid #e2e2e2;"> Aucun enregistrement trouvé</td>
                </tr>
            @endforelse
            @if(!empty($appro->approvissionnmentArticles))
                <tr>
                    <td colspan="3" style="text-align: center;border-top: 1px solid #e2e2e2;"> Total </td>
                    <td style="border-top: 1px solid #e2e2e2;border-left: 1px solid #e2e2e2;"> <b>{{ \App\Helpers\NumberHelper\NumberHelper::CurrencyFormat($appro->total()) }}</b> </td>
                </tr>
            @endif
        </table>
    </div>
    <p>Arreté la presente facture à la somme de:  <b>{{ (new \NumberToWords\NumberToWords())->getNumberTransformer('fr')->toWords($appro->total()) }} CFA.</b></p>
</main>
</body>
</html>