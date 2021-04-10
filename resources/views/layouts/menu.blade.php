<li class="nav-item w-100">
    <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fe fe-pie-chart fe-16"></i>
        <span class="ml-3 item-text">Tableau de bord</span>
    </a>
</li>
<li class="nav-item w-100">
    <a class="nav-link" href="{{route('dossiers')}}">
        <i class="fe fe-layers fe-16"></i>
        <span class="ml-3 item-text">Dossiers</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('factures')}}" class="nav-link">
        <i class="fe fe-grid fe-16"></i>
        <span class="ml-3 item-text">Factures</span>
    </a>
</li>
<li class="nav-item w-100">
    <a class="nav-link" href="{{route('chat')}}">
        <i class="fe fe-message-circle fe-16"></i>
        <span class="ml-3 item-text">Système de messagerie</span>
    </a>
</li>

@if(auth()->user()->role->nom == 'expert')
    <li class="nav-item w-100">
        <a class="nav-link" href="{{route('utilisateurs')}}">
            <i class="fe fe-users fe-16"></i>
            <span class="ml-3 item-text">Comptables</span>
        </a>
    </li>
@endif
