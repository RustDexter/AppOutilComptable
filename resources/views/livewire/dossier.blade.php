<div>
    @include('livewire.update')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 my-4">
            <h2 class="h4 mb-1">La liste des dossiers</h2>
            @include('livewire.create')
            <div style="    margin-top:21px;" class="card shadow">
                <div class="card-body">
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
                        <table class="table table-hover table-borderless border-v">
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>NbrEmployes</th>
                                <th>Capitale</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->nom }}</td>
                                    <td><span class="badge badge-warning">{{$value->nbrEmployes}}</span></td>
                                    <td><span class="badge badge-success">{{$value->capitale}}</span></td>
                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button data-toggle="modal" data-target="#updateModal"
                                                    wire:click="edit({{ $value->id }})" class="dropdown-item">Edit
                                            </button>
                                            <button type="button" wire:click="deleteId({{ $value->id }})"
                                                    class="dropdown-item" data-toggle="modal"
                                                    data-target="#deleteModel">Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <div wire:ignore.self class="modal fade" id="deleteModel" tabindex="-1" role="dialog"
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
                                            <button type="button" wire:click.prevent="delete()"
                                                    class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
