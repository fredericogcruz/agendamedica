<x-app-layout>
    <x-slot name="header"></x-slot>
	
    <div class="py-12">
        <div class="p-5">
            <h2>Cadastrar Usuário</h2>
            <hr>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-lg-6 p-5">
                <form action="{{ route('usuarios.store') }}" method="post" id="frmAgenda" name="frmAgenda" enctype="multipart/form-data">
                	{!! csrf_field() !!}
        			
				   <div class="form-group">
                   	    <label for="name"><span class="glyphicon glyphicon-user"></span> Nome </label>
                   	    <input type="text" id="name" name="name" required class="form-control">
                   </div>

				   <div class="form-group">
                   	    <label for="email"><span class="glyphicon glyphicon-user"></span> E-mail</label>
                   	    <input type="text" id="email" name="email" required class="form-control">
                   </div>

				   <div class="form-group">
                   	    <label for="password"><span class="glyphicon glyphicon-user"></span> Senha</label>
                   	    <input type="password" id="password" name="password" required class="form-control">
                   </div>		   
                   
                   <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>