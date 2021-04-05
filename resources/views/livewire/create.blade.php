<button style="    position: absolute;
    right: 28px;
    top: -7px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Ajouter
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un dossier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nom:</label>
                        <input type="text" wire:model="nom" class="form-control"  placeholder="nom">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">NbrEmployes:</label>
                        <input type="number" wire:model="nbrEmployes" class="form-control"  placeholder="nbrEmployes">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Capitale:</label>
                        <input type="number" wire:model="capitale" class="form-control"  placeholder="nbrEmployes">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" data-dismiss="modal" class="btn btn-primary close-modal">Save changes</button>
            </div>
        </div>
    </div>
</div>
