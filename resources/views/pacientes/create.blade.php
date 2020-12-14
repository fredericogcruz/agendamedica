<x-app-layout>
    <x-slot name="header"></x-slot>
	
    <div class="py-12">
        <div class="p-5">
            <h2>Cadastrar Paciente</h2>
            <hr>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-lg-6 p-5">
                <form action="{{ route('pacientes.store') }}" method="post" id="frmAgenda" name="frmAgenda" enctype="multipart/form-data">
                	{!! csrf_field() !!}
        			
				   <div class="form-group">
                   	    <label for="nome"><span class="glyphicon glyphicon-user"></span> Nome </label>
                   	    <input type="text" id="nome" name="nome" required class="form-control">
                   </div>

				   <div class="form-group">
                   	    <label for="sexo"><span class="glyphicon glyphicon-user"></span> Sexo </label>
                        <select class="form-control" id="sexo" name="sexo" required="required">
                        	<option selected>selecione</option>
                        	<option value="M">Masculino</option>
                        	<option value="F">Feminino</option>
                        </select>
                   </div>

				   <div class="form-group">
                   	    <label for="rg"><span class="glyphicon glyphicon-user"></span> RG</label>
                   	    <input type="text" id="rg" name="rg" required class="form-control">
                   </div>

				   <div class="form-group">
                   	    <label for="idade"><span class="glyphicon glyphicon-user"></span> Idade </label>
                   	    <input type="text" id="idade" name="idade" required class="form-control">
                   </div>
                   
                   
                   <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>