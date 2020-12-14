<x-app-layout>
    <x-slot name="header"></x-slot>
	
    <div class="py-12">
        <div class="p-5">
            <h2>Médicos</h2>
            <hr>
        </div>
        

        <div class="row">
        	<div class="col-lg-10"></div>
        	<a href="/medicos/create">
        		<button type="button" class="btn btn-success">Cadastrar Médico</button>
        	</a>
        </div>
        
        <script type="text/javascript" defer="true">
			setTimeout(function(){


				$(document).ready(function() {
	            	
	                $('#tblMedicos').DataTable( {
                      "processing": true,
                      "serverSide": true,
	              	  "paginate": true,
                	  "scrollY": '40%',
	                  "ajax": "{{route('ajax.medicos.consultar')}}",
                      "columns": [
                          {"data": 'id'},
                          {"data": "nome"},
                          {"data": "especialidade"},
                          {"data": "crm"},
                          {"data": "uf"},
                          {"data":"action", orderable:false, searchable:false}
                      ]
	                } );
	            } );


			}, 50);
        </script>

        
                
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-lg-12 p-5">
                <form id="frmMedicos" name="frmMedicos" method="get">
              	    <div class="row">
              	  		<div class="col-lg-12">
                         	<table id="tblMedicos" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Especialidade</th>
                                        <th>CRM</th>
                                        <th>UF</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                            </table>
              	  		</div>
              	    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-app-layout>