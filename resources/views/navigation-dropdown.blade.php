<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between h-16">
        <div class="flex">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="collapse navbar-collapse " style="display: inline-block;" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="{{ route('dashboard') }}">Dashboard<span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="/agendamentos">Agendamentos</a>
                        <a class="nav-item nav-link" href="/pacientes">Pacientes</a>
                        <a class="nav-item nav-link" href="/medicos">Médicos</a>
                        <a class="nav-item nav-link" href="/usuarios">Usuários</a>
                    </div>
                    
                    <div class="navbar-nav">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                Sair
                            </x-jet-dropdown-link>
                        </form>
                    </div>
               </div>
            </nav>
        </div>
    </div>
</nav>
