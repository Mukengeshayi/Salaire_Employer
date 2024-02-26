@extends('layouts.template')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Paiements</h1>
                </div>
                <div class="col-auto">
                    <div class="page-utilities">
                        <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">
                                @if ($isPaymentDay)
                                    <a class="btn app-btn-secondary" href="{{route('payment.init')}}">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                        </svg>
                                        Lancer Paiement
                                    </a>
                                @endif
                            </div>
                        </div><!--//row-->
                    </div><!--//table-utilities-->
                </div><!--//col-auto-->
            </div><!--//row-->
            @if (!$isPaymentDay)
                <div class="alert alert-danger ">Vous pouvez effectuer le paiement qu'à la date de paiement</div>
            @endif
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">Reference</th>
                                            <th class="cell">Employer</th>
                                            <th class="cell">Montant Payé</th>
                                            <th class="cell">Date de transaction</th>
                                            <th class="cell">Mois</th>
                                            <th class="cell">Année</th>
                                            <th class="cell">Statut</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($payments as $payment)
                                            <tr>
                                                <td class="cell"><span class="truncate"></span>{{$payment->reference}} </td>
                                                <td class="cell"><span class="truncate"></span>{{$payment->employer_id}} </td>
                                                <td class="cell"><span class="truncate"></span>{{$payment->amount}} </td>
                                                <td class="cell"><span class="truncate"></span>{{$payment->name}} </td>
                                                <td class="cell"><span class="truncate"></span>{{$payment->name}} </td>
                                                <td class="cell"><span class="truncate"></span>{{$payment->name}} </td>
                                                <td class="cell"><span class="truncate"></span>{{$payment->status}} </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="cell" colspan="8" style="text-align: center; padding:3rem">Aucune transaction efffectuée</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                    <nav class="app-pagination">
                        {{ $payments->links() }}
                    </nav><!--//app-pagination-->

                </div><!--//tab-pane-->
            </div><!--//tab-content-->
        </div><!--//container-fluid-->
    @endsection

