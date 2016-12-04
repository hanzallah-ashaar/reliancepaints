<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<head>

    <h1>Trial and Balance Report</h1>

    <hr>
    <br>

</head>

<body>

<table width = "100%">

    <thead>

    <tr>
        <th>
            Account
        </th>
        <th>
            Debit
        </th>
        <th>
            Credit
        </th>
    </tr>
    </thead>

    <tbody>
    <?php $i = 0; ?>
    <?php $j = 0; ?>
    @foreach ($output as $out)
        <tr>
            <td>{{\App\ChartOfAccount::findOrFail( $out -> chart_of_accounts_id) -> name}}</td>
            <td>
                @if($out -> is_debit == 1)
                    {{$out ->  amount}}
                    <?php $i = $i + $out->amount; ?>
                @endif
            </td>
            <td>
                @if($out -> is_debit == 0)
                    {{$out -> amount}}
                    <?php $j = $j + $out->amount; ?>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>

    {{'Total Debit = ' . $i . '             ' . 'Total Credit = ' . $j  .  '            Balance = '. ($i-$j)}}


</table>


</body>

</html>