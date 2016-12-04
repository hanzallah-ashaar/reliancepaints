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

    <h1>General Report</h1>

    <hr>
    <br>

</head>

<body>

<table width = "100%">

    <thead>

    <tr>
        <th>
            ID
        </th>
        <th>
            Account
        </th>
        <th>
            Date Posted
        </th>
    </tr>
    </thead>

    <tbody>
    @foreach ($output as $out)
        <tr>
            <td>{{$out-> id}}</td>
            <td>{{\App\ChartOfAccount::findOrFail( $out -> chart_of_accounts_id) -> name}}</td>
            <td>{{$out -> date_posted}}</td>
        </tr>
    @endforeach
    </tbody>

</table>


</body>

</html>