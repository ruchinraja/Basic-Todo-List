<?php
?>

<style>
.card-header{
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 22px
}
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<div class="mt-4 col-8 offset-2">
<div class="card">
    <div class="card-header text-center">Edit Todo</div>
    <div class="card-body">
    <form method="post" action="{{ url('/todos/edit/'.$todoDetails->id) }}">
    @csrf
  <div class="form-group row">
    <label for="inputSubject" class="col-sm-2 col-form-label">Subject</label>
    <div class="col-sm-10">
      <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="Subject" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
    <textarea class="form-control" name="description" id="inputDescription" rows="3" required></textarea>
    </div>
  </div>
  <div class="form-group row">
  <!-- Date Picker text box implementation -->
  <label for="inputDeadline" class="col-sm-2 col-form-label">Deadline(Optional)</label>
  <div class="col-sm-10">
  <input class="form-control" id="inputDeadline" name="deadline" placeholder="Deadline" width="" />
  </div>
   </div>

  <!-- Date picker text box implementation ends -->
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </div>
</form>
</div>
</div>
</div>


<script>
        var dateToday = new Date(); 
        $('#inputDeadline').datepicker({
            uiLibrary: 'bootstrap4',
            showButtonPanel: true,
            minDate:dateToday
        });
    
    </script>