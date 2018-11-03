@extends('layouts.main')

@section('title') Checkout @endsection

@section('styles')

@endsection

@section('contents')

    <h1>Checkout</h1>

    <form action="{{ SELF }}?contract_id={{ $contract->id }}" method="post" class="default-form border">


        @if(isset($errorMsg) && !empty($errorMsg))

            <div class="alert alert-danger" role="alert">
                {!! $errorMsg !!}
            </div>

        @endif

        <h4>Payment Details</h4>

            <table class="data-wrapper my-3">
                <tr>
                    <td>Amount</td>
                    <td class="data-label">SDG {{ number_format($contract->proposal->price, 2) }}</td>
                </tr>
                <tr>
                    <td>Beneficiary</td>
                    <td class="data-label">{{ $contract->proposal->freelancer->firstname }} {{ $contract->proposal->freelancer->lastname }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td class="data-label">Payment for the contract No.: {{ $contract->id }}</td>
                </tr>
            </table>

        {!! csrf_field() !!}

        <input type="hidden" name="amount" value="{{ $contract->proposal->price }}">

        <button type="submit" name="btnPay" value="Pay" class="btn btn-success btn-lg btn-block">Confirm Payment?</button>

    </form>
    
@endsection

@section('scripts')

@endsection