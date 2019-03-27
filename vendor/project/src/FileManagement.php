<?php 

namespace Project;

// $file = $_FILES['exemplo'], $imgName = 'nome da imagem', $prefixName = "IMG_"

class FileManagement {


    public static function uploadPhoto($file = array(), $imgName = 'default_name', $prefixName = null) {

        if ($imgName === 'default_name') {

            date_default_timezone_set("America/Sao_Paulo");

            $imgName = 'IMG_' . date('Ymd_H-i-s' ,time());

        }

        //Espera um arry da superglobal $_FILES

        if ($file['error']) {
            throw new Exception('Erro no upload: ' . $file['error']);
        }

        //Extensão do arquivo
        $ext = explode('.',$file['name']);
        $ext = strtolower(end($ext));

        // Extensões permitidas
        $allowedExt = ['jpg', 'png', 'jpeg'];

        if (!in_array($ext, $allowedExt)) {
            throw new Exception('Arquivo não suportado, envie um arquivo jpg, jpeg ou png');
        }

        $dirUpload = 'profile'; // Diretório dos uploads

        if (!is_dir($dirUpload)) {
            mkdir($dirUpload);
        }

        if ($prefixName === null) {

            $filePath = $dirUpload . DIRECTORY_SEPARATOR . $imgName . '.' . $ext;

        } else {

            $filePath = $dirUpload . DIRECTORY_SEPARATOR . $prefixName . $imgName . '.' . $ext;

        }
       
        move_uploaded_file($file['tmp_name'], $filePath);

        //verifica se o arquivo agora existe

        if (file_exists($filePath)) {

            // Altera o filePath para o padrão UNIX
            $filePath = '/' . str_replace("\\", "/", $filePath);

            return array(

                'url'   => $filePath,
                'type'  => $ext,
                'size'  => $file['size']

            );

        } else {

            return false;

        }

        // Ideia para implementação

        /*
            $user = new User();

            $file = $_FILES['img_user'];

            $upload = $user->uploadPhoto($file);

            if ($upload) {
                $user->setAvatar($upload['url']);
            }
        
        
        */
        
    }


}


?>