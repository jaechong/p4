<div class='details'>* Required fields</div>

<label for='name'>* Customer Name</label>
<input type='text' name='name' id='name' value='{{ old('name', $order->name) }}'>
@include('modules.error-field', ['field' => 'name'])

<label for='plate_id'>* Plate</label>
<select name='plate_id' id='plate_id'>
    <option value=''>Choose one...</option>
    @foreach($platesForDropdown as $id => $plateName)
        <option value='{{ $id }}' {{ ($order->plate_id == $id) ? 'selected' : '' }}>{{ $plateName }}</option>
    @endforeach
</select>
@include('modules.error-field', ['field' => 'plate_id'])

<label>Drinks</label>
@foreach($drinksForCheckboxes as $drinkId => $drinkName)
    <ul class='drinks'>
        <li>
            <label>
                <input
                        {{ (in_array($drinkId, $drinks)) ? 'checked' : '' }}
                        type='checkbox'
                        name='drinks[]'
                        value='{{ $drinkId }}'>
                {{ $drinkName }}
            </label>
        </li>
    </ul>
@endforeach