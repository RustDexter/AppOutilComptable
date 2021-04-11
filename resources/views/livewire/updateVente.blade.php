<div wire:ignore.self class="modal fade" id="Uvente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">edit dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
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
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">	Prix Ht:</label>
                        <input type="number" wire:model="prixHt" class="form-control"  placeholder="prix Ht">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">	Prix tva:</label>
                        <input type="number" wire:model="prixTva" class="form-control"  placeholder="prix tva">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">	Prix ttc:</label>
                        <input type="number" wire:model="prixTtc" class="form-control"  placeholder="prix ttc">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">	Taux tva:</label>
                        <input type="number" wire:model="tauxTva" class="form-control"  placeholder="taux tva">
                    </div>
                    <div class="row">
                            <div class="col">
                                <label for="photo" class="col-form-label">Facture:</label>

                                <div class="custom-file">
                                    <input type="file" wire:model="file" class="custom-file-input" required>
                                    <label class="custom-file-label">choisissez un fichier...</label>
                                </div>
                            </div>
                            
                    </div>
                    <div wire:loading wire:target="file">Uploading...</div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="updateVente" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
