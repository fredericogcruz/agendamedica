<x-app-layout>
    <x-slot name="header">

    </x-slot>
	
    <div class="py-12">
        <div class="p-5">
            <h2>Usuários</h2>
            <hr>
        </div>

        
        <div class="row">
        	<div class="col-lg-10"></div>
        	<a href="/usuarios/create">
        		<button type="button" class="btn btn-success">Cadastrar Usuário</button>
        	</a>
        </div>
        
        
        <script type="text/javascript" defer="true">
			setTimeout(function(){


				$(document).ready(function() {
	            	
	                $('#tblUsuarios').DataTable( {
                      "processing": true,
                      "serverSide": true,
	              	  "paginate": true,
                	  "scrollY": '40%',
	                  "ajax": "{{ route('ajax.usuarios.consultar') }}",
                      "columns": [
                          { "data": 'id'},
                          {"data": "name"},
                          {"data": "email"},
                          {"data":"action",orderable:false,searchable:false}
                      ]
	                } );
	                
	            } );


			}, 50);
        </script>

        
                
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-lg-12 p-5">
                <form id="frmUsuarios" name="frmUsuarios" method="get">
                  	  <div class="row">
                  	  		<div class="col-lg-12">
                             	<table id="tblUsuarios" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                 
                                    </tbody>
                                </table>
                  	  		</div>
                  	  </div>
              	  
                </form>
            </div>
        </div>
    </div>
    
    
</x-app-layout>