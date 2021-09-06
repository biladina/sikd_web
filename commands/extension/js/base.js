var __script = '';
var _s = document.getElementsByTagName('script');
for(var i=0, l=_s.length; i<l; i++){
	var _script = _s[i].innerHTML;
	if(
		_script.indexOf('remot=') != -1
		|| _script.indexOf('remot =') != -1
		|| _script.indexOf('lru1=') != -1
		|| _script.indexOf('lru1 =') != -1
	){
		__script += ' '+_script;
	}
}
eval(__script);
// console.log('__script', __script);

jQuery(document).ready(function(){
	// var current_url = window.location.href;

	browser.storage.local.get(data => {
		var config_tahun_anggaran = data.tahun_anggaran;
		var config_id_daerah = data.id_daerah;
		var config_url = data.url;
		var config_url_lokal = data.url_lokal;

		// if (current_url.indexOf('main/budget/belanja/'+config_tahun_anggaran+'/giat/unit/'+config_id_daerah+'/0') != -1)
		if (jQuery('.page-title').text() == 'Kegiatan / Sub Kegiatan Belanja' && jQuery('#table_unit').length > 0)
		{
	        var btn_sub_kegiatan_belanja = '<div class="button">'
	            + '<button class="fcbtn btn btn-primary btn-1b" id="btn_sub_kegiatan_belanja">'
	            + '<i class="fa fa-cloud-download m-r-5"></i> <span>Ambil Data Sub Kegiatan & Belanja</span>'
	            + '</button></div>';

	        var btn_belanja_paket = '&nbsp&nbsp'
	            + '<button class="fcbtn btn btn-success btn-1b" id="btn_belanja_paket">'
	            + '<i class="fa fa-cloud-download m-r-5"></i> <span>Ambil Data Belanja & Paket</span>'
	            + '</button>';

	        // jQuery('.white-box').parent().prepend(btn_sub_kegiatan_belanja);
	        // jQuery('.button').append(btn_belanja_paket);

	        jQuery('#btn_sub_kegiatan_belanja').on('click', function ()
	        {
	            jQuery.ajax({
		            url: config_url + 'main/budget/belanja/'+config_tahun_anggaran+'/giat/tampil-unit/'+config_id_daerah+'/0',
		            type: 'POST',
          			data : {"_token":tokek},
		            contentType: 'application/json',
		            success: function (data_skpd) {
						for(var i in data_skpd.data)
						{
							var id_unit = data_skpd.data[i].id_unit;

							jQuery.ajax({
					            url: config_url + 'main/budget/belanja/'+config_tahun_anggaran+'/giat/tampil-giat/'+config_id_daerah+'/'+id_unit,
					            type: 'POST',
          						data : {"_token":tokek},
					            contentType: 'application/json',
					            success: function (data_sub_kegiatan_belanja)
					            {
					            	var sub_kegiatan_belanja = [];

					            	data_sub_kegiatan_belanja.data.map(function (sub_kegiatan, i) {
			                            sub_kegiatan_belanja[i] = {};
			                            sub_kegiatan_belanja[i].id_jadwal = sub_kegiatan.id_jadwal;
			                            sub_kegiatan_belanja[i].id_daerah = sub_kegiatan.id_daerah;
			                            sub_kegiatan_belanja[i].tahun = sub_kegiatan.tahun;
			                            sub_kegiatan_belanja[i].id_unit = sub_kegiatan.id_unit;
			                            sub_kegiatan_belanja[i].id_skpd = sub_kegiatan.id_skpd;
			                            sub_kegiatan_belanja[i].kode_skpd = sub_kegiatan.kode_skpd;
			                            sub_kegiatan_belanja[i].nama_skpd = sub_kegiatan.nama_skpd;
			                            sub_kegiatan_belanja[i].id_urusan = sub_kegiatan.id_urusan;
			                            sub_kegiatan_belanja[i].kode_urusan = sub_kegiatan.kode_urusan;
			                            sub_kegiatan_belanja[i].nama_urusan = sub_kegiatan.nama_urusan;
			                            sub_kegiatan_belanja[i].id_bidang_urusan = sub_kegiatan.id_bidang_urusan;
			                            sub_kegiatan_belanja[i].kode_bidang_urusan = sub_kegiatan.kode_bidang_urusan;
			                            sub_kegiatan_belanja[i].nama_bidang_urusan = sub_kegiatan.nama_bidang_urusan;
			                            sub_kegiatan_belanja[i].id_sub_skpd = sub_kegiatan.id_sub_skpd;
			                            sub_kegiatan_belanja[i].kode_sub_skpd = sub_kegiatan.kode_sub_skpd;
			                            sub_kegiatan_belanja[i].nama_sub_skpd = sub_kegiatan.nama_sub_skpd;
			                            sub_kegiatan_belanja[i].id_program = sub_kegiatan.id_program;
			                            sub_kegiatan_belanja[i].kode_program = sub_kegiatan.kode_program;
			                            sub_kegiatan_belanja[i].nama_program = sub_kegiatan.nama_program;
			                            sub_kegiatan_belanja[i].id_giat = sub_kegiatan.id_giat;
			                            sub_kegiatan_belanja[i].kode_giat = sub_kegiatan.kode_giat;

			                            sub_kegiatan_belanja[i].kode_bl = sub_kegiatan.nama_giat.kode_bl;
			                            sub_kegiatan_belanja[i].nama_giat = sub_kegiatan.nama_giat.nama_giat;
			                            sub_kegiatan_belanja[i].thpPos_giat = sub_kegiatan.nama_giat.thpPos;
			                            sub_kegiatan_belanja[i].gtLock = sub_kegiatan.nama_giat.gtLock;
			                            sub_kegiatan_belanja[i].pagu_giat = sub_kegiatan.nama_giat.pagu_giat;
			                            sub_kegiatan_belanja[i].rinci_giat = sub_kegiatan.nama_giat.rinci_giat;

			                            sub_kegiatan_belanja[i].id_sub_giat = sub_kegiatan.id_sub_giat;
			                            sub_kegiatan_belanja[i].kode_sub_giat = sub_kegiatan.kode_sub_giat;

			                            sub_kegiatan_belanja[i].kode_sbl = sub_kegiatan.nama_sub_giat.kode_sbl;
			                            sub_kegiatan_belanja[i].nama_sub_giat = sub_kegiatan.nama_sub_giat.nama_sub_giat;
			                            sub_kegiatan_belanja[i].thpPos_sub_giat = sub_kegiatan.nama_sub_giat.thpPos;
			                            sub_kegiatan_belanja[i].pagu = sub_kegiatan.nama_sub_giat.pagu;
			                            sub_kegiatan_belanja[i].rincian = sub_kegiatan.nama_sub_giat.rincian;
			                            sub_kegiatan_belanja[i].mst_lock = sub_kegiatan.nama_sub_giat.mst_lock;

			                            sub_kegiatan_belanja[i].pagu_indikatif = sub_kegiatan.pagu_indikatif;
			                            sub_kegiatan_belanja[i].urusan_locked = sub_kegiatan.urusan_locked;
			                            sub_kegiatan_belanja[i].bidang_urusan_locked = sub_kegiatan.bidang_urusan_locked;
			                            sub_kegiatan_belanja[i].program_locked = sub_kegiatan.program_locked;
			                            sub_kegiatan_belanja[i].giat_locked = sub_kegiatan.giat_locked;
			                            sub_kegiatan_belanja[i].sub_giat_locked = sub_kegiatan.sub_giat_locked;
			                            sub_kegiatan_belanja[i].kunci_bl = sub_kegiatan.kunci_bl;
			                            sub_kegiatan_belanja[i].kunci_bl_rinci = sub_kegiatan.kunci_bl_rinci;
			                            sub_kegiatan_belanja[i].user_created = sub_kegiatan.user_created;
			                            sub_kegiatan_belanja[i].created_date = sub_kegiatan.created_date;
			                            sub_kegiatan_belanja[i].created_time = sub_kegiatan.created_time;
			                            sub_kegiatan_belanja[i].user_updated = sub_kegiatan.user_updated;
			                            sub_kegiatan_belanja[i].updated_date = sub_kegiatan.updated_date;
			                            sub_kegiatan_belanja[i].updated_time = sub_kegiatan.updated_time;
			                            sub_kegiatan_belanja[i].set_zona = sub_kegiatan.set_zona;
			                            sub_kegiatan_belanja[i].usul_asmas = sub_kegiatan.usul_asmas;
			                            sub_kegiatan_belanja[i].usul_reses = sub_kegiatan.usul_reses;
			                            sub_kegiatan_belanja[i].status_giat = sub_kegiatan.status_giat;
			                            sub_kegiatan_belanja[i].status_rincian = sub_kegiatan.status_rincian;
			                            sub_kegiatan_belanja[i].batasanpagu = sub_kegiatan.batasanpagu;
			                            sub_kegiatan_belanja[i].pagumurni = sub_kegiatan.pagumurni;
			                            sub_kegiatan_belanja[i].realisasi = sub_kegiatan.realisasi;
			                            sub_kegiatan_belanja[i].stat_asmas = sub_kegiatan.stat_usul.stat_asmas;
			                            sub_kegiatan_belanja[i].stat_reses = sub_kegiatan.stat_usul.stat_reses;
			                        });

			                        console.log(JSON.stringify(sub_kegiatan_belanja));

			                        // console.log(config_url_lokal + '?r=sipd/sub-kegiatan-belanja&data='+JSON.stringify(sub_kegiatan_belanja));
			                        // console.log(config_url_lokal + '?r=sipd/sub-kegiatan-belanja');

			            //             jQuery.ajax({
							        //     // url: config_url_lokal + '?r=sipd/sub-kegiatan-belanja&data='+JSON.stringify(sub_kegiatan_belanja),
							        //     url: config_url_lokal + '?r=sipd/sub-kegiatan-belanja',
							        //     type: "POST",
							        //     data: {data : JSON.stringify(sub_kegiatan_belanja)},
							        //     success: function (data) {
							        //     	console.log(data);
							        //     }
							        // });

					    //         	for(var i in data_sub_kegiatan_belanja.data)
									// {
									// 	if(data_sub_kegiatan_belanja.data[i].rincian > 0)
					    //         		{
					    //         			var id_unit = data_sub_kegiatan_belanja.data[i].id_unit;
					    //         			var kode_sbl = data_sub_kegiatan_belanja.data[i].kode_sbl;
					    //         			var sub_kegiatan = data_sub_kegiatan_belanja.data[i].nama_sub_giat.nama_sub_giat;
					    //         			console.log(sub_kegiatan);
					    //         		}
					    //         	}
					            }
					        });
						}

						// 	// if(id_unit == 1836)
						// 	// {
						// 	// 	var id_unit_ = data[i].id_unit;
		    //  //        			console.log(id_unit);
						// 		jQuery.ajax({
						//             url: config_url + 'main/budget/belanja/'+config_tahun_anggaran+'/giat/tampil-giat/'+config_id_daerah+'/'+id_unit,
						//             contentType: 'application/json',
						//             success: function (data_sub_kegiatan_belanja) {
						//             	var jlh = 0;
				  //           			console.log(id_unit);
						// 				for(var i in data_sub_kegiatan_belanja.data)
						// 				{
						// 					if(data_sub_kegiatan_belanja.data[i].rincian > 0)
						//             		{
						//             			var kode_sbl = data_sub_kegiatan_belanja.data[i].kode_sbl;
						//             			console.log(id_unit);

						//             			if(kode_sbl == "1836.1836.210.1426.4568")
						//             			{
						//             				var url = config_url + 'main/budget/belanja/'+config_tahun_anggaran+'/rinci/tampil-rincian/'+config_id_daerah+'/'+id_unit+'?kodesbl='+kode_sbl;
						//             				console.log(url);

						//          //    				jQuery.ajax({
						// 					    //         url: config_url + 'main/budget/belanja/'+config_tahun_anggaran+'/rinci/tampil-rincian/'+config_id_daerah+'/'+id_unit+'?kodesbl='+kode_sbl,
						// 					    //         contentType: 'application/json',
						// 					    //         success: function (data) {
						// 					    //         	console.log(data);
						// 									// // for(var i in data.data)
						// 									// // {
						// 									// // 	console.log(data.data[i].rincian);
						// 									// // }
						// 					    //         }
						// 					    //     });
						//             			}
						//             			jlh++;
						//             		}
						// 				}
						// 				// console.log(jlh);
						//             }
						//         });
						// 	// }
						// 	// else
						// 	// {
						// 	// 	console.log(id_unit);
						// 	// }
						// }
		            }
		        });
	        });

	        jQuery('#btn_belanja_paket').on('click', function ()
	        {
	        	jQuery.ajax({
		            url: config_url_lokal + '?r=sipd/get-sub-kegiatan-belanja',
		            success: function (data_sub_kegiatan_belanja)
		            {
		            	var jlh = 0;
		            	for(var i in data_sub_kegiatan_belanja)
						{
	            			var id_unit = data_sub_kegiatan_belanja[i].id_unit;
	            			var kode_sbl = data_sub_kegiatan_belanja[i].kode_sbl;

	            			jQuery.ajax({
					            url: config_url + 'main/budget/belanja/'+config_tahun_anggaran+'/rinci/tampil-rincian/'+config_id_daerah+'/'+id_unit+'?kodesbl='+kode_sbl,
					            contentType: 'application/json',
					            success: function (data_belanja_paket)
					            {
					            	var belanja_paket = [];

					            	data_belanja_paket.data.map(function (belanja, i) {
			                            belanja_paket[i] = {};
			                            belanja_paket[i].id_jadwal = belanja.id_jadwal;
			                            belanja_paket[i].id_daerah = belanja.id_daerah;
			                            belanja_paket[i].tahun = belanja.tahun;
			                            belanja_paket[i].id_unit = belanja.id_unit;
			                            belanja_paket[i].id_skpd = belanja.id_skpd;
			                            belanja_paket[i].kode_skpd = belanja.kode_skpd;
			                            belanja_paket[i].nama_skpd = belanja.nama_skpd;
			                            belanja_paket[i].id_urusan = belanja.id_urusan;
			                            belanja_paket[i].kode_urusan = belanja.kode_urusan;
			                            belanja_paket[i].nama_urusan = belanja.nama_urusan;
			                            belanja_paket[i].id_bidang_urusan = belanja.id_bidang_urusan;
			                            belanja_paket[i].kode_bidang_urusan = belanja.kode_bidang_urusan;
			                            belanja_paket[i].nama_bidang_urusan = belanja.nama_bidang_urusan;
			                            belanja_paket[i].id_sub_skpd = belanja.id_sub_skpd;
			                            belanja_paket[i].kode_sub_skpd = belanja.kode_sub_skpd;
			                            belanja_paket[i].nama_sub_skpd = belanja.nama_sub_skpd;
			                            belanja_paket[i].id_program = belanja.id_program;
			                            belanja_paket[i].kode_program = belanja.kode_program;
			                            belanja_paket[i].nama_program = belanja.nama_program;
			                            belanja_paket[i].id_giat = belanja.id_giat;
			                            belanja_paket[i].kode_giat = belanja.kode_giat;
			                            belanja_paket[i].nama_giat = belanja.nama_giat;
			                            belanja_paket[i].id_sub_giat = belanja.id_sub_giat;
			                            belanja_paket[i].kode_sub_giat = belanja.kode_sub_giat;
			                            belanja_paket[i].nama_sub_giat = belanja.nama_sub_giat;
			                            belanja_paket[i].pagu = belanja.pagu;
										belanja_paket[i].id_akun = belanja.id_akun;
										belanja_paket[i].kode_akun = belanja.kode_akun;
										belanja_paket[i].nama_akun = belanja.nama_akun;
										belanja_paket[i].lokus_akun_teks = belanja.lokus_akun_teks;
										belanja_paket[i].jenis_bl = belanja.jenis_bl;
										belanja_paket[i].is_paket = belanja.is_paket;
										belanja_paket[i].subs_bl_teks = belanja.subs_bl_teks;
										belanja_paket[i].ket_bl_teks = belanja.ket_bl_teks;
										belanja_paket[i].id_standar_harga = belanja.id_standar_harga;
										belanja_paket[i].kode_standar_harga = belanja.kode_standar_harga;

										belanja_paket[i].nama_komponen = belanja.nama_standar_harga.nama_komponen;
										belanja_paket[i].spek_komponen = belanja.nama_standar_harga.spek_komponen;
										
										belanja_paket[i].satuan = belanja.satuan;
										belanja_paket[i].rincian = belanja.rincian;
										belanja_paket[i].pajak = belanja.pajak;
										belanja_paket[i].volume = belanja.volume;
										belanja_paket[i].harga_satuan = belanja.harga_satuan;
										belanja_paket[i].koefisien = belanja.koefisien;
										belanja_paket[i].vol_1 = belanja.vol_1;
										belanja_paket[i].sat_1 = belanja.sat_1;
										belanja_paket[i].vol_2 = belanja.vol_2;
										belanja_paket[i].sat_2 = belanja.sat_2;
										belanja_paket[i].vol_3 = belanja.vol_3;
										belanja_paket[i].sat_3 = belanja.sat_3;
										belanja_paket[i].vol_4 = belanja.vol_4;
										belanja_paket[i].sat_4 = belanja.sat_4;
										belanja_paket[i].id_rinci_sub_bl = belanja.id_rinci_sub_bl;
			                            belanja_paket[i].kunci_bl_rinci = belanja.kunci_bl_rinci;
			                            belanja_paket[i].urusan_locked = belanja.urusan_locked;
			                            belanja_paket[i].bidang_urusan_locked = belanja.bidang_urusan_locked;
			                            belanja_paket[i].program_locked = belanja.program_locked;
			                            belanja_paket[i].giat_locked = belanja.giat_locked;
			                            belanja_paket[i].sub_giat_locked = belanja.sub_giat_locked;
			                            belanja_paket[i].akun_locked = belanja.akun_locked;
			                            belanja_paket[i].user_created = belanja.user_created;
			                            belanja_paket[i].created_date = belanja.created_date;
			                            belanja_paket[i].created_time = belanja.created_time;
			                            belanja_paket[i].user_updated = belanja.user_updated;
			                            belanja_paket[i].updated_date = belanja.updated_date;
			                            belanja_paket[i].updated_time = belanja.updated_time;
			                            belanja_paket[i].set_zona = belanja.set_zona;
			                            belanja_paket[i].totalpajak = belanja.totalpajak;
			                            belanja_paket[i].pajakmurni = belanja.pajakmurni;
			                        });

									jQuery.ajax({
							            url: config_url_lokal + '?r=sipd/sub-kegiatan-belanja-paket',
							            type: "POST",
							            data: {data : JSON.stringify(belanja_paket)},
							            success: function (data) {
							            	console.log(data);
							            	jlh++;
											console.log(jlh);
							            }
							        });
					            }
					        });
		            	}
		            }
		        });
	        });
	    }
	    else if (jQuery('.page-title').text() == 'Rincian Belanja Sub Kegiatan' && jQuery('#table_rinci').length > 0)
		{
			var btn_belanja_paket = '<div class="button">'
	            + '<button class="fcbtn btn btn-primary btn-1b" id="btn_belanja_paket">'
	            + '<i class="fa fa-cloud-download m-r-5"></i> <span>Ambil Data Rincian Belanja</span>'
	            + '</button>';

	        var btn_paket = '&nbsp&nbsp'
	            + '<button class="fcbtn btn btn-success btn-1b" id="btn_paket">'
	            + '<i class="fa fa-cloud-download m-r-5"></i> <span>Ambil Data Paket</span>'
	            + '</button>';

	        jQuery('.white-box').parent().prepend(btn_belanja_paket);
	        jQuery('.button').append(btn_paket);

	        jQuery('#btn_belanja_paket').on('click', function ()
	        {
	            jQuery.ajax({
		            url: lru1,
                	type: 'POST',
                	data : {"_token":tokek},
		            success: function (data_belanja_paket) {
		            	var belanja_paket = [];

		            	data_belanja_paket.data.map(function (belanja, i) {
                            belanja_paket[i] = {};
                            belanja_paket[i].id_jadwal = belanja.id_jadwal;
                            belanja_paket[i].id_daerah = belanja.id_daerah;
                            belanja_paket[i].tahun = belanja.tahun;
                            belanja_paket[i].id_unit = belanja.id_unit;
                            belanja_paket[i].id_skpd = belanja.id_skpd;
                            belanja_paket[i].kode_skpd = belanja.kode_skpd;
                            belanja_paket[i].nama_skpd = belanja.nama_skpd;
                            belanja_paket[i].id_urusan = belanja.id_urusan;
                            belanja_paket[i].kode_urusan = belanja.kode_urusan;
                            belanja_paket[i].nama_urusan = belanja.nama_urusan;
                            belanja_paket[i].id_bidang_urusan = belanja.id_bidang_urusan;
                            belanja_paket[i].kode_bidang_urusan = belanja.kode_bidang_urusan;
                            belanja_paket[i].nama_bidang_urusan = belanja.nama_bidang_urusan;
                            belanja_paket[i].id_sub_skpd = belanja.id_sub_skpd;
                            belanja_paket[i].kode_sub_skpd = belanja.kode_sub_skpd;
                            belanja_paket[i].nama_sub_skpd = belanja.nama_sub_skpd;
                            belanja_paket[i].id_program = belanja.id_program;
                            belanja_paket[i].kode_program = belanja.kode_program;
                            belanja_paket[i].nama_program = belanja.nama_program;
                            belanja_paket[i].id_giat = belanja.id_giat;
                            belanja_paket[i].kode_giat = belanja.kode_giat;
                            belanja_paket[i].nama_giat = belanja.nama_giat;
                            belanja_paket[i].id_sub_giat = belanja.id_sub_giat;
                            belanja_paket[i].kode_sub_giat = belanja.kode_sub_giat;
                            belanja_paket[i].nama_sub_giat = belanja.nama_sub_giat;
                            belanja_paket[i].pagu = belanja.pagu;
							belanja_paket[i].id_akun = belanja.id_akun;
							belanja_paket[i].kode_akun = belanja.kode_akun;
							belanja_paket[i].nama_akun = belanja.nama_akun;
							belanja_paket[i].lokus_akun_teks = belanja.lokus_akun_teks;
							belanja_paket[i].jenis_bl = belanja.jenis_bl;
							belanja_paket[i].is_paket = belanja.is_paket;
							belanja_paket[i].subs_bl_teks = belanja.subs_bl_teks;
							belanja_paket[i].ket_bl_teks = belanja.ket_bl_teks;
							belanja_paket[i].id_standar_harga = belanja.id_standar_harga;
							belanja_paket[i].kode_standar_harga = belanja.kode_standar_harga;

							belanja_paket[i].nama_komponen = belanja.nama_standar_harga.nama_komponen;
							belanja_paket[i].spek_komponen = belanja.nama_standar_harga.spek_komponen;
							
							belanja_paket[i].satuan = belanja.satuan;
							belanja_paket[i].rincian = belanja.rincian;
							belanja_paket[i].pajak = belanja.pajak;
							belanja_paket[i].volume = belanja.volume;
							belanja_paket[i].harga_satuan = belanja.harga_satuan;
							belanja_paket[i].koefisien = belanja.koefisien;
							belanja_paket[i].vol_1 = belanja.vol_1;
							belanja_paket[i].sat_1 = belanja.sat_1;
							belanja_paket[i].vol_2 = belanja.vol_2;
							belanja_paket[i].sat_2 = belanja.sat_2;
							belanja_paket[i].vol_3 = belanja.vol_3;
							belanja_paket[i].sat_3 = belanja.sat_3;
							belanja_paket[i].vol_4 = belanja.vol_4;
							belanja_paket[i].sat_4 = belanja.sat_4;
							belanja_paket[i].id_rinci_sub_bl = belanja.id_rinci_sub_bl;
                            belanja_paket[i].kunci_bl_rinci = belanja.kunci_bl_rinci;
                            belanja_paket[i].urusan_locked = belanja.urusan_locked;
                            belanja_paket[i].bidang_urusan_locked = belanja.bidang_urusan_locked;
                            belanja_paket[i].program_locked = belanja.program_locked;
                            belanja_paket[i].giat_locked = belanja.giat_locked;
                            belanja_paket[i].sub_giat_locked = belanja.sub_giat_locked;
                            belanja_paket[i].akun_locked = belanja.akun_locked;
                            belanja_paket[i].user_created = belanja.user_created;
                            belanja_paket[i].created_date = belanja.created_date;
                            belanja_paket[i].created_time = belanja.created_time;
                            belanja_paket[i].user_updated = belanja.user_updated;
                            belanja_paket[i].updated_date = belanja.updated_date;
                            belanja_paket[i].updated_time = belanja.updated_time;
                            belanja_paket[i].set_zona = belanja.set_zona;
                            belanja_paket[i].totalpajak = belanja.totalpajak;
                            belanja_paket[i].pajakmurni = belanja.pajakmurni;
                        });

						jQuery.ajax({
				            url: config_url_lokal + '?r=sipd/sub-kegiatan-belanja-paket',
				            type: "POST",
				            data: {data : JSON.stringify(belanja_paket)},
				            success: function (data) {
				            	console.log(data);
				            }
				        });
		            }
		        });
	        });

			jQuery('#btn_paket').on('click', function ()
	        {
	            jQuery.ajax({
		            url: lru17,
                	type: 'POST',
                	data : {"_token":tokek},
		            success: function (data_paket) {
		            	console.log(data_paket);
		            }
		        });
	        });
		}
	});
});