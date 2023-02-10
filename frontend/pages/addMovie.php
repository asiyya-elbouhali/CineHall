<?php require '../inc/header.php'; ?>


<h1 class="display-4 mb-5">Add Movie</h1>

<form method="post" id="movieForm">

<div class="form-group row">
    <label for="movieName" class="col-sm-4 col-form-label">Name: <sup></sup></label>
    <div class="col-sm-1">
<input type="text" name="nom" value="">
</div>

</div>
<div class="form-group row">
    <label for="description" class="col-sm-4 col-form-label">Description:</label>
    <div class="col-sm-1">
<input type="text" name="description" value="">
</div>

</div>

<div class="form-group row">
    <label for="trailler" class="col-sm-4 col-form-label">Trailler:</label>
    <div class="col-sm-1">
<input type="text" name="trailler" value="">
</div>
</div>

<div class="form-group row">
    <label for="image" class="col-sm-4 col-form-label">Poster:</label>
    <div class="col-sm-1">
<input type="text" name="image" value="">
</div>
</div>

<div class="form-group row">
    <label for="price" class="col-sm-4 col-form-label">Price:</label>
    <div class="col-lg-5">
    <input type="number" name="prix" value="">
    </div>
</div>
 <input type="submit" value="Add Movie">
</form>



<script>
 

        let movieSubmit = document.getElementById('movieForm');
        movieSubmit.addEventListener('submit', function(e){
        e.preventDefault();
        // var data = {text: "test from app.html"}
        const formData = new FormData(movieSubmit);


        console.log(formData.get('nom'));

      const options ={
        method : "POST",
        body: formData
      };

        fetch('https://localhost/cinehall/backend/controllers/movies/create.php',options)
        .then(Request=>Request.json()).then(myData=>{
          console.log(myData);  
          Swal.fire ('The Movie is successfuly added')     

        }) 
     });



</script>














 

    <?php require '../inc/footer.php'; ?>
