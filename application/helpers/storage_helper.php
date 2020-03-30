<?php
    function get_logo($file_name)
    {
        $default = base_url('./assets/images/person-flat.png');
        if (empty($file_name)) return $default;
        $file = "./assets/images/avatar/$file_name";
        if(!file_exists($file)) {
            return $default;
        }
        return base_url($file);
    }

    function storage_upload_siup()
    {
        $folder_tujuan = './assets/dokumen_siup/';

		return $folder_tujuan;
    }

    function get_siup($file_name)
    {
        $default = base_url('./assets/not.png');
        if (empty($file_name)) return $default;
        $file = "./assets/dokumen_siup/$file_name";
        if(!file_exists($file)) {
            return $default;
        }
        return base_url($file);
    }

    function storage_upload_situ()
    {
        $folder_tujuan = './assets/dokumen_situ/';

		return $folder_tujuan;
    }

    function get_situ($file_name)
    {
        $default = base_url('./assets/not.png');
        if (empty($file_name)) return $default;
        $file = "./assets/dokumen_situ/$file_name";
        if(!file_exists($file)) {
            return $default;
        }
        return base_url($file);
    }

    function storage_upload_imb()
    {
        $folder_tujuan = './assets/dokumen_imb/';

		return $folder_tujuan;
    }

    function get_imb($file_name)
    {
        $default = base_url('./assets/not.png');
        if (empty($file_name)) return $default;
        $file = "./assets/dokumen_imb/$file_name";
        if(!file_exists($file)) {
            return $default;
        }
        return base_url($file);
    }

    function storage_upload_ktp()
    {
        $folder_tujuan = './assets/foto_ktp/';

		return $folder_tujuan;
    }

    function get_ktp($file_name)
    {
        $default = base_url('./assets/not.png');
        if (empty($file_name)) return $default;
        $file = "./assets/foto_ktp/$file_name";
        if(!file_exists($file)) {
            return $default;
        }
        return base_url($file);
    }

    function storage_upload_logo()
    {
        $folder_tujuan = './assets/logo/';

		return $folder_tujuan;
    }

    function get_barcode($file_name)
    {
        $default = base_url('./assets/not.png');
        if (empty($file_name)) return $default;
        $file = "./assets/barcode/$file_name";
        if(!file_exists($file)) {
            return $default;
        }
        return base_url($file);
    }
?>