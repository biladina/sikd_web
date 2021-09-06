<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use yii\console\ExitCode;
use yii\data\ActiveDataProvider;

class DataController extends Controller
{
    public function actionFungsi()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/fungsi.json'));
        $fungsi = Json::decode($json);

        foreach($fungsi as $fungsi)
        {
            $model = new \app\models\Fungsi();

            $model->kode_fungsi = (strlen((string)$fungsi['kode_fungsi']) > 1) ? (string)$fungsi['kode_fungsi'] : (string)'0'.$fungsi['kode_fungsi'];
            $model->kode_sub_fungsi = (strlen((string)$fungsi['kode_sub_fungsi']) > 1) ? (string)$fungsi['kode_sub_fungsi'] : (string)'0'.$fungsi['kode_sub_fungsi'];
            $model->kode_urusan = (string)$fungsi['kode_urusan'];
            $model->kode_bidang = (strlen((string)$fungsi['kode_bidang']) > 1) ? (string)$fungsi['kode_bidang'] : (string)'0'.$fungsi['kode_bidang'];
            $model->sub_fungsi = $fungsi['sub_fungsi'];
            $model->fungsi = $fungsi['fungsi'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

	public function actionSkpd()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/skpd.json'));
        $skpd = Json::decode($json);

        foreach($skpd as $skpd)
        {
        	$model = new \app\models\Skpd();

        	$model->id_unit = $skpd['id_unit'];
        	$model->id_skpd = $skpd['id_skpd'];
        	$model->kode_skpd = $skpd['kode_skpd'];
        	$model->nama_skpd = $skpd['nama_skpd'];
        	$model->kunci_skpd = $skpd['kunci_skpd'];
        	$model->id_setup_unit = $skpd['id_setup_unit'];
        	$model->is_skpd = $skpd['is_skpd'];
        	$model->posisi = $skpd['posisi'];
        	$model->status = $skpd['status'];

        	if($model->save())
        	{
        		echo "saved";
        	}
        }
    }

    public function actionSubKegiatan()
    {
    	$json = file_get_contents(Yii::getAlias('@app/commands/json/sub_kegiatan.json'));
        $sub_kegiatan = Json::decode($json);

        // $data_sub = [];
        // foreach($sub_kegiatan as $sub_kegiatan)
        // {
        //     $data_sub[] = [
        //         'id_urusan' => $sub_kegiatan['id_urusan'],
        //         'kode_urusan' => $sub_kegiatan['kode_urusan'],
        //         'nama_urusan' => $sub_kegiatan['nama_urusan'],
        //         'id_bidang_urusan' => $sub_kegiatan['id_bidang_urusan'],
        //         'kode_bidang_urusan' => $sub_kegiatan['kode_bidang_urusan'],
        //         'nama_bidang_urusan' => $sub_kegiatan['nama_bidang_urusan'],
        //         'id_program' => $sub_kegiatan['id_program'],
        //         'kode_program' => $sub_kegiatan['kode_program'],
        //         'nama_program' => $sub_kegiatan['nama_program'],
        //         'id_giat' => $sub_kegiatan['id_giat'],
        //         'kode_giat' => $sub_kegiatan['kode_giat'],
        //         'nama_giat' => $sub_kegiatan['nama_giat'],
        //         'id_sub_giat' => $sub_kegiatan['id_sub_giat'],
        //         'kode_sub_giat' => $sub_kegiatan['kode_sub_giat'],
        //         'nama_sub_giat' => $sub_kegiatan['nama_sub_giat'],
        //         'is_locked' => $sub_kegiatan['is_locked'],
        //         'status' => $sub_kegiatan['status']
        //     ];
        // }

        // Yii::$app->db->createCommand()
        //     ->batchInsert(\app\models\SubKegiatan::tableName(),
        //     [
        //         'id_urusan',
        //         'kode_urusan',
        //         'nama_urusan',
        //         'id_bidang_urusan',
        //         'kode_bidang_urusan',
        //         'nama_bidang_urusan',
        //         'id_program',
        //         'kode_program',
        //         'nama_program',
        //         'id_giat',
        //         'kode_giat',
        //         'nama_giat',
        //         'id_sub_giat',
        //         'kode_sub_giat',
        //         'nama_sub_giat',
        //         'is_locked',
        //         'status'
        //     ], $data_sub)
        //     ->execute();


        foreach($sub_kegiatan as $sub_kegiatan)
        {
        	$model = new \app\models\SubKegiatan();

        	$model->id_urusan = $sub_kegiatan['id_urusan'];
        	$model->kode_urusan = $sub_kegiatan['kode_urusan'];
        	$model->nama_urusan = $sub_kegiatan['nama_urusan'];
        	$model->id_bidang_urusan = $sub_kegiatan['id_bidang_urusan'];
        	$model->kode_bidang_urusan = $sub_kegiatan['kode_bidang_urusan'];
        	$model->nama_bidang_urusan = $sub_kegiatan['nama_bidang_urusan'];
        	$model->id_program = $sub_kegiatan['id_program'];
        	$model->kode_program = $sub_kegiatan['kode_program'];
        	$model->nama_program = $sub_kegiatan['nama_program'];
        	$model->id_giat = $sub_kegiatan['id_giat'];
        	$model->kode_giat = $sub_kegiatan['kode_giat'];
        	$model->nama_giat = $sub_kegiatan['nama_giat'];
        	$model->id_sub_giat = $sub_kegiatan['id_sub_giat'];
        	$model->kode_sub_giat = $sub_kegiatan['kode_sub_giat'];
        	$model->nama_sub_giat = $sub_kegiatan['nama_sub_giat'];
        	$model->is_locked = $sub_kegiatan['is_locked'];
        	$model->status = $sub_kegiatan['status'];

        	if($model->save())
        	{
        		echo "saved";
        	}
        }
    }

    public function actionUrusanBidang()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/urusan_bidang.json'));
        $urusan_bidang = Json::decode($json);

        foreach($urusan_bidang as $urusan_bidang)
        {
            $model = new \app\models\UrusanBidang();
            $model->id_bidang_urusan = $urusan_bidang['id_bidang_urusan'];
            $model->tahun = $urusan_bidang['tahun'];
            $model->id_daerah = $urusan_bidang['id_daerah'];
            $model->id_urusan = $urusan_bidang['id_urusan'];
            $model->id_fungsi = $urusan_bidang['id_fungsi'];
            $model->kode_urusan = $urusan_bidang['kode_urusan'];
            $model->nama_urusan = $urusan_bidang['nama_urusan'];
            $model->kode_bidang_urusan = $urusan_bidang['kode_bidang_urusan'];
            $model->nama_bidang_urusan = $urusan_bidang['nama_bidang_urusan'];
            $model->id_unik = $urusan_bidang['id_unik'];
            $model->is_locked = $urusan_bidang['is_locked'];
            $model->created_user = $urusan_bidang['created_user'];
            $model->created_at = $urusan_bidang['created_at'];
            $model->status = $urusan_bidang['status'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

    public function actionAkunBelanja()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/akun_belanja.json'));
        $akun_belanja = Json::decode($json);

        foreach($akun_belanja as $akun_belanja)
        {
            $model = new \app\models\AkunBelanja();
            $model->id_akun = $akun_belanja['id_akun'];
            $model->tahun = $akun_belanja['tahun'];
            $model->id_daerah = $akun_belanja['id_daerah'];
            $model->kode_akun = $akun_belanja['kode_akun'];
            $model->nama_akun = $akun_belanja['nama_akun'];
            $model->is_pendapatan = $akun_belanja['is_pendapatan'];
            $model->is_bl = $akun_belanja['is_bl'];
            $model->is_pembiayaan = $akun_belanja['is_pembiayaan'];
            $model->id_unik = $akun_belanja['id_unik'];
            $model->is_locked = $akun_belanja['is_locked'];
            $model->set_input = $akun_belanja['set_input'];
            $model->set_lokus = $akun_belanja['set_lokus'];
            $model->is_gaji_asn = $akun_belanja['is_gaji_asn'];
            $model->is_barjas = $akun_belanja['is_barjas'];
            $model->is_bunga = $akun_belanja['is_bunga'];
            $model->is_subsidi = $akun_belanja['is_subsidi'];
            $model->is_bagi_hasil = $akun_belanja['is_bagi_hasil'];
            $model->is_bankeu_umum = $akun_belanja['is_bankeu_umum'];
            $model->is_bankeu_khusus = $akun_belanja['is_bankeu_khusus'];
            $model->is_btt = $akun_belanja['is_btt'];
            $model->is_hibah_brg = $akun_belanja['is_hibah_brg'];
            $model->is_hibah_uang = $akun_belanja['is_hibah_uang'];
            $model->is_sosial_brg = $akun_belanja['is_sosial_brg'];
            $model->is_sosial_uang = $akun_belanja['is_sosial_uang'];
            $model->is_bos = $akun_belanja['is_bos'];
            $model->is_modal_tanah = $akun_belanja['is_modal_tanah'];
            $model->status = $akun_belanja['status'];
            $model->belanja = $akun_belanja['belanja'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

    public function actionBelanja()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/belanja/belanja.json'));
        $belanja = Json::decode($json);

        foreach($belanja as $belanja)
        {
            $model = new \app\models\Belanja();
            $model->id_urusan = $belanja['id_urusan'];
            $model->kode_urusan = $belanja['kode_urusan'];
            $model->nama_urusan = $belanja['nama_urusan'];
            $model->id_bidang_urusan = $belanja['id_bidang_urusan'];
            $model->kode_bidang_urusan = $belanja['kode_bidang_urusan'];
            $model->nama_bidang_urusan = $belanja['nama_bidang_urusan'];
            $model->id_program = $belanja['id_program'];
            $model->kode_program = $belanja['kode_program'];
            $model->nama_program = $belanja['nama_program'];
            $model->kode_skpd = $belanja['kode_skpd'];
            $model->nama_skpd = $belanja['nama_skpd'];
            $model->kode_sub_skpd = $belanja['kode_sub_skpd'];
            $model->nama_sub_skpd = $belanja['nama_sub_skpd'];
            $model->id_giat = $belanja['id_giat'];
            $model->kode_giat = $belanja['kode_giat'];
            $model->nama_giat = $belanja['nama_giat'];
            $model->id_sub_giat = $belanja['id_sub_giat'];
            $model->kode_sub_giat = $belanja['kode_sub_giat'];
            $model->nama_sub_giat = $belanja['nama_sub_giat'];
            $model->kode_akun = $belanja['kode_akun'];
            $model->nama_akun = $belanja['nama_akun'];
            $model->rincian = $belanja['rincian'];

            if($model->save())
            {
                echo "saved";
            }
        }
    }

    public function actionRealisasi()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/realisasi/realisasi.json'));
        $realisasi = Json::decode($json);

        foreach($realisasi as $realisasi)
        {
            $model = new \app\models\Realisasi();
            $model->tahun = $realisasi['tahun'];
            $model->id_unit = $realisasi['id_unit'];
            $model->id_skpd = $realisasi['id_skpd'];
            $model->kode_skpd = $realisasi['kode_skpd'];
            $model->nama_skpd = $realisasi['nama_skpd'];
            $model->id_urusan = $realisasi['id_urusan'];
            $model->kode_urusan = $realisasi['kode_urusan'];
            $model->nama_urusan = $realisasi['nama_urusan'];
            $model->id_bidang_urusan = $realisasi['id_bidang_urusan'];
            $model->kode_bidang_urusan = $realisasi['kode_bidang_urusan'];
            $model->nama_bidang_urusan = $realisasi['nama_bidang_urusan'];
            $model->id_sub_skpd = $realisasi['id_sub_skpd'];
            $model->kode_sub_skpd = $realisasi['kode_sub_skpd'];
            $model->nama_sub_skpd = $realisasi['nama_sub_skpd'];
            $model->id_program = $realisasi['id_program'];
            $model->kode_program = $realisasi['kode_program'];
            $model->nama_program = $realisasi['nama_program'];
            $model->id_giat = $realisasi['id_giat'];
            $model->kode_giat = $realisasi['kode_giat'];
            $model->nama_giat = $realisasi['nama_giat'];
            $model->id_sub_giat = $realisasi['id_sub_giat'];
            $model->kode_sub_giat = $realisasi['kode_sub_giat'];
            $model->nama_sub_giat = $realisasi['nama_sub_giat'];
            $model->id_akun = $realisasi['id_akun'];
            $model->kode_akun = $realisasi['kode_akun'];
            $model->nama_akun = $realisasi['nama_akun'];
            $model->rincian = $realisasi['rincian'];
            $model->LEN = $realisasi['LEN'];
            $model->id_skpd_id_sub_skpd_id_sub_giat_id_akun = $realisasi['id_skpd_id_sub_skpd_id_sub_giat_id_akun'];
            $model->realisasi = $realisasi['realisasi'];
            $model->kode_jenis = $realisasi['kode_jenis'];
            $model->nama_jenis = $realisasi['nama_jenis'];

            if($model->save())
            {
                echo $model->nama_akun." saved\n";
            }
            else
            {
                var_dump($model->errors);
            }
        }
    }

    public function actionRealisasiDetail()
    {
        $json = file_get_contents(Yii::getAlias('@app/commands/json/realisasi/realisasi_detail.json'));
        $realisasi = Json::decode($json);

        foreach($realisasi as $realisasi)
        {
            $data_realisasi = \app\models\Realisasi::findOne([
                'nama_skpd' => $realisasi['namaSkpd'],
                'nama_program' => $realisasi['nama_program'],
                'nama_giat' => $realisasi['nama_kegiatan'],
                'nama_sub_giat' => $realisasi['nama_sub_kegiatan'],
                'kode_akun' => $realisasi['kode_rekening'],
                'nama_akun' => $realisasi['nama_rekening'],
            ]);

            $model = new \app\models\RealisasiDetail();
            $model->tahun = $data_realisasi['tahun'];
            $model->id_unit = $data_realisasi['id_unit'];
            $model->id_skpd = $data_realisasi['id_skpd'];
            $model->kode_skpd = $data_realisasi['kode_skpd'];
            $model->nama_skpd = $data_realisasi['nama_skpd'];
            $model->id_urusan = $data_realisasi['id_urusan'];
            $model->kode_urusan = $data_realisasi['kode_urusan'];
            $model->nama_urusan = $data_realisasi['nama_urusan'];
            $model->id_bidang_urusan = $data_realisasi['id_bidang_urusan'];
            $model->kode_bidang_urusan = $data_realisasi['kode_bidang_urusan'];
            $model->nama_bidang_urusan = $data_realisasi['nama_bidang_urusan'];
            $model->id_sub_skpd = $data_realisasi['id_sub_skpd'];
            $model->kode_sub_skpd = $data_realisasi['kode_sub_skpd'];
            $model->nama_sub_skpd = $data_realisasi['nama_sub_skpd'];
            $model->id_program = $data_realisasi['id_program'];
            $model->kode_program = $data_realisasi['kode_program'];
            $model->nama_program = $data_realisasi['nama_program'];
            $model->id_giat = $data_realisasi['id_giat'];
            $model->kode_giat = $data_realisasi['kode_giat'];
            $model->nama_giat = $data_realisasi['nama_giat'];
            $model->id_sub_giat = $data_realisasi['id_sub_giat'];
            $model->kode_sub_giat = $data_realisasi['kode_sub_giat'];
            $model->nama_sub_giat = $data_realisasi['nama_sub_giat'];
            $model->id_akun = $data_realisasi['id_akun'];
            $model->kode_akun = $data_realisasi['kode_akun'];
            $model->nama_akun = $data_realisasi['nama_akun'];
            $model->rincian = $data_realisasi['rincian'];
            $model->LEN = $data_realisasi['LEN'];
            $model->id_skpd_id_sub_skpd_id_sub_giat_id_akun = $data_realisasi['id_skpd_id_sub_skpd_id_sub_giat_id_akun'];
            $model->jlh_realisasi = $data_realisasi['realisasi'];
            $model->kode_jenis = $data_realisasi['kode_jenis'];
            $model->nama_jenis = $data_realisasi['nama_jenis'];

            $model->no_dokumen = $realisasi['no_dokumen'];
            $model->ket_dokumen = $realisasi['ket_dokumen'];
            $model->realisasi = $realisasi['nilai_realisasi'];

            $tgl_dokumen = explode("/", $realisasi['tgl_dokumen']);
            $model->tgl_dokumen = $tgl_dokumen[2]."-".$tgl_dokumen[0]."-".$tgl_dokumen[1];

            if($model->save())
            {
                echo $model->nama_akun." saved\n";
            }
            else
            {
                var_dump($model->errors);
            }
        }
    }
}