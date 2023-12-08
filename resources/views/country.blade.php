    @extends('company.layout.app')
    @section('content')
        <section>
            <div class="w-full rounded-t-2xl bg-gray-400 text-gray-200 font-semibold text-3xl px-4 flex justify-between">
                <div>
                    Profile Details
                </div>
                <div class="w-2/12 md:w-auto">
                    <a href="{{ url()->previous() }}"><img src="{{ asset('images/front/back.png') }}" alt="icon"
                            class="w-full"></a>


                </div>
            </div>
            <form action="{{ route('profile_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <div class="relative mb-48 ">
                        <div class="relative ">
                            <div class="w-full h-['60px']">
                                <img src="{{ asset('storage/company/Images/' . $company->banner ?? '') }}" alt=""
                                    class="w-full object-cover">
                            </div>
                            <div
                                class="absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2 border-2 border-red-500/70 w-56 h-56  mx-auto rounded-full">
                                <img src="{{ asset('storage/company/Images/' . $company->logo) }}" alt=""
                                    class="w-full rounded-full">
                                <p class="text-3xl font-bold text-gray-500 text-center">{{ $company->name }}</p>
                            </div>
                        </div>
                    </div>




                    <div class="w-5/6 mx-auto elevation-10 bg-gray-300 p-5 rounded-b-2xl">

                        <div class="md:flex justify-between items-center">
                            <div class="md:w-3/6 md:mx-2">
                                <label for="name" class="text-2xl block text-gray-400">Name </label>
                                <input type="text" name="name" id="name" value="{{ $company->name }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400" readonly>
                            </div>

                            <div class="md:w-3/6 md:mx-2">
                                <label for="email" class="text-2xl block text-gray-400">Email </label>
                                <input type="email" name="email" id="email" value="{{ $company->email }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400" readonly>
                            </div>
                        </div>
                        <div class="md:flex justify-between items-center">
                            <div class="md:w-3/6 md:mx-2">
                                <label for="phone" class="text-2xl block text-gray-400">Phone </label>
                                <input type="tel" name="phone" id="phone" value="{{ $company->phone }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400" readonly>
                            </div>

                            <div class="md:w-3/6 md:mx-2">
                                <label for="website" class="text-2xl block text-gray-400">Website </label>
                                <input type="url" name="website" id="website" value="{{ $company->website }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400" readonly>
                            </div>
                        </div>


                        <div class="md:flex justify-between items-center">
                            <div class="md:w-3/6 md:mx-2">
                                <label for="address" class="text-2xl block text-gray-400">Address </label>
                                <input type="text" name="address" id="address" value="{{ $company->address }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                            </div>

                            <div class="md:w-3/6 md:mx-2">

                                <label for="countryDropdown" class="text-2xl block text-gray-400">Select a country:</label>
                                <select id="countryDropdown" name="countryCode"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                                    @php

                                        if (!$company->country) {
                                            echo '<option value="">Select a country</option>';
                                        } else {
                                            echo '<option value="{{ $company->country }}">' . $company->country . '</option>';
                                        }

                                    @endphp


                                    @foreach ($countries as $countryData)
                                        <option value="{{ $countryData['iso2'] }}">{{ $countryData['name'] }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="md:flex justify-between items-center">
                            <div class="md:w-3/6 md:mx-2">
                                <label for="stateDropdown" class="text-2xl block text-gray-400">Select a state:</label>
                                <select id="stateDropdown" name="state" class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                                    <option value="">Select a state</option>
                                </select>
                            </div>

                            <div class="md:w-3/6 md:mx-2">
                                <label for="cityDropdown" class="text-2xl block text-gray-400">Select a city:</label>
                                <select id="cityDropdown" name="city" class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                                    <option value="">Select a city</option>
                                </select>
                            </div>
                        </div>
                        <div id="spinner" style="display: none;">
                            <!-- Add your spinner image or animated GIF here -->
                            Loading...
                        </div>

                       <div>
                            <label for="description" class="text-2xl block text-gray-400">Description </label>
                            <textarea type="text" name="description" id="description"
                                class="w-full border-b-4 border-gray-400 rounded text-gray-400"> {{ $company->description }}</textarea>
                        </div>

                        <div class="md:flex justify-between items-center">
                            <div class="md:w-3/6 md:mx-2">
                                <label for="logo" class="text-2xl block text-gray-400">Logo </label>
                                <input type="file" name="logo" id="logo" accept="image/*"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                            </div>

                            <div class="md:w-3/6 md:mx-2">
                                <label for="banner" class="text-2xl block text-gray-400">Cover Image </label>
                                <input type="file" name="banner" id="banner" accept="image/*"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                            </div>
                        </div>

                        <div class="md:flex justify-between items-center">
                            <div class="md:w-3/6 md:mx-2">
                                <label for="facebook" class="text-2xl block text-gray-400">Facebook </label>
                                <input type="text" name="facebook" id="facebook"
                                    value="{{ $social_media['facebook'] }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                            </div>

                            <div class="md:w-3/6 md:mx-2">
                                <label for="twitter" class="text-2xl block text-gray-400">Twitter </label>
                                <input type="text" name="twitter" id="twitter"
                                    value="{{ $social_media['twitter'] }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                            </div>
                        </div>
                        <div class="md:flex justify-between items-center">
                            <div class="md:w-3/6 md:mx-2">
                                <label for="linkedin" class="text-2xl block text-gray-400">Linkedin </label>
                                <input type="text" name="linkedin" id="linkedin"
                                    value="{{ $social_media['linkedin'] }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                            </div>

                            <div class="md:w-3/6 md:mx-2">
                                <label for="instagram" class="text-2xl block text-gray-400">Instagram </label>
                                <input type="text" name="instagram" id="instagram"
                                    value="{{ $social_media['instagram'] }}"
                                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">
                            </div>
                        </div>


                        <div class="flex justify-center items-center w-2/6 mx-auto">
                            <button type="submit"
                                class="bg-gray-500 hover:bg-gray-600 text-gray-300 py-2 px-11 w-full rounded my-8">Update</button>
                        </div>
                    </div>

                </div>
            </form>

            {{-- <script>
                $(document).ready(function() {
                    $('#countryDropdown').on('change', function() {
                        var selectedCountryCode = $(this).val();
                        var stateDropdown = $('#stateDropdown');
                        var cityDropdown = $('#cityDropdown');
                        var spinner = $('#spinner');

                        // Show the spinner while loading states
                        spinner.show();

                        // Make an AJAX request to get states based on the selected country
                        $.ajax({
                            url: '/company/profiles/states/' + selectedCountryCode,
                            type: 'GET',
                            success: function(data) {
                                // Populate the state dropdown with the fetched states
                                stateDropdown.empty();
                                stateDropdown.append('<option value="">Select a state</option>');

                                $.each(data, function(index, state) {
                                    stateDropdown.append('<option value="' + state['iso2'] +
                                        '">' + state['name'] + '</option>');
                                });

                                // Hide the spinner after successfully loading states
                                spinner.hide();
                            },
                            error: function(error) {
                                console.error('Error fetching states:', error);
                                // Hide the spinner in case of an error
                                spinner.hide();
                            }
                        });
                    });

                    $('#stateDropdown').on('change', function() {
                        var selectedCountryCode = $('#countryDropdown').val();
                        var selectedStateCode = $(this).val();
                        var cityDropdown = $('#cityDropdown');
                        var spinner = $('#spinner');

                        // Show the spinner while loading cities
                        spinner.show();

                        // Make an AJAX request to get cities based on the selected country and state
                        $.ajax({
                            url: '/company/profiles/cities/' + selectedCountryCode + '/' +
                                selectedStateCode,
                            type: 'GET',
                            success: function(data) {
                                // Populate the city dropdown with the fetched cities
                                cityDropdown.empty();
                                cityDropdown.append('<option value="">Select a city</option>');

                                $.each(data, function(index, city) {
                                    cityDropdown.append('<option value="' + city['id'] + '">' +
                                        city['name'] + '</option>');
                                });

                                // Hide the spinner after successfully loading cities
                                spinner.hide();
                            },
                            error: function(error) {
                                console.error('Error fetching cities:', error);
                                // Hide the spinner in case of an error
                                spinner.hide();
                            }
                        });
                    });
                });
            </script> --}}
            <script>
    $(document).ready(function() {
        $('#countryDropdown').on('change', function() {
            var selectedCountryCode = $(this).val();
            var stateDropdown = $('#stateDropdown');
            var cityDropdown = $('#cityDropdown');
            var spinner = $('#spinner');

            // Disable state and city dropdowns while loading
            stateDropdown.prop('disabled', true);
            cityDropdown.prop('disabled', true);

            // Show the spinner while loading states
            spinner.show();

            // Make an AJAX request to get states based on the selected country
            $.ajax({
                url: '/company/profiles/states/' + selectedCountryCode,
                type: 'GET',
                success: function(data) {
                    // Populate the state dropdown with the fetched states
                    stateDropdown.empty();
                    stateDropdown.append('<option value="">Select a state</option>');

                    $.each(data, function(index, state) {
                        stateDropdown.append('<option value="' + state['iso2'] +
                            '">' + state['name'] + '</option>');
                    });

                    // Enable state dropdown and hide the spinner after successfully loading states
                    stateDropdown.prop('disabled', false);
                    spinner.hide();
                },
                error: function(error) {
                    console.error('Error fetching states:', error);
                    // Enable state dropdown and hide the spinner in case of an error
                    stateDropdown.prop('disabled', false);
                    spinner.hide();
                }
            });
        });

        $('#stateDropdown').on('change', function() {
            var selectedCountryCode = $('#countryDropdown').val();
            var selectedStateCode = $(this).val();
            var cityDropdown = $('#cityDropdown');
            var spinner = $('#spinner');

            // Disable city dropdown while loading
            cityDropdown.prop('disabled', true);

            // Show the spinner while loading cities
            spinner.show();

            // Make an AJAX request to get cities based on the selected country and state
            $.ajax({
                url: '/company/profiles/cities/' + selectedCountryCode + '/' +
                    selectedStateCode,
                type: 'GET',
                success: function(data) {
                    // Populate the city dropdown with the fetched cities
                    cityDropdown.empty();
                    cityDropdown.append('<option value="">Select a city</option>');

                    $.each(data, function(index, city) {
                        cityDropdown.append('<option value="' + city['id'] + '">' +
                            city['name'] + '</option>');
                    });

                    // Enable city dropdown and hide the spinner after successfully loading cities
                    cityDropdown.prop('disabled', false);
                    spinner.hide();
                },
                error: function(error) {
                    console.error('Error fetching cities:', error);
                    // Enable city dropdown and hide the spinner in case of an error
                    cityDropdown.prop('disabled', false);
                    spinner.hide();
                }
            });
        });
    });
</script>
        @endsection
