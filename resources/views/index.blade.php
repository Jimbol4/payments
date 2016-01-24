@extends('app')

@section('content')
<h1 class='page-heading'>Where your money goes</h1>

<h4 class='sub-heading'>Payments made by Chichester District Council to individual suppliers with a value over £500 made within October.</h4>

<hr>
<div class="panel-default">
    <div class="panel-body">
        
        {!! Form::open(['METHOD' => 'GET']) !!}
            {!! Form::text('supplier', old('supplier'), ['placeholder' => 'Search suppliers']) !!}
            
            {!! Form::select('rating', [1=>1, 2=>2, 3=>3, 4=>4, 5=>5], old('rating'), ['placeholder' => 'Select pound rating']) !!}
            
            <input type="reset" value="Reset" class='btn btn-default'>
            
           {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!} 
        {!! Form::close() !!}
        
    </div>
</div>

@if (count($payments))
<table class='table table-striped' id='payments'>
    <thead>
    <th>
        Supplier
    </th>
    <th>
        Pound Rating
    </th>
    <th>
        Reference
    </th>
    <th>
        Value
    </th>
</thead>
<tbody>
    @foreach ($payments as $payment)
    <tr>
    <td>{{ $payment->payment_supplier }}</td>
    <td>{!! \App\Payment::displayRating($payment->payment_cost_rating) !!}</td>
    <td>{{ $payment->payment_ref }}</td>
    <td>{{ $payment->payment_amount }}</td>
    </tr>
    @endforeach
</tbody>
</table>
@else
<h3>No payments found.</h3>
@endif


@endsection

@section('footer')
 <script>
$(document).ready(function(){
    $('#payments').DataTable({
        "paging":   true,
        "info": false,
        "aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "iDisplayLength": 5
    });
    
});
 </script>
@endsection