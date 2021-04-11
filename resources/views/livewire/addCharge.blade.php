
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="charge" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une charge</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">libelle:</label>
                            <input type="text" wire:model="libelle" class="form-control"  placeholder="libelle">
                        </div>

                        <div class="col">
                            <label for="recipient-name" class="col-form-label">description:</label>
                            <input type="text" wire:model="description" class="form-control"  placeholder="description">
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">	Prix Ht:</label>
                            <input type="number" wire:model="prixHt" class="form-control"  placeholder="prix Ht">
                        </div>

                        <div class="col">
                            <label for="recipient-name" class="col-form-label">	Prix tva:</label>
                            <input type="number" wire:model="prixTva" class="form-control"  placeholder="prix tva">
                        </div>

                    </div>


                    <div class="form-group row">
                        <div class="col">
                            <label for="recipient-name" class="col-form-label">	Prix ttc:</label>
                            <input type="number" wire:model="prixTtc" class="form-control"  placeholder="prix ttc">
                        </div>

                        <div class="col">
                            <label for="recipient-name" class="col-form-label">	Taux tva:</label>
                            <input type="number" wire:model="tauxTva" class="form-control"  placeholder="taux tva">
                        </div>

                    </div>

                    <div class="form-group" >
                        <label  class="col-form-label">	Taux tva:</label>
                        <select class="form-control" wire:model="type_id">
                            @foreach($types as $value)
                                <option value="{{$value->id}}">{{$value->nom}}</option>
                            @endforeach
                        </select>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">fermer</button>
                <button type="button" wire:click.prevent="addCharge" data-dismiss="modal" class="btn btn-primary close-modal">Enregistre</button>
            </div>
        </div>
    </div>
</div>
