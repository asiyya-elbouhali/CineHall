<?php require '../inc/header.php'; ?>


<form method="post" enctype="multipart/form-data" id="reservationForm">

  <div class="movie-container">
    <label> Select a movie: <sup>*</sup> </label>
    <select id="movie" name="movie" onchange="changeSeatsValue()">
      <option value="" id="optionMovie" aria-placeholder="Choose a movie:"> </option>
    </select>
  </div>

  <div class="date">
    <label for="Date">Date:</label>
    <input type="text" readonly name="date" id="dateMovie" value="">
  </div>
  <div class="room">
    <label for="room">Room:</label>
    <input type="hidden" name="room"  id="roomMovieID" value="">
    <input type="text" readonly name="" id="roomMovie" value="">
  </div>


  <ul class="showcase">
    <li>
      <div class="seat"></div>
      <small>Available</small>
    </li>
    <li>
      <div class="seat selected"></div>
      <small>Selected</small>
    </li>
    <li>
      <div class="seat sold"></div>
      <small>Sold</small>
    </li>
  </ul>
  <div id="container_card">
    <div class="screen"></div>

    <div class="row">
      <input type="hidden" name="client"  id="userToken" value="">
      <input type="hidden" name="movie"  id="idMovie" value="">

      <input type="hidden" name="seat" id="seatSelected">
      <div class="seat" data-value="1" ></div>
      <div class="seat" data-value="2"></div>
      <div class="seat" data-value="3"></div>
      <div class="seat" data-value="4"></div>
      <div class="seat" data-value="5"></div>
      <div class="seat" data-value="6"></div>
      <div class="seat" data-value="7"></div>
      <div class="seat" data-value="8"></div>
    </div>

    <div class="row">
      <div class="seat" data-value="9"></div>
      <div class="seat" data-value="10"></div>
      <div class="seat" data-value="11"></div>
      <div class="seat" data-value="12"></div>
      <div class="seat" data-value="13"></div>
      <div class="seat" data-value="14"></div>
      <div class="seat" data-value="15"></div>
      <div class="seat" data-value="16"></div>

    </div>
    <div class="row">
      <div class="seat" data-value="17"></div>
      <div class="seat" data-value="18"></div>
      <div class="seat" data-value="19"></div>
      <div class="seat" data-value="20"></div>
      <div class="seat" data-value="21"></div>
      <div class="seat" data-value="22"></div>
      <div class="seat" data-value="23"></div>
      <div class="seat" data-value="24"></div>

    </div>
    <div class="row">
      <div class="seat" data-value="25"></div>
      <div class="seat" data-value="26"></div>
      <div class="seat" data-value="27"></div>
      <div class="seat" data-value="28"></div>
      <div class="seat" data-value="29"></div>
      <div class="seat" data-value="30"></div>
      <div class="seat" data-value="31"></div>
      <div class="seat" data-value="32"></div>
    </div>
    <div class="row">
      <div class="seat" data-value="33"></div>
      <div class="seat" data-value="34"></div>
      <div class="seat" data-value="35"></div>
      <div class="seat" data-value="36"></div>
      <div class="seat" data-value="37"></div>
      <div class="seat" data-value="38"></div>
      <div class="seat" data-value="39"></div>
      <div class="seat" data-value="40"></div>
    </div>
    <div class="row">
      <div class="seat" data-value="41"></div>
      <div class="seat" data-value="42"></div>
      <div class="seat" data-value="43"></div>
      <div class="seat" data-value="44"></div>
      <div class="seat" data-value="45"></div>
      <div class="seat" data-value="46"></div>
      <div class="seat" data-value="47"></div>
      <div class="seat" data-value="48"></div>
    </div>
  </div>

  <!-- <p class="text">
    You have selected <span id="count">0</span> seat for a price of RS.<span id="total">0</span>
  </p> -->
  <button type="submit" id="reserve_seat">Make a reservation</button>
</form>

<script>

 

  document.getElementById('userToken').value=sessionStorage.getItem("userToken");

  const mov = document.getElementById('movie');
  const dateMovie = document.getElementById('dateMovie');
  const roomMovie = document.getElementById('room');
  const optionMovie = document.getElementById('optionMovie');
  const seats = document.querySelectorAll(".seat");



  async function getMovies() {
    const response = await fetch('https://localhost/cinehall/backend/controllers/movies/readAll.php')
    const data = await response.json();
    let movie = data.movies;
    let seatsReservation = data.seatsReservation;
    console.log(data);
    for (let i = 0; i < movie.length; i++) {
      mov.innerHTML += `<option nom="movieReservation" value="${movie[i].name}">${movie[i].name}</option>`

      mov.addEventListener('click', (e) => {
// when changing the option of the movie unset sold seats first than show avilable and sold seats for the current option
const solds =document.getElementsByClassName('seat');
  for (let k = 0; k < solds.length; k++) {
    if(solds[k].classList.contains("sold")){
      solds[k].classList.remove("sold")
    }
  }
// end unset sold seats

        console.log(movie[i]);
        // dateMovie.innerHTML += `<input value="${movie[i].movieDate}" >`
        for (let i = 0; i < movie.length; i++) {
          if (movie[i].name == mov.value) {
            document.getElementById('idMovie').value = movie[i].movieID;
            document.getElementById('roomMovie').value = movie[i].movieRoom;
            document.getElementById('dateMovie').value = movie[i].movieDate;
            document.getElementById('roomMovieID').value = movie[i].movieRoomID;
            let userToken = sessionStorage.getItem("userToken"); //Client Token
            console.log(userToken);
            console.log(movie[i].movieID);
            console.log(movie[i].movieRoomID);
// Find seats of each room
            for (let j = 0; j < seatsReservation.length; j++) {
            if (seatsReservation[j].roomRsrv == movie[i].movieRoom) {
                // console.log(movie[i].movieRoom);
                // console.log(seatsReservation[j].roomRsrv);

                // console.log(seatsReservation[j].seatsRsrv)
              console.log(seatsReservation[j].seatsRsrv);
              const sold =document.getElementsByClassName('seat');
          for(let i=0; i<sold.length; i++){
            if (sold[i].getAttribute("data-value")== seatsReservation[j].seatsRsrv){
              sold[i].classList.add('sold');
            }
          }

              }



            }


          
          }




        }
      })
    }
  }

  getMovies()


const allSeats =document.querySelectorAll('.seat');
for (var i = 0; i < allSeats.length; i++) {
  allSeats[i].addEventListener('click', (e)=>{

    for (let k = 0; k < allSeats.length; k++) {
    if(allSeats[k].classList.contains("selected")){
      allSeats[k].classList.remove("selected")
    }
  }
   
    const seatSelected=document.getElementById('seatSelected');
    if (seatSelected.value === "") {
      seatSelected.value=e.target.getAttribute("data-value");
      e.target.classList.add("selected");

    } else {
      seatSelected.value = "";
      e.target.classList.remove("selected");

    }
})
}


  // Make a reservation

  let reservationForm = document.getElementById('reservationForm');
  reservationForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    // var data = {text: "test from app.html"}
    const formData = new FormData(reservationForm);

    console.log(formData.get('reservation'));

    const options = {
      method: "POST",
      body: formData
    };

    fetch('https://localhost/cinehall/backend/controllers/reservations/create.php', options)
      .then(Request => Request.json()).then(myData => {
        console.log(myData);
        if(myData.success){
          Swal.fire('Your seat has been successfuly booked!');
          const seatSelected = document.getElementById('seatSelected').value;
          const sold =document.getElementsByClassName('seat');
          for(let i=0; i<sold.length; i++){
            if (sold[i].getAttribute("data-value")== seatSelected){
              sold[i].classList.add('sold');
            }
          }

        }else if (!myData.success){
          Swal.fire('Sorry This seat is already booked!')
        }
      })
  });
</script>
<script src="../js/script.js"></script>



  <?php require '../inc/footer.php'; ?>
