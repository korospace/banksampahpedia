/**
 * Get Mitra
 */
axios
  .get(`${APIURL}/list-banksampah`,{
      headers: {
      }
  })
  .then((response) => {
      list_banksampah = response.data;

      let list_partner = '';

      response.data.forEach(x => {
          list_partner += `
          <a href='${BASEURL}/bank/${x.slug}' class="max-w-sm p-6 mb-6 overflow-hidden bg-white shadow-md rounded-xl">
            <img src="${x.logo}" alt="Card Image" class="h-32 mb-4 ">
            <div class="mb-2 text-xl font-semibold">${x.name}</div>
            <p class="text-gray-600">${x.name}</p>
          </a>`;
      });

      $('#partner_wraper').html(list_partner);
  })

/*
--------------
send kritik
--------------
*/
// $("#contact").on("submit", function (e) {
//   e.preventDefault()

//   if (doValidate()) {
//     showLoadingSpinner()

//     let form = new FormData(e.target)

//     axios
//       .post(`${APIURL}/nasabah/sendkritik`, form, {
//         headers: {
//           // header options
//         },
//       })
//       .then((response) => {
//         hideLoadingSpinner()
//         $("#contact-name").val("")
//         $("#contact-email").val("")
//         $("#contact-message").val("")

//         setTimeout(() => {
//           Swal.fire({
//             icon: "success",
//             title: "Success",
//             text: "Pesan Telah Terkirim",
//             showConfirmButton: false,
//             timer: 2000,
//           })
//         }, 500)
//       })
//       .catch((error) => {
//         hideLoadingSpinner()

//         // error server
//         if (error.response.status == 500) {
//           showAlert({
//             message: `<strong>Ups . . .</strong> terjadi kesalahan pada server, coba sekali lagi`,
//             autohide: true,
//             type: "danger",
//           })
//         }
//       })
//   }
// })
