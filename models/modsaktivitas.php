<?php 
Class aktivitas{

    //koneksi ke database
    private $connection;

    //nama tabel
    private $tabname = "keseharian";

    //kolom tabel
    public $id,
           $nama,
           $status;
    
    public function __construct($connection){
        $this->connection = $connection;
    }

    //membuat aktivitas baru
    public function create(){
        $query = "INSERT INTO $this->tabname (nama, status) VALUES (?, ?)";

        $statm = $this->connection->prepare($query);

        $statm->execute([$this->nama, $this->status]);

        return true;
    }
    //read
    public function read(){
        $query = "SELECT id, nama, status FROM $this->tabname";

        $statm = $this->connection->prepare($query);

        $statm->execute();

        return $statm;

    }
    //mengubah status 
    public function update(){
        $query = "UPDATE $this->tabname SET nama = ?, status = ? WHERE id = ?";

        $statm = $this->connection->prepare($query);

        $statm->execute([$this->nama, $this->status, $this->id]);

        return true;
    }
    //menghapus aktivitas 
    public function delete(){
        $query = "DELETE FROM $this->tabname WHERE id = ?";

        $statm = $this->connection->prepare($query);

        $statm->execute();

        return true;
    }

}

?>