@extends('layouts.layout')
@section('content')
    <div style="border: 1px solid red">
        <!-- Container -->
        <div class="container-fluid invoice-container">
            <!-- Header -->
            <header>
                <div class="row align-items-center">
                    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
                        <img id="logo" src="{{  $data[0]->logo }}" title="Invoice" alt="Invoice">
                    </div>
                    <div class="col-sm-5 text-center text-sm-right">
                        <h4 class="centre mb-0">{{  $data[0]->nom }}</h4>
                    </div>
                </div>
                <hr>
            </header>

            <!-- Main Content -->
            <main>
                <div class="row">
                    <div class="col-sm-6"><strong>Date:</strong>
                        {{Carbon\Carbon::now()->toDateTimeString()}}</div>
                    <div class="col-sm-6 text-sm-right"> <strong>Invoice No:</strong> 16835{{$user->id}}</div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 text-sm-right order-sm-1"> <strong>Comptable :</strong>
                        <address>
                            {{ $user->name }}<br>
                            Oulfa nr 8,Casablanca<br>
                            {{ $user->email }}<br>
                            0534789098

                        </address>
                    </div>
                    <div class="col-sm-6 order-sm-0"> <strong>Societe :</strong>
                        <address>
                            {{ $data[0]->nom }}<br>
                            15 Belveder, Anfa Casablance<br>
                            HP12 3JL<br>
                            0546893245
                        </address>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="card-header">
                                <tr><td class="col-3 border-0"><strong>Actif</strong></td></tr>
                                <tr>
                                    <td class="col-3 border-0"><strong>libelle</strong></td>
                                    <td class="col-4 border-0 class='text-right' "><strong>Prix Unitaire</strong></td>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data[1] as $value)
                                    <tr>
                                        <td class="col-3 border-0">{{ $value->libelle  }}</td>
                                        <td class="col-4 text-1 border-0">{{ $value->prixHt . 'Dhs'}}</td>
                                    </tr>
                                @endforeach
                                @foreach($data[2] as $value)
                                    <tr>
                                        <td class="col-3 border-0">{{ $value->libelle }}</td>
                                        <td class="col-4 text-1 border-0">{{ $value->prixHt . 'Dhs'}}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <!--tab2 -->
                                <thead class="card-header">
                                <tr><td class="col-3 border-0"><strong>Passif</strong></td></tr>
                                <tr>
                                    <td class="col-3 border-0"><strong>libelle</strong></td>
                                    <td class="col-4 border-0 class='text-right' "><strong>Prix Unitaire</strong></td>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($data[3] as $value)
                                    <tr>
                                        <td class="col-3 border-0">{{ $value->libelle  . 'Dhs'}}</td>
                                        <td class="col-4 text-1 border-0">{{ $value->prixHt . 'Dhs'}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot class="card-footer">
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Sub Total:</strong></td>
                                    <td class="text-right">{{$prHt . 'Dhs'}} </td>
                                </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer -->
            <footer class="text-center mt-4">
                <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
                <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print</a> <a href="http://demo.harnishdesign.net/html/koice/index.html" class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-download"></i> Download</a> </div>
            </footer>
        </div>

    </div>
@endsection
