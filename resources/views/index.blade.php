Sure! Here's an example code snippet for steps 6, 7, and 8:

Create routes for the storeDiscard and storeStock methods:
php
Copy code
// routes/web.php

Route::post('/blood/storeDiscard', [BloodController::class, 'storeDiscard'])->name('blood.storeDiscard');
Route::post('/blood/storeStock', [BloodController::class, 'storeStock'])->name('blood.storeStock');
Create a view with a form that contains input fields for weight, iron level, diseases, blood type, and rh, and two buttons: discard and store:
html
Copy code
<!-- resources/views/blood.blade.php -->

<form id="blood-form">
  <label for="weight">Weight:</label>
  <input type="number" name="weight" id="weight" required>

  <label for="iron_level">Iron Level:</label>
  <input type="number" name="iron_level" id="iron_level" required>

  <label for="diseases">Diseases:</label>
  <input type="text" name="diseases" id="diseases" required>

  <label for="blood_type">Blood Type:</label>
  <input type="text" name="blood_type" id="blood_type" required>

  <label for="rh">Rh:</label>
  <input type="text" name="rh" id="rh" required>

  <button type="button" id="discard-btn">Discard</button>
  <button type="button" id="store-btn">Store</button>
</form>
Add JavaScript code to the view to handle the button clicks and send an AJAX request to the appropriate route:
html
Copy code
<!-- resources/views/blood.blade.php -->

<script>
  $(function() {
    $('#discard-btn').click(function() {
      var form = $('#blood-form').serialize();
      var url = "{{ route('blood.storeDiscard') }}";

      $.post(url, form, function(response) {
        if (response.success) {
          alert('Blood data discarded successfully!');
        }
      });
    });

    $('#store-btn').click(function() {
      var form = $('#blood-form').serialize();
      var url = "{{ route('blood.storeStock') }}";

      $.post(url, form, function(response) {
        if (response.success) {
          alert('Blood data stored successfully!');
        }
      });
    });
  });
</script>
Make sure to include the jQuery library in your view to use the $.post function. You can add the following line to your view:

html
Copy code
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
That's it! You should now be able to submit blood data to either the discard or stock table by clicking the corresponding button on the form.