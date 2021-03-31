<div>
    <div class="form-group">
        <label for="exampleInputPassword1">Entrer nom</label>
        
        <input type="text" wire:model="nom" class="form-control input-sm @error('nom') is-invalid @enderror"  placeholder="Entrer Nom">
        @error('nom')
        <div class="invalid-feedback">
        Veuillez fournir un nom valide.
      </div>
      @enderror
    </div>
    <div class="form-group">
        <label>Entrer Nombre des Employes</label>
        <input type="number" class="form-control input-sm @error('nbrEmployes') is-invalid @enderror" placeholder="Entrer Nombre des Employes" wire:model="nbrEmployes">
        @error('nom')
        <div class="invalid-feedback">
        Veuillez fournir un nombre valide.
      </div>
      @enderror
    </div>
    <div class="form-group">
        <label>Entrer capitale</label>
        <input type="number" class="form-control input-sm @error('capitale') is-invalid @enderror" placeholder="Enter Capitale" wire:model="capitale">
        @error('capitale')
        <div class="invalid-feedback">
        Veuillez fournir un capitale valide.
      </div>
      @enderror
    </div>
    <div class="d-flex justify-content-center">
        <button wire:click="store()" class="btn btn-primary">Save</button>
    </div>
    
</div>
