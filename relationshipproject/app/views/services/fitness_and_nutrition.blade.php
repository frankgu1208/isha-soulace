<h2 class="form-signup-heading">Brief details</h2>
  <p> Please give some brief details about yourself. This helps the expert understand your situation and saves time and cost before actual contact between yourself and the expert.</p>
  <br>
  <ul>
	@foreach($errors->all() as $error)
	  <li>{{ $error }}</li>
		@endforeach
  </ul>
<div id="big-form" class="well auth-box">
{{ Former::horizontal_open()
  ->id('fitnessForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST');
}}
{{ Former::radio('title', 'Title')
    ->radios(array('Mr' => 'title', 'Ms' => 'title', 'Mrs' => 'title', 'Miss' => 'title'))
    ->inline();
}}
{{ Former::text('first_name', 'first name')
	->class('form-control input-xlarge')
    ->placeholder('First Name');
}}
{{ Former::text('last_name', 'Last name')
	->class('form-control input-xlarge')
    ->placeholder('Last Name');
}}
{{ Former::number('age', 'Age')
	->class('form-control input-small')
	->placeholder('25')
	->min('1')
	->max('200');
}}
{{ Former::radio('gender', 'Gender')
    ->radios(array('Male' => 'gender', 'Female' => 'gender'))
    ->inline()
    ->required();
}}
{{ Former::text('address_line_1', 'Address Line 1')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 1');
}}
{{ Former::text('address_line_2', 'Address Line 2')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 2');
}}
{{ Former::text('suburb', 'Suburb')
	->class('form-control input-large')
	->placeholder('Suburb');
}}
{{ Former::number('postcode', 'Postcode')
	->class('form-control input-small')
    ->placeholder('3000')
    ->min('0200')
    ->max('9944')
    ->required();
}}
{{ Former::select('state', 'State')
	->class('form-control input-medium')
	->options(array(''=>'Select a state','ACT'=> 'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA'))
	; 
}}
{{ Former::text('country', 'Country')
	->class('form-control input-large')
	->value('Australia')
	->readonly();
}}
{{ Former::number('weight')
	->class('form-control input-small')
    ->placeholder(' kgs')
    ->min('1')
    ->required();
}}
{{ Former::radio('Height Unit')
	->radios(array(' cm' => array('name' => 'unit', 'checked' => 'checked'), ' feet and inches' => array('name' => 'unit', 'checked' => '')))
	->onchange('change()')
	->inline();
}}
{{ Former::group('Height<sup>*</sup>') }}
<div class="controls">
  <div id='cm_part' style='display:'>
  {{ Former::number('cm')
	->id('cm_form')
	->class('form-control input-medium')
	->min('1')
	->max('300')
	->placeholder('176 cm');
  }}
  </div>
  <div id='feet_and_inches_part' style='display:none'>
  {{ Former::number('feet')
	->id('feet_form')
	->class('form-control input-medium')
	->min('1')
	->max('10')
	->placeholder('5 feet');
  }}
  {{ Former::number('inch')
	->id('inch_form')
	->class('form-control input-medium')
	->min('0')
	->max('11')
	->placeholder('10 inches');
  }}
  </div>
</div>
{{ Former::closeGroup() }}
{{ Former::radio('Fitness Goal')
	->radios(array('Weight loss/gain' => 'goal', 'Recovery from injury' => 'goal', 'Nutrition/Diet' => 'goal', 'Other reason' => 'goal'))
	->inline()
	->required();
}}
{{ Former::textarea('Do you have any injury/illness - e.g. diabetes?')
	->class('form-control')
	->maxlength('2500')
	->required();
}}
{{ Former::actions()
    ->large_primary_submit('Submit');
}}
{{ Former::close(); }}
</div>
<script>
  function change() {
	var radio = document.getElementsByName('unit');
	if (radio[0].checked) {
	  document.getElementById('cm_part').style.display = '';
	  document.getElementById('feet_and_inches_part').style.display = 'none';
	} else if (radio[1].checked) {
	  document.getElementById('cm_part').style.display = 'none';
	  document.getElementById('feet_and_inches_part').style.display = '';
	}
  }
</script>