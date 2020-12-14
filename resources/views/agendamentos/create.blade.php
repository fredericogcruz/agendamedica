<x-app-layout>
    <x-slot name="header"></x-slot>
	
    <div class="py-12">
        <div class="p-5">
            <h2>Agendar Consulta</h2>
            <hr>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="col-lg-6 p-5">
                <form action="{{ route('agendamentos.store') }}" method="post" id="frmAgenda" name="frmAgenda"  enctype="multipart/form-data">
                	{!! csrf_field() !!}
                	
					<div class="form-group">
                   	    <label for="medico"><span class="glyphicon glyphicon-user"></span> Médico </label>
                        <select class="form-control" id="medico_id" name="medico_id"  required="required">
                        	<option>selecione</option>
                        	@foreach($coMedicos as $medico)
                        		<option value="{{$medico->id}}">{{$medico->nome}} - CRM {{$medico->crm}} - {{$medico->especialidade}}</option>
                        	@endforeach
                        </select>
                   </div>
                   
					<div class="form-group">
                   	    <label for="paciente"><span class="glyphicon glyphicon-user"></span> Paciente </label>
                        <select class="form-control" id="paciente_id" name=paciente_id required="required">
                        	<option>selecione</option>
                        	@foreach($coPacientes as $paciente)
                        		<option value="{{$paciente->id}}">{{$paciente->nome}}</option>
                        	@endforeach
                        </select>
                   </div>
                   
				   <div class="form-group">
                   	    <label for="paciente"><span class="glyphicon glyphicon-user"></span> Data do atendimento </label>
                   	    <input type="date" id="data" name="data" value="{{date('Y-m-d')}}">
                        <input type="time" id="hora" name="hora" min="09:00" max="18:00" required>
                   </div>
                   
                   <button type="submit" class="btn btn-success">Agendar</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>