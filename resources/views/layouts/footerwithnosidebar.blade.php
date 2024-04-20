
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
  <script>
    $('#country').countrySelect({
        defaultCountry: "{{ $countryCode ?? 'in' }}", 
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
  </script>

</body>

</html>