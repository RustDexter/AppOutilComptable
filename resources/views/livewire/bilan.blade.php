@extends('layouts.layout')
@section('content')
    <div>
        <!-- Container -->
        <div class="container-fluid invoice-container">
            <!-- Header -->
            <header>
                <div class="row align-items-center">
                    <div class="col-sm-7 text-center text-sm-left mb-3 mb-sm-0">
                        <img id="logo" src="{{  asset($data[0]->logo) }}" title="Invoice" alt="Invoice">
                    </div>
                    <div class="col-sm-5 text-center text-sm-right">
                        <h4 class="centre mb-0">{{  $data[0]->nom }}</h4>
                    </div>
                </div>
                <hr>
            </header>

            <!-- Main Content -->
            <main style="margin-top: 100px">
                <div class="row">
                    <div class="col-sm-6"><strong>Date:</strong>
                        {{Carbon\Carbon::now()->toDateTimeString()}}</div>
                    <div class="col-sm-6 text-sm-right"><strong>Invoice No:</strong> 16835{{$user->id}}</div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 text-sm-right order-sm-1"><strong>Comptable :</strong>
                        <address>
                            {{ $user->name }}<br>
                            Oulfa nr 8,Casablanca<br>
                            {{ $user->email }}<br>
                            0534789098

                        </address>
                    </div>
                    <div class="col-sm-6 order-sm-0"><strong>Societe :</strong>
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
                                <tr>
                                    <td class="col-3 border-0"><strong>Actif</strong></td>
                                </tr>
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
                                <tr>
                                    <td class="col-3 border-0"><strong>Passif</strong></td>
                                </tr>
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
                <div class="btn-group btn-group-sm d-print-none"><a href="javascript:window.print()"
                                                                    class="btn btn-light border text-black-50 shadow-none"><i
                            class="fa fa-print"></i> Imprimer</a>
                </div>
            </footer>
        </div>

    </div>
@endsection
