<div class="container">

    @if(!$dossier)
        <h1 style="text-align:center;">il n'y a pas de dossier</h1>
    @else
        <div class="card card-body " style="">
            <div>
                <div class="form-group row">
                    <div class="col-2">
                        <h4 style="padding-top:5px;">Dossier :</h4>
                    </div>
                    <div class="col">
                        <select class="form-control" wire:model="dossier_id" wire:change="refresh"><!--wire:change="setDossier($event.target.value)"-->
                            @foreach($dossiers as $value)
                                <option value="{{$value->id}}">{{$value->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>



        </div>



        <div wire:key="Vente">
            @include('livewire.updateVente')
            @include('livewire.addVente')
            <div class="row">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 mb-1">les factures des ventes</h2>
                            <button  style="    position: absolute;
                                right: 28px;
                                top: 9px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#vente">
                                Ajouter
                            </button>

                        </div>
                        <div class="card-body">
                            @if (count($errors) > 0 && 0 == $error_index)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Sorry!</strong> invalid input.<br><br>
                                    <ul style="list-style-type:none;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($ventes)!=0)
                                <table class="table table-hover table-borderless border-v">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Libelle</th>
                                        <th>Description</th>
                                        <th>Prix Ht</th>
                                        <th>Prix Tva</th>
                                        <th>Prix Ttc</th>
                                        <th>Taux Tva</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ventes as $value)
                                        <tr>
                                            <td>{{ $value->libelle }}</td>
                                            <td>{{$value->description}}</td>
                                            <td>{{$value->prixHt}}</td>
                                            <td>{{$value->prixTva}}</td>
                                            <td>{{$value->prixTtc}}</td>
                                            <td>{{$value->tauxTva}}</td>
                                            <td>
                                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button data-toggle="modal" data-target="#Uvente"
                                                            wire:click="editVente({{ $value->id }})" class="dropdown-item">Edit
                                                    </button>
                                                    <button type="button" wire:click="deleteId({{ $value->id }})"
                                                            class="dropdown-item" data-toggle="modal"
                                                            data-target="#venteDelete">Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <div wire:ignore.self class="modal fade" id="venteDelete" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true close-btn">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Voulez-vous vraiment supprimer?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary close-btn"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" wire:click.prevent="deleteVente"
                                                            class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </table>
                            @else
                                Il n'y a pas de factures
                            @endif



                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:key="Charge">
            @include('livewire.updateCharge')
            @include('livewire.addCharge')
            <div class="row">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 mb-1">les factures des charges</h2>
                            <button  style="    position: absolute;
                                right: 28px;
                                top: 9px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#charge">
                                Ajouter
                            </button>
                        </div>
                        <div class="card-body">
                            @if (count($errors) > 0 && 1 == $error_index)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Sorry!</strong> invalid input.<br><br>
                                    <ul style="list-style-type:none;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (count($charges)!=0)
                                <table class="table table-hover table-borderless border-v">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Libelle</th>
                                        <th>Description</th>
                                        <th>Prix Ht</th>
                                        <th>Prix Tva</th>
                                        <th>Prix Ttc</th>
                                        <th>Taux Tva</th>
                                        <th>Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($charges as $value)
                                        <tr>
                                            <td>{{ $value->libelle }}</td>
                                            <td>{{$value->description}}</td>
                                            <td>{{$value->prixHt}}</td>
                                            <td>{{$value->prixTva}}</td>
                                            <td>{{$value->prixTtc}}</td>
                                            <td>{{$value->tauxTva}}</td>
                                            <td>{{$value->type->nom}}</td>

                                            <td>
                                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button data-toggle="modal" data-target="#Ucharge"
                                                            wire:click="editCharge({{ $value->id }})" class="dropdown-item">Edit
                                                    </button>
                                                    <button type="button" wire:click="deleteId({{ $value->id }})"
                                                            class="dropdown-item" data-toggle="modal"
                                                            data-target="#deleteCharge">Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <div wire:ignore.self class="modal fade" id="deleteCharge" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true close-btn">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary close-btn"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" wire:click.prevent="deleteCharge"
                                                            class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </table>
                            @else
                                Il n'y a pas de factures
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div wire:key="Achat">
            @include('livewire.updateAchat')
            @include('livewire.addAchat')
            <div class="row">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 mb-1">Les factures des achats</h2>
                            <button  style="    position: absolute;
                                right: 28px;
                                top: 9px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#achat">
                                Ajouter
                            </button>
                        </div>
                        <div class="card-body">
                            @if (count($errors) > 0 && 2 == $error_index)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Sorry!</strong> invalid input.<br><br>
                                    <ul style="list-style-type:none;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($achats)!=0)
                                <table class="table table-hover table-borderless border-v">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Libelle</th>
                                        <th>Description</th>
                                        <th>Prix Ht</th>
                                        <th>Prix Tva</th>
                                        <th>Prix Ttc</th>
                                        <th>Taux Tva</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($achats as $value)
                                        <tr>
                                            <td>{{ $value->libelle }}</td>
                                            <td>{{$value->description}}</td>
                                            <td>{{$value->prixHt}}</td>
                                            <td>{{$value->prixTva}}</td>
                                            <td>{{$value->prixTtc}}</td>
                                            <td>{{$value->tauxTva}}</td>

                                            <td>
                                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button data-toggle="modal" data-target="#Uachat"
                                                            wire:click="editAchat({{ $value->id }})" class="dropdown-item">Edit
                                                    </button>
                                                    <button type="button" wire:click="deleteId({{ $value->id }})"
                                                            class="dropdown-item" data-toggle="modal"
                                                            data-target="#deleteAchat">Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <div wire:ignore.self class="modal fade" id="deleteAchat" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true close-btn">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary close-btn"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" wire:click.prevent="deleteAchat"
                                                            class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </table>
                            @else
                                Il n'y a pas de factures
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif


</div>
