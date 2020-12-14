<x-app-layout>
    <x-slot name="header">
	
    </x-slot>
	
    <div class="py-12">
        <div class="p-5">
            <h2>Agenda</h2>
            <hr>
        </div>
        
        <div class="row">
        	<div class="col-10"></div>
        	<a href="/agendamentos/create">
        		<button type="button" class="btn btn-success">Agendar Consulta</button>
        	</a>
        </div>
        
        
        <script type="text/javascript" defer="true">
			setTimeout(function(){

				$(document).ready(function() {
	                $('#tblAgendamentos').DataTable( {
                      "processing": true,
                      "serverSide": true,
	              	  "paginate": true,
                	  "scrollY": '40%',
	                  "ajax": "{{route('ajax.agendamentos.consultar')}}",
                      "columns": [
                          {"data": "dt_agendamento"},
                          {"data": "nomePaciente"},
                          {"data": "nomeMedico"},
                          {"data": "action", orderable:false, searchable:false}
                      ]
	                } );
	            } );
	            
			}, 500);
        </script>

                
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-lg-12 p-5">
                <form id="frmAgenda" name="frmAgenda" method="get">
                  	  <div class="row">
                  	  		<div class="col-lg-12">
                             	<table id="tblAgendamentos" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Dt.Agendamento</th>
                                            <th>Paciente</th>
                                            <th>Médico</th>
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