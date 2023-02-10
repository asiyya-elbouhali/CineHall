  

const container = document.getElementById('container_card');
// const seats = document.querySelectorAll(".row .seat:not(.sold)");
const count = document.getElementById("count");
const total = document.getElementById("total");
// const movieSelect = document.getElementById("movie");

// populateUI();

// let ticketPrice = +movieSelect.value;

// // Save selected movie index and price
// function setMovieData(movieIndex, moviePrice) {
//   localStorage.setItem("selectedMovieIndex", movieIndex);
//   localStorage.setItem("selectedMoviePrice", moviePrice);
// }

// // Update total and count
// function updateSelectedCount() {
//   const selectedSeats = document.querySelectorAll(".row .seat.selected");

//   const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

//   localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

//   const selectedSeatsCount = selectedSeats.length;

//   count.innerText = selectedSeatsCount;
//   total.innerText = selectedSeatsCount * ticketPrice;

//   setMovieData(movieSelect.selectedIndex, movieSelect.value);
// }


// Get data from localstorage and populate UI
// function populateUI() {
//   const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

//   if (selectedSeats !== null && selectedSeats.length > 0) {
//     seats.forEach((seat, index) => {
//       if (selectedSeats.indexOf(index) > -1) {
//         console.log(seat.classList.add("selected"));
//       }
//     });
//   }

//   const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

//   if (selectedMovieIndex !== null) {
//     movieSelect.selectedIndex = selectedMovieIndex;
//     console.log(selectedMovieIndex)
//   }
// }
// console.log(populateUI())
// // Movie select event
// movieSelect.addEventListener("change", (e) => {
//   ticketPrice = +e.target.value;
//   setMovieData(e.target.selectedIndex, e.target.value);
//   updateSelectedCount();
// });

// // Seat click event
// container.addEventListener("click", (e) => {
//   if (
//     e.target.classList.contains("seat") &&
//     !e.target.classList.contains("sold")
//   ) {
//     e.target.classList.toggle("selected");

//     updateSelectedCount();
//   }
// });

// Initial count and total set
// updateSelectedCount();







  
//   const api = "https://advanced-movie-search.p.rapidapi.com/search/movie?query=kong&page=1";

//     const options = {
//         method: 'GET',
//         headers: {
//             'X-RapidAPI-Key': '12409c201fmshe8c0a369d2aa4afp13b3d5jsnd4953e7580d8',
//             'X-RapidAPI-Host': 'advanced-movie-search.p.rapidapi.com'
//         }
//     };

//     async function getData(){
        
//         try {
//             const response = await fetch('https://advanced-movie-search.p.rapidapi.com/search/movie?query=kong&page=1', options)
//             const data = await response.json();
//             const v = Object.entries(data).map(m => m)
//             console.log(v)
//             // printData(data)
            
//         } catch (error) {
//             console.log("Error:",error.message)
            
//         }
    
//     }
//     function printData(data){
//         // console.log(data)
//         const header = document.querySelector('#header')
//         const content = document.querySelector('#content')

//         header.innerHTML += `<select class="form-control" onchange="getCh(this.value)">
//                     <option>please choose an option</option>
//                     ${data.results.map(character => `<option  >${character.original_title}</option>`) }
//                         </select>`
//                         console.log(data)

//     }


//     async function getCh(name){
//     if(name !="please choose an option"){
//         const response = await fetch(`https://advanced-movie-search.p.rapidapi.com/search/movie?query=${name}&page=1`,options)
//         const data = await response.json()
//         console.log(data.results[0].title)
//         content.innerHTML = `<h2>${data.results[0].title}</h2><br> <img src="${data.results[0].poster_path}" width="100">  <br><p>${data.results[0].overview}</p> `
//     }
//     }

//     getData()









// home js

// fin home js