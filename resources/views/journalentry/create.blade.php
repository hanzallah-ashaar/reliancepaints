@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-md-offset-0.5">
                <div class="panel panel-default">
                    <div class="panel-heading">Journal Voucher</div>
                    <div class="panel-body">
                        {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/journalentry') }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="form-group{{ $errors->has('journal') ? ' has-error' : '' }}">--}}
                                {{--<label for="journal" class="col-md-4 control-label">Journal</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="journal" type="text" class="form-control" name="journal" ">--}}

                                    {{--@if ($errors->has('journal'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('journal') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">--}}
                                {{--<label for="reference" class="col-md-4 control-label">Reference</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="reference" type="text" class="form-control" name="reference" ">--}}

                                    {{--@if ($errors->has('reference'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('reference') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">--}}
                                {{--<label for="date" class="col-md-4 control-label">Date</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="date" type="date" class="form-control" name="date" value="{{ \Carbon\Carbon::now()->format('m d Y') }}">--}}
                                    {{--@if ($errors->has('date'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('date') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--fields in the table : account, partner, label, debit, credit--}}


                            {{--<div class="panel-body">--}}
                                {{--<div class="col-md-15 col-md-offset-0.5">--}}
                                    {{--<ul>--}}
                                        {{--<style>th, td {--}}
                                                {{--padding: 5px;--}}
                                            {{--}--}}
                                        {{--</style>--}}
                                        {{--<table style="width:100%" id="journalEntries" border="1">--}}

                                            {{--<tr>--}}
                                                {{--<th>No.</th>--}}
                                                {{--<th>Account</th>--}}
                                                {{--<th>Partner</th>--}}
                                                {{--<th>Label</th>--}}
                                                {{--<th>Debit</th>--}}
                                                {{--<th>Credit</th>--}}
                                            {{--</tr>--}}

                                            {{--<tbody>--}}
                                            {{--@foreach($users as $user)--}}
                                                {{--<tr class="duprow">--}}
                                                    {{--<td>1</td>--}}
                                                    {{--<td>    --}}{{-- drop down of all the accounts in alphabetical order --}}
                                                        {{--<div class="form-group{{ $errors->has('account1') ? ' has-error' : '' }}">--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<input id="account1" type="text" size="30" class="dup form-control" name="account1">--}}
                                                                {{--<select class="form-control" name="accounts" id="accounts" data-parsley-required="true">--}}
                                                                {{--@foreach($accounts as $account)--}}
                                                                    {{--<option value="{{$account->name}}">{{$account->name}}</option>--}}
                                                                {{--@endforeach--}}
                                                                {{--@if ($errors->has('account1'))--}}
                                                                    {{--<span class="help-block">--}}
                                                                        {{--<strong>{{ $errors->first('account1') }}</strong>--}}
                                                                    {{--</span>--}}
                                                                {{--@endif--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</td>--}}

                                                    {{--<td>--}}
                                                        {{--<div class="form-group{{ $errors->has('partner1') ? ' has-error' : '' }}">--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<input id="partner1" type="text" class="dup form-control" name="partner1">--}}

                                                                {{--@if ($errors->has('partner1'))--}}
                                                                    {{--<span class="help-block">--}}
                                                                        {{--<strong>{{ $errors->first('partner1') }}</strong>--}}
                                                                    {{--</span>--}}
                                                                {{--@endif--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</td>--}}

                                                    {{--<td>--}}
                                                        {{--<div class="form-group{{ $errors->has('label1') ? ' has-error' : '' }}">--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<input id="label1" type="text" class="dup form-control" name="label1">--}}

                                                                {{--@if ($errors->has('label1'))--}}
                                                                    {{--<span class="help-block">--}}
                                                                        {{--<strong>{{ $errors->first('label1') }}</strong>--}}
                                                                    {{--</span>--}}
                                                                {{--@endif--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</td>--}}

                                                    {{--<td>--}}
                                                        {{--<div class="form-group{{ $errors->has('debit1') ? ' has-error' : '' }}">--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<input id="debit1" type="number" class="dup form-control" name="debit1">--}}

                                                                {{--@if ($errors->has('debit1'))--}}
                                                                    {{--<span class="help-block">--}}
                                                                        {{--<strong>{{ $errors->first('debit1') }}</strong>--}}
                                                                    {{--</span>--}}
                                                                {{--@endif--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</td>--}}

                                                    {{--<td>--}}
                                                        {{--<div class="form-group{{ $errors->has('credit1') ? ' has-error' : '' }}">--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<input id="credit1" type="number" class="dup form-control" name="credit1"/>--}}

                                                                {{--@if ($errors->has('credit1'))--}}
                                                                    {{--<span class="help-block">--}}
                                                                        {{--<strong>{{ $errors->first('credit1') }}</strong>--}}
                                                                    {{--</span>--}}
                                                                {{--@endif--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</td>--}}

                                                    {{--<td>--}}
                                                        {{--<input type="button" id="delrow" value="Delete Row" onclick="deleteRow(this)"/>--}}
                                                    {{--</td>--}}

                                                {{--</tr>--}}
                                            {{--@endforeach--}}

                                            {{--</tbody>--}}

                                        {{--</table>--}}

                                    {{--</ul>--}}

                                    {{--add a new row--}}
                                    {{--<button type="button" id="addmorerows" class="btn btn-success" onclick="addRow()">Add New Row</button>--}}
                                    {{--<script>--}}

                                        {{--var table = document.getElementById('journalEntries'),--}}
                                            {{--tbody = table.getElementsByTagName('tbody')[1],--}}
                                            {{--clone = tbody.rows[0].cloneNode(true);--}}


                                        {{--function deleteRow(el) {--}}
                                            {{--var i = el.parentNode.parentNode.rowIndex;--}}
                                            {{--table.deleteRow(i);--}}
                                            {{--while (table.rows[i]) {--}}
                                                {{--updateRow(table.rows[i], i, false);--}}
                                                {{--i++;--}}
                                            {{--}--}}
                                        {{--}--}}

                                        {{--function addRow() {--}}
                                            {{--var new_row = updateRow(clone.cloneNode(true), ++tbody.rows.length, true);--}}
                                            {{--tbody.appendChild(new_row);--}}
                                        {{--}--}}


                                        {{--function updateRow(row, i, reset) {--}}
                                            {{--row.cells[0].innerHTML = i;--}}

                                            {{--var inp1 = row.cells[1].getElementsByClassName('dup')[0];--}}
                                            {{--var inp2 = row.cells[2].getElementsByTagName('input')[0];--}}
                                            {{--var inp3 = row.cells[3].getElementsByTagName('input')[0];--}}
                                            {{--var inp4 = row.cells[4].getElementsByTagName('input')[0];--}}
                                            {{--var inp5 = row.cells[5].getElementsByTagName('input')[0];--}}

                                            {{--inp1.id = 'account' + i;--}}
                                            {{--inp1.name = 'account' + i;--}}
                                            {{--inp2.id = 'partner' + i;--}}
                                            {{--inp2.name = 'partner' + i;--}}
                                            {{--inp3.id = 'label' + i;--}}
                                            {{--inp3.name = 'label' + i;--}}
                                            {{--inp4.id = 'debit' + i;--}}
                                            {{--inp4.name = 'debit' + i;--}}
                                            {{--inp5.id = 'credit' + i;--}}
                                            {{--inp5.name = 'credit' + i;--}}

                                            {{--if (reset) {--}}
                                                {{--inp1.value = inp2.value = inp3.value = inp4.value = inp5.value = '';--}}
                                            {{--}--}}
                                            {{--return row;--}}
                                        {{--}--}}
                                    {{--</script>--}}

                                {{--</div>--}}

                            {{--</div>--}}

                            {{----------------------------------------------}}

                            {!! Form::open(array('route' => 'journalentry.store','method'=>'POST','id' => 'j_entry')) !!}
                            <div class="row">




                                <div class="col-xs-4 col-sm-4 col-md-4">

                                    <div class="form-group{{ $errors->has('journal') ? ' has-error' : '' }}">
                                        <label for="journal" class="col-md-4 control-label">Journal</label>

                                        <div class="col-md-6">
                                            <input id="journal" type="text" class="form-control" name="journal" value="">

                                            @if ($errors->has('journal'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('journal') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('reference') ? ' has-error' : '' }}">
                                        <label for="reference" class="col-md-4 control-label">Reference</label>

                                        <div class="col-md-6">
                                            <input id="reference" type="text" class="form-control" name="reference">

                                            @if ($errors->has('reference'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('reference') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('partner') ? ' has-error' : '' }}">
                                        <label for="partner" class="col-md-4 control-label">Partner</label>

                                        <div class="col-md-6">
                                            <input id="partner" type="text" class="form-control" name="partner" value="">

                                            @if ($errors->has('partner'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('partner') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                        <label for="date" class="col-md-4 control-label">Date</label>

                                        <div class="col-md-6">
                                            <input id="date" type="date" class="form-control" name="date_posted" value="{{ \Carbon\Carbon::now()->format('m d Y') }}">
                                            @if ($errors->has('date'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                            </div>


                            <div class='row'>
                                {{--<div class="form-group">--}}
                                {{--<div class="col-xs-offset-8 col-xs-3 ">--}}
                                {{--<button type="button" class="btn btn-primary addButton"><i class="fa fa-plus">Add Item</i></button>--}}
                                {{--<button type="button" class="btn btn-primary delButton"><i class="fa fa-plus">Delete Item</i></button>--}}
                                {{--</div>--}}

                                <div class="col-xs-offset-9 col-xs-2 ">
                                    <button type="button" class="btn btn-primary addButton"><i class="fa fa-plus">Add a new Row</i></button>
                                </div>
                                {{--<div class="col-xs-3">--}}
                                {{--<button type="button" class="btn btn-primary delButton"><i class="fa fa-plus">Delete Item</i></button>--}}
                                {{--</div>--}}


                            </div>
                            {{--</div>--}}


                            <div class='row'>
                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <label for="account[]" class='control-label '>Account</label>
                                    </div>
                                    {{--<div class="col-xs-2">--}}
                                        {{--<label for="jel_partner[]" class='control-label '>Partner</label>--}}
                                    {{--</div>--}}
                                    <div class="col-xs-2">
                                        <label for="jel_label[]" class='control-label '>Label</label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label for="jel_debit[]" class='control-label '>Debit</label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label for="jel_credit[]" class='control-label '>Credit</label>
                                    </div>

                                </div>
                            </div>
                            <div class="row" id="lines">
                                <div class='form-group'>
                                    <div class='col-xs-4 ref'>
                                        {{--{!!Form::text('jel_reference[]',null,['class' => 'form-control'])!!}--}}

                                        <select class="form-control" name="account[]">
                                            @foreach($accounts as $account)
                                                <option value="{{$account->id}}">{{$account->code . "  " . $account->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    {{--<div class='col-xs-2 l1'>--}}
                                        {{--{!!Form::text('jel_partner[]',null,['class' => 'form-control','placeholder' => 'Partner'])!!}--}}
                                    {{--</div>--}}

                                    <div class='col-xs-2 lab'>
                                        {!!Form::text('jel_label[]',null,['class' => 'form-control','placeholder' => 'Label','required' => 'required'])!!}
                                    </div>
                                    <div class='col-xs-2 balance'>
                                        {!!Form::text('jel_debit[]',0.00,['class' => 'form-control','placeholder' => 'Debit'])!!}
                                    </div>
                                    <div class='col-xs-2 balance'>
                                        {!!Form::text('jel_credit[]',0.00,['class' => 'form-control','placeholder' => 'Credit'])!!}
                                    </div>

                                </div>

                                <!--jel stands for journal entry line  -->

                            </div>

                        {{--<div class="col-xs-offset-9 col-xs-2">--}}
                            {{--Total: $<span class="total">0</span>--}}

                        {{--</div>--}}

                            {{-- </div> --}}


                        {{--@if()--}}
                            <div class='row'>
                                <div class="col-xs-12 col-sm-12 col-md-12 alert">
                                    <button type="submit" class="btn btn-primary ">Post</button>
                                </div>
                            </div>
                        {{--@endif--}}


                            {!! Form::close() !!}

                            <div class='form-group hide'  id='template'>
                                <div class='col-xs-4 acc'>

                                    <select class="form-control" name="account[]">
                                        @foreach($accounts as $account)
                                            <option value="{{$account->id}}">{{$account->code . "  " . $account->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                    {{--<div class='col-xs-2 part'>--}}
                                        {{--{!!Form::text('jel_partner[]',null,['class' => 'form-control','placeholder' => 'Partner'])!!}--}}
                                    {{--</div>--}}

                                    <div class='col-xs-2 lab'>
                                        {!!Form::text('jel_label[]',null,['class' => 'form-control','placeholder' => 'Label','required' => 'required'])!!}
                                    </div>
                                    <div class='col-xs-2 balance'>
                                        {!!Form::text('jel_debit[]',0.00,['class' => 'form-control','placeholder' => 'Debit'])!!}
                                    </div>
                                    <div class='col-xs-2 balance'>
                                        {!!Form::text('jel_credit[]',0.00,['class' => 'form-control','placeholder' => 'Credit'])!!}
                                    </div>


                            </div>


                    </div>
                </div></div></div></div>

    <script>

//        $('panel-body').on('blur', 'input.balance', UpdateTotal);
//
//        function UpdateTotal() {
//            var total = 0;
//            var $changeInputs = $('input.balance');
//            $changeInputs.each(function(idx, el) {
//                total += Number($(el).val());
//            });
//
//            $('.total').text(total);
//        }

        $(document).ready(function() {
            jelIndex = 0;

            $('#j_entry')

            $('.addButton').on('click', function() {
                jelIndex++;
                console.log('it entered the function');
                var $template = $('#template'),
                        $clone    = $template.clone().removeClass('hide');
                $('#lines').append($clone);

                console.log('it made the copy');

            });
        });
    </script>

                            {{----------------------------------------------}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-5">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}

                                        {{--<i class="fa fa-btn fa-pencil"></i> POST--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
