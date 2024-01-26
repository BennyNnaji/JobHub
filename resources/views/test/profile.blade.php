<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>

<body>
    <form action="" method="post">

        <div class="md:w-3/6 md:mx-2">

            <label for="countryDropdown" class="text-2xl block text-gray-400">Select a country:</label>
            <select id="countryDropdown" name="countrys"
                class="w-full border-b-4 border-gray-400 rounded text-gray-400">

                <option value="">Select Country</option>

                @foreach ($countries as $countryData)
                    <option value="{{ $countryData['iso2'] }}">{{ $countryData['name'] }}</option>
                @endforeach
            </select>

        </div>
        </div>


        <div class="md:flex justify-between items-center">
            <div class="md:w-3/6 md:mx-2">
                <label for="stateDropdown" class="text-2xl block text-gray-400">Select a state:</label>
                <select id="stateDropdown" name="states"
                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">

                    <option value="">Select a state</option>

                </select>
            </div>

            <div class="md:w-3/6 md:mx-2">
                <label for="cityDropdown" class="text-2xl block text-gray-400">Select a city:</label>
                <select id="cityDropdown" name="citys"
                    class="w-full border-b-4 border-gray-400 rounded text-gray-400">

                    <option value="">Select a city</option>



                </select>
            </div>
    </form>

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
                    url: '/company/test/states/' + selectedCountryCode,
                    
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
                    url: '/company/test/cities/' + selectedCountryCode + '/' +
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
</body>

</html>
