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

    <h1>Profit and Loss Report</h1>

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
    @foreach ($output as $out)
        <tr>
            {{--<td>{{\Illuminate\Support\Facades\DB::select('select name from chart_of_accounts where chart_of_accounts.id = journal_entry_lines.chart_of_accounts_id);')}}</td>--}}
            <td>{{$out -> chart_of_accounts_id}}</td>
            <td>
                @if($out -> is_debit == 1)
                    {{$out ->  amount}}
                @endif
            </td>
            <td>
                @if($out -> is_debit == 0)
                    {{$out -> amount}}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>

</table>


</body>

</html>