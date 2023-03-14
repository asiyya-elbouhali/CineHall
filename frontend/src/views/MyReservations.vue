<template>
  <div class="myRes bg-cover bg-center bg-no-repeat h-screen ">
    <NavbarComponent v-if="!client_ref" />

    <nav
        v-if="client_ref"
        class="border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900"
      >
        <div
          class="container flex flex-wrap items-center justify-between mx-auto"
        >
          <a href="http://localhost:8080/" class="flex items-center">
            <img src="../assets/logo.com.png" class="h-6 mr-3 sm:h-9" alt="" />
            <!-- <span
              class="self-center text-xl font-semibold whitespace-nowrap text-white"
              >CinemaHall</span
            > -->
          </a>
          <button
            data-collapse-toggle="navbar-default"
            type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              class="w-6 h-6"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
          <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
              class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg backdrop-blur-sm bg-white/10 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
            >
              <li>
                <a
                  class="block py-2 pl-3 pr-4 text-red-600 rounded md:bg-transparent md:p-0 dark:text-white"
                  ><router-link to="/">Home</router-link></a
                >
              </li>
              <li>
                <a
                  class="block py-2 pl-3 pr-4 text-gray-300 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                  ><router-link to="/my-reservations"
                    >My Reservations</router-link
                  ></a
                >
              </li>
              <!-- <li>
                <a
                  class="block py-2 pl-3 pr-4 text-gray-300 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                  ><router-link to="/">{{ client_name }}</router-link></a
                >
              </li> -->
              <li>
                <a
                  href=""
                  class="block py-2 pl-3 pr-4 text-gray-300 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                  @click="logout()"
                  >Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <h1
      class="text-gray-900 text-3xl text-center font-bold mt-10"
      v-if="!my_reservations.length"
    >
      You don't have any reservations yet
    </h1>
    <div v-if="my_reservations.length">
      <!-- <h1 class="text-gray-200 text-3xl text-center font-bold">
        MY RESERVATIONS :
      </h1> -->
      <div class="relative overflow-x-auto pt">
        <table
          class="w-full text-sm text-center text-gray-500 dark:text-gray-400 italic"
        >
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200"
          >
            <tr>
              <!-- <th scope="col" class="px-6 py-3">ID</th> -->
              <!-- <th scope="col" class="px-6 py-3">RESERVED AT</th> -->
              <th scope="col" class="px-6 py-3">MOVIE</th>
              <th scope="col" class="px-6 py-3">ROOM</th>
              <th scope="col" class="px-6 py-3">SEAT NUMBER</th>
              <th scope="col" class="px-6 py-3">CANCEL RESERVATION</th>
            </tr>
          </thead>
          <tbody class="text-gray-200">
            <tr
              v-for="my_res in my_reservations"
              :key="my_res.id"
              class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            >
              <!-- <td class="px-6 py-4">{{ my_res.id }}</td> -->
              <!-- <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                {{ my_res.reserved_at }}
              </th> -->
              <td class="px-6 py-4">{{ my_res.title }}</td>

              <td class="px-6 py-4">{{ my_res.name }}</td>
              <td class="px-6 py-4">{{ my_res.seat_number }}</td>
              <td class="px-6 py-4">
                <button
                  @click="cancel(my_res.id)"
                  class="py-2 px-4 text-gray-200 font-bold"
                >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(100, 100, 100, 1);"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import NavbarComponent from "@/components/NavbarComponent.vue";
export default {
  name: "MyReservations",
  components: {
    NavbarComponent,
  },
  mounted() {
    if (!this.client_ref) {
      window.location = "http://localhost:8080/login";
    }
    this.getUserReservations();
  },
  data() {
    return {
      client_ref: localStorage.getItem("client_ref"),
      client_name: localStorage.getItem("client_name"),
      my_reservations: [],
    };
  },
  methods: {
    getUserReservations() {
      const formdata = new FormData();
      formdata.append("client_ref", this.client_ref);
      axios({
        url: "http://localhost/CinemaHall/api/clients/my_reservations",
        method: "post",
        data: formdata,
      })
        .then((res) => {
          this.my_reservations = res.data;
        })
        .catch((err) => {
          console.log(err.data);
        });
    },
    logout() {
      localStorage.clear();
    },
    cancel(id) {
      axios
        .get(`http://localhost/CinemaHall/api/clients/cancel/${id}`)
        .then((res) => {
          if (res.data == 1) {
            Swal.fire({
              icon: "success",
              title: "Done!",
              text: "Canceled with success",
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Failed!",
              text: "Out of date",
            });
          }
          this.getUserReservations();
        });
    },
  },
};
</script>

<style scoped>
/* .myRes {
  background-image: url("../assets/myres.jpg");
} */
</style>
