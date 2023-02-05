<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <form method="post" id="form">
        <div class="form-row align-items-center">
          <div class="col-sm-3 my-1">
            <label class="sr-only" for="inlineFormInputName">Nom</label>
            <input type="nom" class="form-control" id="nom" placeholder="Jane Doe">
          </div>
          <div class="col-sm-3 my-1">
            <label class="sr-only" for="inlineFormInputName">Prenom</label>
            <input type="prenom" class="form-control" id="prenom" placeholder="Jane Doe">
          </div>
          <div class="col-sm-3 my-1">
            <label class="sr-only" for="inlineFormInputName">Age</label>
            <input type="age" class="form-control" id="age" placeholder="Jane Doe">
          </div>
          <div class="col-sm-3 my-1">

          <select class="form-select" id="niveau" name="niveau" aria-label="Default select example">
            <option selected>Open this select menu</option>
            
            <option value="">One</option>
          </select>
          </div>

          <div class="col-auto my-1">
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>




    <script>

      let nom = document.getElementById('nom');
      let prenom = document.getElementById('prenom');
      let age = document.getElementById('age');
      let submit = document.getElementById('form');
      submit.addEventListener('submit', function(e){
        e.preventDefault();
        // var data = {text: "test from app.html"}
        const formData = new FormData(this);
      const options ={
        method : "POST",
        body: formData,
      }

        fetch('https://localhost/cinehall/backend/controllers/create.php',options).then(function(response){ return response.text();}).then(function(text){
          console.log(text);

        })      });

     
    </script>
    
</body>
</html>