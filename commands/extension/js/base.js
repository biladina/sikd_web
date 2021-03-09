jQuery(document).ready(function(){
	var current_url = window.location.href;

	if (current_url.indexOf('main/budget/belanja/'+config.tahun_anggaran+'/giat/unit/'+config.id_daerah+'/0') != -1)
	{
        var btn_sub_kegiatan_belanja = '<div class="button">'
            + '<button class="fcbtn btn btn-primary btn-1b" id="btn_sub_kegiatan_belanja">'
            + '<i class="fa fa-cloud-download m-r-5"></i> <span>Ambil Data Sub Kegiatan & Belanja</span>'
            + '</button></div>';

        var btn_belanja_paket = '&nbsp&nbsp'
            + '<button class="fcbtn btn btn-success btn-1b" id="btn_belanja_paket">'
            + '<i class="fa fa-cloud-download m-r-5"></i> <span>Ambil Data Belanja & Paket</span>'
            + '</button>';

        jQuery('.white-box').parent().prepend(btn_sub_kegiatan_belanja);
        jQuery('.button').append(btn_belanja_paket);

        jQuery('#btn_sub_kegiatan_belanja').on('click', function () {
            jQuery.ajax({
	            url: config.url + 'main/budget/belanja/'+config.tahun_anggaran+'/giat/tampil-unit/'+config.id_daerah+'/0',
	            contentType: 'application/json',
	            success: function (data_skpd) {
					for(var i in data_skpd.data)
					{
						var id_unit = data_skpd.data[i].id_unit;

						jQuery.ajax({
				            url: config.url + 'main/budget/belanja/'+config.tahun_anggaran+'/giat/tampil-giat/'+config.id_daerah+'/'+id_unit,
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

		                        // console.log(sub_kegiatan_belanja);

		                        // console.log(config.url_lokal + '?r=sipd/sub-kegiatan-belanja&data='+JSON.stringify(sub_kegiatan_belanja));

		                        jQuery.ajax({
						            // url: config.url_lokal + '?r=sipd/sub-kegiatan-belanja&data='+JSON.stringify(sub_kegiatan_belanja),
						            url: config.url_lokal + '?r=sipd/sub-kegiatan-belanja',
						            type: "POST",
						            data: {data : JSON.stringify(sub_kegiatan_belanja)},
						            success: function (data) {
						            	console.log(data);
						            }
						        });

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
					//             url: config.url + 'main/budget/belanja/'+config.tahun_anggaran+'/giat/tampil-giat/'+config.id_daerah+'/'+id_unit,
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
					//             				var url = config.url + 'main/budget/belanja/'+config.tahun_anggaran+'/rinci/tampil-rincian/'+config.id_daerah+'/'+id_unit+'?kodesbl='+kode_sbl;
					//             				console.log(url);

					//          //    				jQuery.ajax({
					// 					    //         url: config.url + 'main/budget/belanja/'+config.tahun_anggaran+'/rinci/tampil-rincian/'+config.id_daerah+'/'+id_unit+'?kodesbl='+kode_sbl,
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

        jQuery('#btn_belanja_paket').on('click', function () {
        	alert('hai');
        });
    }
});