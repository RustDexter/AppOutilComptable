<div>
    <p>
        {{isset($data) ? $data : ''}}
    </p>
    <!-- Modal -->
    <form>
        <button style="position: absolute;
    right: 28px;
    top: 9px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#charge">
            Ajouter
        </button>
        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier un utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true close-btn">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col">
                                <label for="nom" class="col-form-label">Nom:</label>
                                <input type="text" id="name" wire:model="name"
                                       class="@error('name') is-invalid @enderror form-control" placeholder="Nom">
                                @error('nom')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>


                            <div class="col">
                                <label for="telephone" class="col-form-label">Téléphone:</label>
                                <input type="text" id="telephone" wire:model="tel"
                                       class="@error('tel') is-invalid @enderror form-control"
                                       placeholder="Téléphone">
                                @error('tel')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="email" id="email" wire:model="email"
                                       class="@error('email') is-invalid @enderror form-control"
                                       placeholder="Email">

                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
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
                                <input type="password" id="password" wire:model="password"
                                       class="@error('password') is-invalid @enderror form-control"
                                       placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="confirmation" class="col-form-label">Confirmation:</label>
                                <input type="password" id="confirmation" wire:model="confirmation"
                                       class="@error('confirmation') is-invalid @enderror form-control"
                                       placeholder="Confirmation">
                                @error('confirmation')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="photo" class="col-form-label">Image:</label>

                                <div class="custom-file">
                                    <input type="file" wire:model="photo" class="@error('photo') is-invalid @enderror custom-file-input" id="photo" required>
                                    <label class="custom-file-label" for="photo">Choose image...</label>
                                    @error('photo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Fermer</button>
                        <button type="button" wire:click.prevent="update()" data-dismiss="modal"
                                class="btn btn-primary close-modal">Enregistre
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
