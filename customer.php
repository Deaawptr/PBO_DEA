<?php
class Customer {
    public $id;
    public $nama;
    public $email;
    public $alamat;

    public function __construct($id, $nama, $email, $alamat) {
        $this->id = $id;
        $this->nama = $nama;
        $this->email = $email;
        $this->alamat = $alamat;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'email' => $this->email,
            'alamat' => $this->alamat,
        ];
    }
}
?>
