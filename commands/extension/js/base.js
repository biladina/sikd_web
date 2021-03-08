jQuery(document).ready(function(){
	var current_url = window.location.href;

	if (current_url.indexOf('main/budget/belanja/'+config.tahun_anggaran+'/giat/unit/'+config.id_daerah+'/0') != -1)
	{
        var btn_sub_kegiatan_belanja = ''
            + '<button class="fcbtn btn btn-primary btn-outline btn-1b" id="btn_sub_kegiatan_belanja">'
            + '<i class="fa fa-cloud-download m-r-5"></i> <span>Ambil Data Sub Kegiatan & Belanja</span>'
            + '</button>';
        jQuery('.white-box').parent().prepend(btn_sub_kegiatan_belanja);

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
				            success: function (data_sub_kegiatan_belanja) {
								var jlh = 0;
				            	for(var i in data_sub_kegiatan_belanja.data)
								{
									if(data_sub_kegiatan_belanja.data[i].rincian > 0)
				            		{
				            			var id_unit = data_sub_kegiatan_belanja.data[i].id_unit;
				            			var kode_sbl = data_sub_kegiatan_belanja.data[i].kode_sbl;
				            			console.log(id_unit);
				            			jlh++;
				            		}
				            	}
				            	console.log(jlh);
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
    }
});