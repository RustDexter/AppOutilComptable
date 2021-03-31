<div>
    <div class="d-flex justify-content-end">
        <button wire:click.prevent="add" class="btn btn-primary ">Ajouter Dossier</button>
    </div>

        <!-- Modal Delete -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="modalFormDeletePost" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalFormDeletePost">Supprimer Dossier.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body ">
                <h3>Vous etes sur ?</h3>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button wire:click="destroy" class="btn btn-danger">Oui</button>
            </div>

            </div>
        </div>
    </div>


    <!-- Modal Create -->
    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            @if($updateModal)
            <span>Modifier Dossier</span>
            @else
            <span>Ajouter Dossier</span>
            @endif            
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

                <div class="modal-body">
                    @livewire('dossier-form')
                </div>
    </div>
    </div>
    </div>
<!---Table-->


<div>

    <div class="col-md-6">
        @if (count($errors) > 0)
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
    </div>

    <table class="table table-hover" style="margin-top:20px;">

            <tr style="font-weight:bold">
                <td>#NO</td>
                <td>Nom</td>
                <td>Nombre Des Employes</td>
                <td>Capitale</td>
                <td>
                <div >
                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Action
               </div>
               </td>
            </tr>

            @foreach($data as $row)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$row->nom}}</td>
                    <td>{{$row->nbrEmployes}}</td>
                    <td>{{$row->capitale}}</td>
                    <td>
                    <div class="d-flex justify-content-center">
                        <button  wire:click="selectDossier({{ $row->id }}, 'update')" class="btn btn-sm btn-outline-success ">Modifier</button> |
                        <button  wire:click="selectDossier({{ $row->id }}, 'delete')" class="btn btn-sm btn-outline-danger ">Supprimer</button>
                    </div>
                        
                    </td>
                </tr>
            @endforeach

    </table>

</div>

</div>






