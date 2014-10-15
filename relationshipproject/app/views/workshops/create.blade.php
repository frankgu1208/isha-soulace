@extends ('serviceProviders.serviceProviders')@section('content')<link rel="stylesheet" type="text/css" media="screen"href="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">{{ HTML::script('js/plugins/dataTables/jquery.js') }}{{ HTML::style('css/plugins/dataTables.bootstrap.css') }}<script>$('.list-group-item').removeClass('active');$('#myWorkshopsPage').addClass('active');</script><div class="panel-heading">    <h3 class="panel-title">        Create Workshop    </h3>                  </div><ul>    @foreach($errors->all() as $error)    <li style="color:red; margin-left: 50px;">{{ $error }}</li>    @endforeach</ul><div class="panel-body">    <div class="" style="padding:10px;">        {{ Former::open()->route('workshops.store') }}        {{ Former::text('topic')->label('Topic')->class('input-large inputHeight form-control') }}        {{ Former::select('type')->class('input-large inputHeight form-control')->placeholder('Workshop type')->options($workshop_types)->required() }}        {{ Former::text('unit')->label('Unit')->class('input-large inputHeight form-control') }}        {{ Former::text('street_number')->label('Street Number')->class('input-large inputHeight form-control') }}        {{ Former::text('street_name')->label('Street Name')->class('input-large inputHeight form-control') }}        {{ Former::text('street_type')->label('Street Type')->class('input-large inputHeight form-control') }}        {{ Former::text('suburb')->label('Suburb/City')->class('input-large inputHeight form-control') }}        {{ Former::text('state')->label('State')->class('input-large inputHeight form-control') }}        {{ Former::number('postcode')->label('Postcode')->class('input-medium inputHeight form-control') }}        {{ Former::textarea( 'description' )->label('Description')->class('input-xxlarge inputHeight form-control')->column(4) }}        <div id="datetimepicker" class="input-append date datepicker">            {{ Former::text('date')->class('form-control')            ->label('Date')            ->placeholder(' yyyy-mm-dd')        }}    </div>    <div id="start_timepicker" class="input-append date timepicker">        {{ Former::text('start_time')->class('form-control')        ->label('Start Time')        ->placeholder(' hh:mm')    }}</div><div id="end_timepicker" class="input-append date timepicker">    {{ Former::text('end_time')->class('form-control')    ->label('End Time')    ->placeholder(' hh:mm')}}</div>{{ Former::text('total_ticket_number')->label('Total Ticket Number')->class('input-large inputHeight form-control') }}   {{ Former::text('price')->label('Price')->class('input-large inputHeight form-control') }}   {{ Former::inline_radios('food')->label('Food/Drinks Provided')->radios(array('no' =>array( 'name'=>'food','checked'=>'checked'), 'yes' => array('name'=>'food', 'checked'=>''))) }}<div class="controls control-group form-group" >    {{ Former::submit('Create')->class('btn btn-small btn-success') }}    <a class="" href="{{ URL::to('/myworkshops/') }}">Cancel</a></div>{{ Former::close() }}</div></div><script type="text/javascript"src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> <script type="text/javascript" src="http://eonasdan.github.io/bootstrap-datetimepicker/scripts/moment.js"></script><script type="text/javascript"src="http://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script><script type="text/javascript">$('#datetimepicker').datetimepicker({    format: 'YYYY-MM-DD',    pickTime: false,    pickDate: true,    language: 'en',    showToday: true,    minDate: new Date()});$('.timepicker').datetimepicker({    format: 'HH:mm',    pickTime: true,    pickDate: false,    pickSeconds: false,    language: 'en'});</script>@stop