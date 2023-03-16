<template>
<NavbarComponent/>
<div>
  
    <div
      class="grid justify-items-center  grid-cols-6 gap-2 mt-10 w-1/2 mx-auto pb-10"
    >
      <input
        v-for="n in 40"
        :key="n"
        type="checkbox"
        :checked="reservedSeats.includes(n)"
        :disabled="reservedSeats.includes(n)"
        :value="n"
        name="seat_number"
        class="w-9 h-9 seat  "
      />
    </div>

    <div
      class="flex justify-center justify-between gap-6 items-center w-1/2 mx-auto mb-10"
    >
      <button
        class="bg-green-500 hover:bg-green-600 hover:text-gray-300 text-gray-200 md:px-8 px-1 md:py-3 py-1 rounded md:font-bold md:ring-2 ring-green-300"
        @click="book()"
      >
        Make your reservation
      </button>
      <p class="md:text-xl">
        <span class="font-bold"> On </span>{{ movie.name }} <span class="font-bold"> At </span> {{ movie.shown_at }}
      </p>
    </div>
  </div>
</template>

<script>

import axios from "axios";
import Swal from "sweetalert2";
import NavbarComponent from "@/components/NavbarComponent.vue";
export default {
  name: "FilmView",
  components: {
    NavbarComponent,
  },
  mounted() {
    if (!this.client_ref) {
      window.location = "http://localhost:8080/login";
    }
    axios
      .get(`http://localhost/CinemaHall/api/movies/show/${this.$route.query.id}`)
      .then((res) => (this.movie = res.data));

    this.updateRes();
  },
  data() {
    return {
      movie: "",
      reservedSeats: [],
      client_ref: localStorage.getItem("client_ref"),
      client_name: localStorage.getItem("client_name"),
    };
  },
  methods: {
    updateRes() {
      axios
        .get(
          `http://localhost/CinemaHall/api/movies/reserved_seats/${this.$route.query.id}`
        )
        .then((res) => (this.reservedSeats = res.data));
    },
    getChecked() {
      let seats = document.getElementsByClassName("seat");
      let checked_seat;
      for (let i = 0; i < seats.length; i++) {
        if (seats[i].checked && !seats[i].disabled) {
          checked_seat = parseInt(seats[i].value);
        }
      }
      return checked_seat;
    },
    book() {
      if (this.getChecked() !== null && this.getChecked() > 0) {
        const formdata = new FormData();
        formdata.append("hall_id_fk", this.movie.hall_id_fk);
        formdata.append("client_id_fk", this.client_ref);
        formdata.append("movie_id_fk", this.movie.movie_id_fk);
        formdata.append("seat_number", this.getChecked());
        // axios({
        //   url: "http://localhost/CinemaHall/api/clients/book",
        //   method: "post",
        //   data: formdata,
        // })
        axios.post("http://localhost/CinemaHall/api/clients/book",formdata)
          .then((res) => {
            // after sucess
            Swal.fire({
              icon: "success",
              title: "Done!",
              text: `${res.data.Success}`,
            });
            this.updateRes();
          })
          .catch((err) => {
            // on error
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: `${res.data.Error}`,
            });
          });
      } else {
        Swal.fire({
          icon: "error",
          title: "Done!",
          text: "Please Select a Seat First",
        });
      }
    },
    logout() {
      localStorage.clear();
    },
  },
};
</script>
