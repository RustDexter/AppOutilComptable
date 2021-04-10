<div>
    <p>
        {{isset($data) ? $data : ''}}
    </p>
    <!-- Modal -->
    <form wire:submit.prevent="addUser">
        <button style="position: absolute;
    right: 28px;
    top: 9px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#charge">
            Ajouter
        </button>
        <div wire:ignore.self class="modal fade" id="charge" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col">
                                <label for="nom" class="col-form-label">Nom:</label>
                                <input type="text" id="nom" wire:model="nom" class="form-control" placeholder="Nom">
                            </div>


                            <div class="col">
                                <label for="telephone" class="col-form-label">Téléphone:</label>
                                <input type="text" id="telephone" wire:model="tel" class="form-control"
                                       placeholder="Téléphone">
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" id="email" wire:model="email" class="form-control"
                                       placeholder="Email">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col">
                                <label for="adresse" class="col-form-label">Adresse:</label>
                                <textarea id="adresse" wire:model="adresse" class="form-control"
                                          placeholder="Adresse"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="password" class="col-form-label">Mot de passe:</label>
                                <input type="password" id="password" wire:model="password" class="form-control"
                                       placeholder="Password">
                            </div>

                            <div class="col">
                                <label for="confirmation" class="col-form-label">Confirmation:</label>
                                <input type="password" id="confirmation" wire:model="confirmation" class="form-control"
                                       placeholder="Confirmation">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">fermer</button>
                        <button type="submit" wire:click="addUser" data-dismiss="modal"
                                class="btn btn-primary close-modal">Enregistre
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
