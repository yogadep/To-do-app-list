<?php 
Class aktivitas{

    //koneksi ke database
    private $connection;

    //nama tabel
    private $tabname = "keseharian";

    //kolom tabel
    public $id,
           $nama,
           $isComplete;
    
    public function __construct($connection){
        $this->connection = $connection;
    }

    //membuat aktivitas baru
    public function create(){
        $query = "INSERT INTO $this->tabname (nama) VALUES (?)";

        $statm = $this->connection->prepare($query);

        $statm->execute([$this->nama]);

        return true;
    }
    //read
    public function read(){
        $query = "SELECT id, nama, isComplete FROM $this->tabname";

        $statm = $this->connection->prepare($query);

        $statm->execute();

        return $statm;

    }
    //mengubah riwayat 
    public function update(){
        $query = "UPDATE $this->tabname SET nama = ?, isComplete = ? WHERE id = ?";

        $statm = $this->connection->prepare($query);

        $statm->execute([$this->nama, $this->isComplete, $this->id]);

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