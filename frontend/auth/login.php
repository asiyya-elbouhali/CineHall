<?php require '../inc/header.php'; ?>
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .cascading-right {
      margin-right: -50px;
    }

    @media (max-width: 991.98px) {
      .cascading-right {
        margin-right: 0;
      }
    }
  </style> 

  <!-- Jumbotron -->
  <div class="container py-4">
    <div class="row g-0 align-items-center">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
          <div class="card-body p-5 shadow-5 text-center">
            <h2 class="fw-bold mb-5">Sign in</h2>
            <form method="post" id="loginForm" enctype="multipart/form-data">
           

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input  name="token" type="text"  class="form-control" />
                <label class="form-label" >Token</label>
              </div>

              <!-- Submit button -->  
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Sign in 
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>or</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" class="w-100 rounded-4 shadow-4"
          alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->




<script>


        let loginSubmit = document.getElementById('loginForm');
        loginSubmit.addEventListener('submit', function(e){
        e.preventDefault();
        const formData = new FormData(loginSubmit);


        console.log(formData.get('token'));

      const options ={
        method : "POST",
        body: formData,
        
      };

        fetch('https://localhost/cinehall/backend/controllers/users/createLogin.php',options)
        .then(Request=>Request.json()).then(myData=>{
          if(myData.succes){
            console.log(myData)
            // console.log(myData.token);
            sessionStorage.setItem("userToken",myData.token);
            window.location = "/cinehall/frontend/pages/reservations.php";
          } else {
            Swal.fire ('Wrong Token!') 
          }
          
        }) 
     });




   






</script>


<?php require '../inc/footer.php'; ?>

