<x-app-layout>
    <div class="theme-page padding-bottom-66">
        <div class="clearfix">
            <div class="row page-margin-top">
                <div class="column column-1-1">
                    <div class="row">
                        <h2 class="box-header">BOOK AN APPOINTMENT</h2>
                        <p class="description align-center">We are one of the leading auto repair shops serving customers in Tucson.<br>All mechanic services are performed by highly qualified mechanics.</p>
                    </div>
                </div>
            </div>
            <div class="row page-margin-top contact-form cost-calculator-container">
                <form action="{{ route('store-appointment') }}" id="contact-form" method="POST">
                @csrf
                    <div class="row">
                        <fieldset class="column column-1-3">
                            <div class="cost-calculator-box clearfix">
                                    <label for="vehicle-year">VEHICLE YEAR</label>
                                    <input id="vehicle-year" class="cost-slider-input big" name="reservation_year" type="number" value="2008">
                            </div>
                        </fieldset>
                        <fieldset class="column column-1-3">
                            <div class="cost-calculator-box clearfix">
                                <label for="vehicle-brand">VEHICLE BRAND</label>
                                <select name="reservation_brand" id="vehicle-brand" class="cost-dropdown" required>
                                    <option value="" selected="selected">Choose...</option>
                                    <option value="Volkswagen">Volkswagen</option>
                                    <option value="Audi">Audi</option>
                                    <option value="Skoda">Skoda</option>
                                </select>
                                <input type="hidden" class="vehicle-make">
                            </div>
                        </fieldset>
                        <fieldset class="column column-1-3">
                            <div class="cost-calculator-box clearfix">
                                <label for="vehicle-model">VEHICLE MODEL</label>
                                <input id="vehicle-model" class="cost-slider-input big" name="reservation_model" type="text" placeholder="Vehicle Model" required>
                            </div>
                        </fieldset>
                    </div>
                    <div class="row page-margin-top">
                        <fieldset class="column column-1-3">
                            <div class="cost-calculator-box clearfix">
                                <label>PREFFERED DATE OF APPOINTMENT</label>
                                <div class="datepicker-container">
{{--                                    <span class="ui-icon template-arrow-dropdown"></span>--}}
{{--                                    <input id="appointment-date" class="cost-slider-datepicker big" type="date" name="reservation_date" value="{{ old('reservation_date') }}" placeholder="Preffered Date of Appointment">--}}
                                    <input id="reservation_date" type="date" class="cost-slider-datepicker big form-control @error('reservation_date') is-invalid @enderror" name="reservation_date" value="{{ old('reservation_date') }}" required autofocus>

                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="column column-1-3">
                            <div class="cost-calculator-box clearfix">
                                <label for="vehicle-mileage">VEHICLE MILEAGE</label>
                                <input id="vehicle-mileage" class="cost-slider-input big" name="reservation_mileage" type="number" placeholder="Vehicle Mileage" required>
                            </div>
                        </fieldset>
                        <fieldset class="column column-1-3">
                            <div class="cost-calculator-box clearfix">
                                <label for="vehicle-plate">VEHICLE PLATE NUMBER</label>
                                <input id="vehicle-plate" class="cost-slider-input big" name="reservation_plate_number" type="text" value="{{ old('reservation_plate_number') }}" placeholder="Vehicle Plate Number" required>
                            </div>
                        </fieldset>
                    </div>
                    <div class="row page-margin-top">
                        <fieldset class="column column-1-2">
                            <div class="cost-calculator-box clearfix">
                                <label for="vehicle-vin">VEHICLE VIN NUMBER</label>
                                <input id="vehicle-vin" class="cost-slider-input big" name="reservation_vin_num" type="text" value="{{ old('reservation_vin_num') }}" placeholder="Vehicle VIN Number" required>
                            </div>
                        </fieldset>
                        <fieldset class="column column-1-2">
                            <div class="cost-calculator-box clearfix">
                                <label for="vehicle-type-approval">VEHICLE TYPE APPROVAL</label>
                                <input id="vehicle-type-approval" class="cost-slider-input big" name="reservation_typeApproval" type="text" value="{{ old('reservation_typeApproval') }}" placeholder="Vehicle Type Approval" required>
                            </div>
                        </fieldset>
                    </div>
                    <div class="row page-margin-top">
                        <fieldset class="column column-1-2">
                            <div class="cost-calculator-box page-margin-top clearfix">
                                <label>SELECT SERVICES NEEDED</label>
                                <ul class="checkboxes-list margin-top-20">
                                    <li>
                                        <input type="checkbox" value="Air Conditioning" name="reservation_type[]" id="air-conditioning">
                                        <label for="air-conditioning" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Air Conditioning</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" value="Brakes Repair" name="reservation_type[]" id="brakes-repair">
                                        <label for="brakes-repair" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Brakes Repair</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" value="Engine Diagnostics" name="reservation_type[]" id="engine-diagnostics">
                                        <label for="engine-diagnostics" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Engine Diagnostics</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" value="Heating & Cooling" name="reservation_type[]" id="heating-cooling">
                                        <label for="heating-cooling" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Heating & Cooling</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" value="Oil, Lube & Filters" name="reservation_type[]" id="oil-lube-filters">
                                        <label for="oil-lube-filters" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Oil, Lube & Filters</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" value="Steering & Suspension" name="reservation_type[]" id="steering-suspension">
                                        <label for="steering-suspension" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Steering & Suspension</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" value="Transmission Repair" name="reservation_type[]" id="transmission-repair">
                                        <label for="transmission-repair" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Transmission Repair</label>
                                    </li>
                                    <li>
                                        <input type="checkbox" value="Wheel Alignment" name="reservation_type[]" id="wheel-alignment">
                                        <label for="wheel-alignment" class="checkbox-label template-bullet"><span class="checkbox-box"></span>Wheel Alignment</label>
                                    </li>
                                </ul>
                            </div>
                        </fieldset>
                        <fieldset class="column column-1-2">
                            <div class="cost-calculator-box clearfix">
                                <label for="vehicle-problem">VEHICLE PROBLEM DESCRIPTION</label>
                                <textarea id="vehicle-problem" class="margin-top-20" name="reservation_description" placeholder="Vehicle Problem Description">{{ old('reservation_description') }}</textarea>
                                <button type="submit" class="more" title="SUBMIT NOW">SUBMIT NOW</button>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
