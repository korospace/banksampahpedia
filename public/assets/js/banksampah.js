axios.get(BASEURL+'/transaksi/sampahmasuk?id_banksampah='+id_banksampah)
.then(res => {
	let el = "";
	let data = res.data.data;
	
	for (const key in data) {
		console.log(data[key].kategori);

		el += `<div class="flex place-content-center">
			<div class="flex flex-col p-4 bg-yellow-600 rounded-lg place-content-center place-items-center">
			<div class="transform -translate-y-12">
				<img class="w-24" src="${BASEURL}/assets/images/banksampahpedia/1.png" alt="">
			</div>
			<div class="transform -translate-y-6 text-center">
				<p class="text-sm mb-4">${data[key].kategori}</p>
				<p class="text-lg font-bold">${data[key].total} Kg</p>
			</div>
			</div>
		</div>`;
	}

	$("#sampah_masuk_wraper").html(el)
}) 
.catch(res => {
})