
	<h2 class="form-signup-heading">Brief details</h2>
	<p> Give some brief details about yourself so the expert can understand your situation. This saves time and cost before actual contact between yourself and the expert.</p>

	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>

{{ Former::open()
  ->id('mentalWellbeingForm')
  ->secure()
  ->rules(['postcode' => 'required'])
  ->method('POST');
}}
{{ Former::radio('title')
    ->radios(array('Mr' => 'title', 'Ms' => 'title', 'Mrs' => 'title', 'Miss' => 'title'))
    ->inline();
}}
{{ Former::text('first name')
	->class('form-control input-xlarge')
    ->placeholder('First Name');
}}
{{ Former::text('last name')
	->class('form-control input-xlarge')
    ->placeholder('Last Name');
}}
{{ Former::number('age')
	->class('form-control input-small')
    ->placeholder('25')
    ->min(1)
    ->max(300)
	->required();
}}
{{ Former::radio('gender')
    ->radios(array('M' => 'gender', 'F' => 'gender'))
    ->inline()
    ->required();
}}
{{ Former::text('Address Line 1')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 1');
}}
{{ Former::text('Address Line 2')
	->class('form-control input-xxlarge')
	->placeholder('Address Line 2');
}}
{{ Former::text('Suburb')
	->class('form-control input-large')
	->placeholder('Suburb');
}}
{{ Former::number('postcode')
	->class('form-control input-small')
    ->placeholder('3000')
    ->min('0200')
    ->max('9944')
    ->required();
}}
{{ Former::text('Country')
	->class('form-control input-large')
	->placeholder('Country');
}}
{{ Former::number('weight')
	->class('form-control input-small')
    ->placeholder('kgs')
    ->required();
}}
{{ Former::radio('Type of service')
    ->radios(array('Meditation' => 'service', 'Marriage Counselling' => 'service', 'Domestic Violence Counselling' => 'service', 'Anxiety' => 'service', 'Stress' => 'service'))
    ->inline()
    ->required();
}}
{{ Former::actions()
    ->large_primary_submit('Submit')
    ->large_inverse_reset('Reset');
}}
{{ Former::close(); }}