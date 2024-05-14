
  <!-- ======= Footer ======= -->
  <footer id="footer1" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Attraction</span></strong>. All Rights Reserved
    </div>
    <div class="credits"> 
      Designed by <a href="{{ asset('https://fableadtechnolabs.com/') }}">Fablead Developers Technolab</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/country-select-js@2.1.0/build/js/countrySelect.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script>
    $('#country').countrySelect({
        defaultCountry: "{{ $countryCode ?? 'my' }}", 
    }); 
    $('#searchBar').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Get the selected country code
        var countryCode = $('#country').countrySelect("getSelectedCountryData").iso2;

        // Add the country code as a hidden input field to the form
        $(this).append('<input type="hidden" name="country_code" value="' + countryCode + '">');

        // Now you can submit the form
        this.submit();
    });

    $(document).ready(function() {

        var queryParams = new URLSearchParams(window.location.search);
        var urlCities = queryParams.get('city');

        if (urlCities) {
            var citiesArray = urlCities.split(','); // Split the cities string into an array

            // Check checkboxes based on the cities present in the URL
            citiesArray.forEach(function(city) {
                $('#cities').find('input[value="' + city + '"]').prop('checked', true);
            });
        }

        $('.city-checkbox').change(function() {
            updateQueryString();
        });
        
        // Function to update query string with checked cities
        function updateQueryString() {
            var checkedCities = $('.city-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            var redirectUrl = '{{ route(session('prefix', 'agent') . '.view_attraction') }}';
            var existingQueryParams = {!! json_encode(request()->except('city')) !!};
             // Exclude 'city' parameter if present
            var queryString = $.param(existingQueryParams) + (checkedCities.length > 0 ? '&city=' + checkedCities.join(',') : '');
            var newUrl = redirectUrl + (queryString ? '?' + queryString : '');
            // Redirect to the new URL
            window.location.href = newUrl;
        }

    });

//     $(document).ready(function() {
//     $('#country').change(function() {
//         var country = $(this).val();
        
//         var countryData = $("#country").countrySelect("getSelectedCountryData");
//           //  fd.append("countryCode", countryData.iso2);
//            var countryCode =countryData.iso2;
           
//         if(country) {
//             $.ajax({
//                 url: '/view_attraction/getAttractions_autosearch',
//                 type: 'POST',
//                 data: {countryCode: countryCode},
//                 dataType: 'json',
//                 success:function(data) {
//                     $('#attractionList').html(data);
//                 }
//             });
//         }
//     });
// });

$(document).ready(function() {
  $('#suggestion-dropdown').empty().hide();
        $('.search-text').on('keyup', function() {
            var keyword = $(this).val();
            // var countryId = $('#country').val();
            var countryData = $("#country").countrySelect("getSelectedCountryData");
          //  fd.append("countryCode", countryData.iso2);
           var countryCode =countryData.iso2;
// alert(countryCode);
            // Send AJAX request to fetch attraction suggestions
            
            var url = "{{ route(session('prefix', 'agent') . '.getAttractions_autosearch') }}";
            if (keyword !== '') {
            // alert(url);
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    keyword: keyword,
                    countryCode: countryCode
                },
                success: function(response) {
                    // Update suggestion dropdown with fetched attraction names
                    var suggestionsHtml = '';
                    response.forEach(function(attraction) {
                        suggestionsHtml += '<div class="suggestion" style="cursor: pointer; padding:10px;">' + attraction.name + '</div>';
                    });
                    $('#suggestion-dropdown').html(suggestionsHtml).show();
                }
            });
          }else{
            $('#suggestion-dropdown').empty().hide();
          }
        });
    });
     // Handle click on suggestion
     $(document).on('click', '.suggestion', function() {
        var suggestionText = $(this).text();
        $('.search-text').val(suggestionText);
        $('#suggestion-dropdown').empty(); // Clear suggestion dropdown after selection
    });

    
  </script>

</body>

</html>