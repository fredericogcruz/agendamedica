<x-app-layout>
    <x-slot name="header"></x-slot>
	
    <div class="py-12">
        <div class="p-5">
            <h2>Cadastrar Médico</h2>
            <hr>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-lg-6 p-5">
                <form action="{{ route('medicos.store') }}" method="post" id="frmAgenda" name="frmAgenda" enctype="multipart/form-data">
                	{!! csrf_field() !!}
        			
				   <div class="form-group">
                   	    <label for="nome"><span class="glyphicon glyphicon-user"></span> Nome </label>
                   	    <input type="text" id="nome" name="nome" required class="form-control">
                   </div>

				   <div class="form-group">
                   	    <label for="crm"><span class="glyphicon glyphicon-user"></span> CRM </label>
                   	    <input type="text" id="crm" name="crm" required class="form-control">
                   </div>

				   <div class="form-group">
                   	    <label for="especialidade"><span class="glyphicon glyphicon-user"></span> Especialidade </label>
                   	    <input type="text" id="especialidade" name="especialidade" required class="form-control">
                   </div>

                   
				   <div class="form-group">
                   	    <label for="uf"><span class="glyphicon glyphicon-user"></span> UF </label>
                        <select class="form-control" id="uf" name="uf" required="required">
                        	<option selected>selecione</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                   </div>

                   
                   <button type="submit" class="btn btn-success">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>