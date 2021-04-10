<div class="container">

    @if(!$users)
        <h1 style="text-align:center;">il n'y a pas d'utilisateurs</h1>
    @else
        <div>
            @include('livewire.updateVente')
            <div class="row">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 mb-1">Les utilisateurs</h2>
                            @include('livewire.add-user')
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-borderless border-v">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
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
                                        <td>{{ $value->name }}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->tel}}</td>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
