@extends('layouts.main')@section('main')<div class="row-fluid">  <div class="span3">    <div class="panel panel-success" style="min-height:200px;">      <div class="panel-heading">        <h3 class="panel-title">            Welcome, {{ $sp->firstName }}        </h3>      </div>      <ul class="list-group">          <a id="profilePage" href="{{ URL::to('serviceProviders/' . $sp->id) }}" class="list-group-item active">Profile</a>            <a id="advertiseWSPage" href="advertise" class="list-group-item">Advertise a new workshop</a>            <a id="myWorkshopsPage" href="workshops" class="list-group-item">My workshops</a>            <a id="reviewPage" href="review" class="list-group-item">Review the website</a>            <a id="ClientsPage" href="clients" class="list-group-item">Clients</a>      </ul>    </div>  </div><!--span3-->  <div class="span9">    <div id="step1Form" class="panel panel-success" style="min-height:100px;">      <div class="panel-heading">        <h3 class="panel-title">          Profile<a id="edit" style="float:right;margin-right:30px;cursor:pointer;" onclick="inputChange()">Edit</a>        </h3>                        </div>      {{Former::open($sp)->method('PUT')->route('serviceProviders.update', $sp->id)->class('form-horizontal')}}        <fieldset id="forms" disabled="disabled">          <!-- Form Name -->          <legend></legend>          <!-- Text input-->        {{ Former::text('first_name')->value($sp->first_name)->class('input-large inputHeight form-control')->placeholder('First Name')->required() }}        {{ Former::text('last_name')->value($sp->last_name)->class('input-large inputHeight form-control')->placeholder('Last Name')->required() }}        {{ Former::inline_radios('identity')->value($sp->identity)->radios(array('Individual' =>array( 'name'=>'identity'), 'Company' => array('name'=>'identity')))->check($sp->identity) }}        {{ Former::text('companyName')->value($sp->companyName)->class('input-xlarge inputHeight form-control')->placeholder('Company Name')}}            {{ Former::text('acn')->value($sp->acn)->class('input-medium inputHeight form-control')->placeholder('ACN') }}        {{ Former::text('abn')->value($sp->abn)->class('input-medium inputHeight form-control')->placeholder('ABN') }}        {{-- Former::text('address')->value($sp->address)->class('input-xxlarge inputHeight form-control')->placeholder('Address')->required() --}}        {{ Former::number('phone')->value($sp->phone)->class('input-medium inputHeight form-control')->placeholder('Phone Number')->required() }}        {{ Former::number('mobile')->value($sp->mobile)->class('input-medium inputHeight form-control')->placeholder('Mobile') }}        {{ Former::inline_radios('mode')->radios(array('hourly' =>array( 'name'=>'mode'), 'session' => array('name'=>'mode', 'checked'=>'')))->check($sp->mode) }}         <div class="control-group controls">        {{ Former::submit('Submit')->class('btn btn-success')->id('submit')->style('display:none;') }}        {{ Former::button('Cancel')->class('btn btn-success')->id('cancel')->style('display:none;')->onclick('cancelForm()') }}        </div>         </fieldset>      {{ Former::close()}}    </div>  </div></div><script type="text/javascript">function submitForm() {  document.getElementById("forms").disabled = "disabled";  document.getElementById("submit").style.display = "none";  document.getElementById("cancel").style.display = "none";  document.getElementById("edit").style.display = "";}function cancelForm() {  window.location.reload();}function inputChange() {  document.getElementById("forms").disabled = "";  document.getElementById("submit").style.display = "";  document.getElementById("cancel").style.display = "";  document.getElementById("edit").style.display = "none";}</script>@stop