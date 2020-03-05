<?php
class Fileupload extends CI_Upload
{
    public $data = array();
    // Settings
    public $save_path;                // The path were we will save the file (getcwd() may not be reliable and should be tested in your environment)
    public $field_name;                            // change this accordingly
    public $max_file_size = 4096;                // 2GB in kb
    public $allowed_mime_type_arr = array('application/pdf', 'image/gif', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
    public $file_name = '';
    // public $backlist = array('php', 'php3', 'php4', 'phtml', 'exe'); // Restrict file extensions
    // Other variables    
    public $regex_rules = FALSE;
    public $valid_chars_regex = 'A-Za-z0-9_-\s '; // Characters allowed in the file name (in a Regular Expression format)
    public $MAX_FILENAME_LENGTH = 255;
    public $replace_old_name = FALSE;
    public $crypt_name = FALSE;
    public $uploadErrors = array(
        0 => 'There is no error, the file uploaded with success',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder'
    );

    public function __construct($config = array())
    {

        empty($config) OR $this->initialize($config, FALSE);
        $this->_CI =& get_instance();
        parent::__construct();
        // $this->allowed_types = $this->allowed_mime_type_arr;
        // $this->data['max_size'] = config_item('max_size');
        $this->max_size = $this->max_file_size;
        $this->upload_path = $this->save_path;
        $this->allowed_types = '*';
        $this->file_name = $this->file_name;
        $this->overwrite = $this->replace_old_name;
        $this->encrypt_name = $this->crypt_name;
        $this->__checkServerSettings();
    }

    public function __allowed_types()
    {
        $data = array();
        foreach ($this->allowed_mime_type_arr as $type) {
            $data = end(explode('/', $type));
            $output[] = $data;
        }
        $output = implode('|', $output);
        return $output;
    }
    private function __checkServerSettings()
    {
        $postSize = $this->__toBytes(ini_get('post_max_size'));
        $uploadSize = $this->__toBytes(ini_get('upload_max_filesize'));

        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit) {
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';
            // $this->data['error'] = 'increase post_max_size and upload_max_filesize to '. $size;
            $this->data['error'] =  $this->handle_errors('increase post_max_size and upload_max_filesize to' . $size);
            die($this->data);
        }
    }

    private function __toBytes($str)
    {
        $val = trim($str);
        $last = strtolower($str[strlen($str) - 1]);
        switch ($last) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return $val;
    }


    public function handle_upload()
    {
        if (isset($_FILES[$this->field_name])) {
            $_file = $_FILES[$this->field_name];
        }
        $this->file_size = $_file['size'];

        if (!is_writable($this->save_path)) {
            $this->handle_errors('Server error. file direktori ' . $this->save_path . ' tidak tersedia.');
            return FALSE;
        }
        if (!isset($_file)) {
            $this->handle_errors('Field ' . $this->field_name . ' tidak tersedia.');
            return FALSE;
        }

        if (isset($_file['error']) && $_file['error'] !=  0) {
            $this->handle_errors($this->uploadErrors[$_file['error']]);
            return FALSE;
        }

        if (!isset($_file['name'])) {
            $this->handle_errors('File tidak memiliki nama');
            return FALSE;
        }

        if ($this->file_size > 0) {
            $this->file_size = round($this->file_size / 1024, 2);
        }

        if (!$this->is_allowed_filesize()) {
            $this->handle_errors('Kapasitas File tidak boleh melebih '. $this->max_file_size.' kb');
            return FALSE;
        }

        if (in_array($this->__checkMime(), $this->allowed_mime_type_arr)) {
            return true;
        }else{
            $this->handle_errors('File yang dipilih tidak diizinkan');
            return false;
        }

        if ($this->regex_rules == TRUE) {
            // Validate file name (for our purposes we'll just remove invalid characters)
            if (!$this->__checkFilenameLength()) {
                $this->handle_errors('Nama File tidak Valid (valid : huruf besar, huruf kecil, dan angka)');
                return FALSE;
            }
        } else {
            $this->orig_name = $this->file_name;
            if (FALSE === ($this->file_name = $this->__set_filename($this->save_path, $this->file_name))) {
                return FALSE;
            }
        }

        return $this;
    }

    private function __set_filename($path, $filename)
    {
        if ($this->encrypt_name === TRUE) {
            $filename = md5(uniqid(mt_rand())) . $this->file_ext;
        }

        if ($this->overwrite === TRUE or !file_exists($path . $filename)) {
            return $filename;
        }

        $filename = str_replace($this->file_ext, '', $filename);

        $new_filename = '';
        for ($i = 1; $i < $this->max_filename_increment; $i++) {
            if (!file_exists($path . $filename . '_' . $i . $this->file_ext)) {
                $new_filename = $filename . '_' . $i . $this->file_ext;
                break;
            }
        }

        if ($new_filename === '') {
            $this->set_error('upload_bad_filename', 'debug');
            return FALSE;
        } else {
            return $new_filename;
        }
    }
    public function __checkMime()
    {
        $mime = get_mime_by_extension($_FILES[$this->field_name]['name']);
      
        return $mime;
    }

    private function __checkRegex()
    {
        if (!$this->valid_chars_regex) {
            return false;
        }
        $this->file_name = preg_replace('/[^' . $this->valid_chars_regex . ']|\.+$/i', '', strtolower(basename($_FILES[$this->field_name]['name'])));
        return   $this->file_name;
    }

    private function __checkFilenameLength()
    {
        if (strlen($this->__checkRegex()) == 0 || strlen($this->__checkRegex()) > $this->MAX_FILENAME_LENGTH) {
            return false;
        }
        return;
    }

    public function handle_errors($msg)
    {
        parent::set_error($msg);
    }
}
