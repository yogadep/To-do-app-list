<?php 
Class aktivitas{

    //koneksi ke database
    private $connection;

    //nama tabel
    private $tabname = "keseharian";

    //kolom tabel
    public $id,
           $nama,
           $riwayat;
    
    public function __construct($connection){
        $this->connection = $connection;
    }

    //membuat aktivitas baru
    public function create(){
        $query = "INSERT INTO $this->tabname (nama, riwayat) VALUES (?, ?)";

        $statm = $this->connection->prepare($query);

        $statm->execute([$this->nama, $this->riwayat]);

        return true;
    }
    //read
    public function read(){
        $query = "SELECT id, nama, riwayat FROM $this->tabname";

        $statm = $this->connection->prepare($query);

        $statm->execute();

        return $statm;

    }
    //mengubah riwayat 
    public function update(){
        $query = "UPDATE $this->tabname SET nama = ?, riwayat = ? WHERE id = ?";

        $statm = $this->connection->prepare($query);

        $statm->execute([$this->nama, $this->riwayat, $this->id]);

        return true;
    }
    //menghapus aktivitas 
    public function delete(){
        $query = "DELETE FROM $this->tabname WHERE id = ?";

        $statm = $this->connection->prepare($query);

        $statm->execute([$this->id]);

        return true;
    }

}

?>