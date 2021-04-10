<div class="container">

    @if(!$users)
        <h1 style="text-align:center;">il n'y a pas d'utilisateurs</h1>
    @else
        <div>

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


            <div class="row">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 mb-1">Les utilisateurs {{isset($selected_id) ? $selected_id : ""}}</h2>
                            @include('livewire.add-user')
                            @include('livewire.update-user')
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-borderless border-v">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td><img width="50" src="{{ asset('storage/' . $value->profile_photo_path) }}"
                                                 alt="{{$value->name}}"></td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->tel}}</td>
                                        <td>
                                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button data-toggle="modal" data-target="#updateModal"
                                                        wire:click="edit({{ $value->id }})" class="dropdown-item">
                                                    Edit
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
