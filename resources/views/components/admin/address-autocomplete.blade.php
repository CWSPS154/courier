@if($noRelation && !$readonly)
    <x-admin.ui.input label="Street Number"
                      type="text"
                      name="street_number_{{ $inputId }}"
                      id="street_number_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Street Number"
                      required :value="$editData->street_number ?? ''"/>
    <x-admin.ui.input label="Street Address"
                      type="text"
                      name="street_address_{{ $inputId }}"
                      id="street_address_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Street Address"
                      required :value="$editData->street_address ?? ''"/>
    <x-admin.ui.input label="Suburb"
                      type="text"
                      name="suburb_{{ $inputId }}"
                      id="suburb_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Suburb"
                      required :value="$editData->suburb ?? ''"/>
    <x-admin.ui.input label="City"
                      type="text"
                      name="city_{{ $inputId }}"
                      id="city_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="City"
                      required :value="$editData->city ?? ''"/>
    <x-admin.ui.input label="State/Region"
                      type="text"
                      name="state_{{ $inputId }}"
                      id="state_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="State/Region"
                      :value="$editData->state ?? ''"/>
    <x-admin.ui.input label="Country"
                      type="text"
                      name="country_{{ $inputId }}"
                      id="country_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Country"
                      required :value="$editData->country ?? ''"/>
    <x-admin.ui.input label="Post Code"
                      type="text"
                      name="zip_{{ $inputId }}"
                      id="zip_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Post Code"
                      required :value="$editData->zip ?? ''"/>
    <input type="hidden" name="place_id_{{ $inputId }}" id="place_id_{{ $inputId }}" required
           value="{{ old('latitude_'.$inputId,$editData->place_id ?? '') }}" class="address_data_{{ $inputId }}">
    <input type="hidden" name="latitude_{{ $inputId }}" id="latitude_{{ $inputId }}" required
           value="{{ old('latitude_'.$inputId,$editData->latitude ?? '') }}" class="address_data_{{ $inputId }}">
    <input type="hidden" name="longitude_{{ $inputId }}" id="longitude_{{ $inputId }}" required
           value="{{ old('longitude_'.$inputId,$editData->longitude ?? '') }}" class="address_data_{{ $inputId }}">
    <input type="hidden" name="location_url_{{ $inputId }}" id="location_url_{{ $inputId }}" required
           value="{{ old('location_url_'.$inputId,$editData->location_url ?? '') }}" class="address_data_{{ $inputId }}">
    <input type="hidden" name="json_response_{{ $inputId }}" id="json_response_{{ $inputId }}" required
           value="{{ old('json_response_'.$inputId,$editData->full_json_response ?? '') }}" class="address_data_{{ $inputId }}">
    <input type="hidden" name="edit_id_{{ $inputId }}" id="edit_id_{{ $inputId }}"
           value="{{ old('edit_id_'.$inputId,$editData->address_book_id ?? '') }}" class="address_data_{{ $inputId }}">
@elseif(!$noRelation && !$readonly)
    <x-admin.ui.input label="Street Number"
                      type="text"
                      name="street_number_{{ $inputId }}"
                      id="street_number_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Street Number"
                      required :value="$editData->$relations->street_number ?? ''"/>
    <x-admin.ui.input label="Street Address"
                      type="text"
                      name="street_address_{{ $inputId }}"
                      id="street_address_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Street Address"
                      required :value="$editData->$relations->street_address ?? ''"/>
    <x-admin.ui.input label="Suburb"
                      type="text"
                      name="suburb_{{ $inputId }}"
                      id="suburb_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Suburb"
                      required :value="$editData->$relations->suburb ?? ''"/>
    <x-admin.ui.input label="City"
                      type="text"
                      name="city_{{ $inputId }}"
                      id="city_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="City"
                      required :value="$editData->$relations->city ?? ''"/>
    <x-admin.ui.input label="State/Region"
                      type="text"
                      name="state_{{ $inputId }}"
                      id="state_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="State/Region"
                      :value="$editData->$relations->state ?? ''"/>
    <x-admin.ui.input label="Country"
                      type="text"
                      name="country_{{ $inputId }}"
                      id="country_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Country"
                      required :value="$editData->$relations->country ?? ''"/>
    <x-admin.ui.input label="Post Code"
                      type="text"
                      name="zip_{{ $inputId }}"
                      id="zip_{{ $inputId }}"
                      add-class="address_data_{{ $inputId }}"
                      placeholder="Post Code"
                      required :value="$editData->$relations->zip ?? ''"/>
    <input type="hidden" name="place_id_{{ $inputId }}" id="place_id_{{ $inputId }}" required
           value="{{ old('latitude_'.$inputId,$editData->$relations->place_id ?? '') }}" address_data_{{ $inputId }}>
    <input type="hidden" name="latitude_{{ $inputId }}" id="latitude_{{ $inputId }}" required
           value="{{ old('latitude_'.$inputId,$editData->$relations->latitude ?? '') }}" address_data_{{ $inputId }}>
    <input type="hidden" name="longitude_{{ $inputId }}" id="longitude_{{ $inputId }}" required
           value="{{ old('longitude_'.$inputId,$editData->$relations->longitude ?? '') }}" address_data_{{ $inputId }}>
    <input type="hidden" name="location_url_{{ $inputId }}" id="location_url_{{ $inputId }}" required
           value="{{ old('location_url_'.$inputId,$editData->$relations->location_url ?? '') }}" address_data_{{ $inputId }}>
    <input type="hidden" name="json_response_{{ $inputId }}" id="json_response_{{ $inputId }}" required
           value="{{ old('json_response_'.$inputId,$editData->$relations->full_json_response ?? '') }}" address_data_{{ $inputId }}>
    <input type="hidden" name="edit_id_{{ $inputId }}" id="edit_id_{{ $inputId }}" required
           value="{{ old('edit_id_'.$inputId,$editData->$relations->address_book_id ?? '') }}" address_data_{{ $inputId }}>
@else
    <x-admin.ui.input label="Street Number"
                      type="text"
                      name="street_number_{{ $inputId }}"
                      id="street_number_{{ $inputId }}"
                      add-class="bg-white"
                      placeholder="Street Number"
                      :value="$editData->$relations->street_number ?? ''" readonly disable/>
    <x-admin.ui.input label="Street Address"
                      type="text"
                      name="street_address_{{ $inputId }}"
                      id="street_address_{{ $inputId }}"
                      add-class="bg-white"
                      placeholder="Street Address"
                      :value="$editData->$relations->street_address ?? ''" readonly/>
    <x-admin.ui.input label="Suburb"
                      type="text"
                      name="suburb_{{ $inputId }}"
                      id="suburb_{{ $inputId }}"
                      add-class="bg-white"
                      placeholder="Suburb"
                      :value="$editData->$relations->suburb ?? ''" readonly/>
    <x-admin.ui.input label="City"
                      type="text"
                      name="city_{{ $inputId }}"
                      id="city_{{ $inputId }}"
                      add-class="bg-white"
                      placeholder="City"
                      :value="$editData->$relations->city ?? ''" readonly/>
    <x-admin.ui.input label="State/Region"
                      type="text"
                      name="state_{{ $inputId }}"
                      id="state_{{ $inputId }}"
                      add-class="bg-white"
                      placeholder="State/Region"
                      :value="$editData->$relations->state ?? ''" readonly/>
    <x-admin.ui.input label="Country"
                      type="text"
                      name="country_{{ $inputId }}"
                      id="country_{{ $inputId }}"
                      add-class="bg-white"
                      placeholder="Country"
                      :value="$editData->$relations->country ?? ''" readonly/>
    <x-admin.ui.input label="Post Code"
                      type="text"
                      name="zip_{{ $inputId }}"
                      id="zip_{{ $inputId }}"
                      add-class="bg-white"
                      placeholder="Post Code"
                      :value="$editData->$relations->zip ?? ''" readonly/>
@endif
@push('scripts')
    @once
        <!-- Google Maps JavaScript library -->
        <script
            src="https://maps.googleapis.com/maps/api/js?{!! config('services.google_api.params') !!}&key={!! config('services.google_api.key') !!}"></script>
    @endonce
    <script>
        $(document).ready(function () {
            var autocomplete_{{ $inputId }};
            autocomplete_{{ $inputId }} = new google.maps.places.Autocomplete((document.getElementById('street_number_{{ $inputId }}')), {
                types: ['address'],
                componentRestrictions: {
                    country: {!! config('services.google_api.countries') !!}
                }
            });
            google.maps.event.addListener(autocomplete_{{ $inputId }}, 'place_changed', function () {
                var near_place = autocomplete_{{ $inputId }}.getPlace();
                $('#street_number_{{ $inputId }}').val('').change();
                $('#street_address_{{ $inputId }}').val('').change();
                $('#suburb_{{ $inputId }}').val('').change();
                $('#city_{{ $inputId }}').val('').change();
                $('#state_{{ $inputId }}').val('').change();
                $('#country_{{ $inputId }}').val('').change();
                $('#zip_{{ $inputId }}').val('').change();
                $('#place_id_{{ $inputId }}').val('').change();
                $('#latitude_{{ $inputId }}').val('').change();
                $('#longitude_{{ $inputId }}').val('').change();
                $('#location_url_{{ $inputId }}').val('').change();
                $('#json_response_{{ $inputId }}').val('').change();
                $.each(near_place.address_components, function (index, address_component) {
                    console.log(address_component);
                    if (address_component.types[0] == "street_number") {
                        $('#street_number_{{ $inputId }}').val(address_component.long_name).change();
                    }
                    if (address_component.types[0] == "route") {
                        $('#street_address_{{ $inputId }}').val(address_component.long_name).change();
                    }
                    if (address_component.types[0] == "administrative_area_level_3" || address_component.types[0] == "neighborhood" || address_component.types[0] == "sublocality_level_1" || address_component.types[0] == "sublocality_level_2") {
                        $('#suburb_{{ $inputId }}').val(address_component.long_name).change();
                    }
                    if (address_component.types[0] == "administrative_area_level_2" || address_component.types[0] == "locality") {
                        $('#city_{{ $inputId }}').val(address_component.long_name).change();
                    }
                    if (address_component.types[0] == "administrative_area_level_1") {
                        $('#state_{{ $inputId }}').val(address_component.long_name).change();
                    }
                    if (address_component.types[0] == "country") {
                        $('#country_{{ $inputId }}').val(address_component.long_name).change();
                    }
                    if (address_component.types[0] == "postal_code") {
                        $('#zip_{{ $inputId }}').val(address_component.long_name).change();
                    }
                });
                $('#place_id_{{ $inputId }}').val(near_place.place_id).change();
                $('#latitude_{{ $inputId }}').val(near_place.geometry.location.lat()).change();
                $('#longitude_{{ $inputId }}').val(near_place.geometry.location.lng()).change();
                $('#location_url_{{ $inputId }}').val(near_place.url).change();
                $('#json_response_{{ $inputId }}').val(JSON.stringify(near_place)).change();
            })
        });
    </script>
@endpush
