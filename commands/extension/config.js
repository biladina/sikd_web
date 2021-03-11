function saveOptions(e) {
	browser.storage.local.set({
		tahun_anggaran: document.querySelector("#tahun_anggaran").value
	});
	browser.storage.local.set({
		id_daerah: document.querySelector("#id_daerah").value
	});
	browser.storage.local.set({
		url: document.querySelector("#url").value
	});
	browser.storage.local.set({
		url_lokal: document.querySelector("#url_lokal").value
	});
	e.preventDefault();
}

function restoreOptions() {
	browser.storage.local.get('tahun_anggaran').then((res) => {
		document.querySelector("#tahun_anggaran").value = res.tahun_anggaran || '';
	});
	browser.storage.local.get('id_daerah').then((res) => {
		document.querySelector("#id_daerah").value = res.id_daerah || '';
	});
	browser.storage.local.get('url').then((res) => {
		document.querySelector("#url").value = res.url || '';
	});
	browser.storage.local.get('url_lokal').then((res) => {
		document.querySelector("#url_lokal").value = res.url_lokal || '';
	});
}

document.addEventListener('DOMContentLoaded', restoreOptions);
document.querySelector("form").addEventListener("submit", saveOptions);