@extends('admin.app')
@section('content')

<div class="container m-3">
        <div class="container py-md-5 py-4">
        @if (count($transactions)!=null)
        <table class=" container text-center mt-5" >
            <thead >
            <tr style="background-color:black">
                <td style="color:white">Evènement</td>
                <td style="color:white">Ticket</td>
                <td style="color:white">Prix </td>
                <td style="color:white">Date</td>
                <td style="color:white">status</td>
                <td style="color:white">changer le status</td>
            </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>

                    <td>{{ $transaction->event_name }}</td>
                    <td>{{ $transaction->type_name }}</td>
                    <td>{{ $transaction->price }} FCFA </td>
                    <td>{{ $transaction->created_at }}</td>
                    @if($transaction->status==0)
                        Passée
                    @else
                        Echouée
                    @endif
                    <td>{{ $transaction->created_at }}</td>
                    <td>
                        @if($transaction->status==0)
                        <a href="{{ route('publish_transaction',$transaction->id) }}" class="btn btn-outline-primary">Valider</a></td>
                        @elseif($transaction->status==1)
                        <a href="{{ route('promotor_dashboard') }}" class="btn btn-outline-success">Rejeter</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                </tbody>

        </table>
        @else
        <div class="alert alert-info text-center">Aucune transaction</div>
        @endif
        </div>
</div>

@endsection