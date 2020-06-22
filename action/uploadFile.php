<?
function uploadFile($name){
    if(!empty($_FILES[$name]['name'])){
        $files  = $_FILES;
        $done_files = array();
    if(count($files[$name]['name'])<1){
        foreach( $files as $file ){
            $file_name = $file['name'];
            if( move_uploaded_file( $file['tmp_name'], "../upload_files/$file_name" ) ){
                $done_files[] = realpath( "../upload_files/$file_name" );
        }
    }
    }else{
        $length=count($files[$name]['name']);
        for($i=0;$i<$length;$i++){
            $file_name = $files[$name]['name'][$i];
            if( move_uploaded_file($files[$name]['tmp_name'][$i], "../upload_files/$file_name" ) ){
                $done_files[] = realpath( "../upload_files/$file_name" );
        }
     }
        
    }
    $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');
}
}