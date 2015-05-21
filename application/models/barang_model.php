<?php
class barang_model extends CI_Model{


	public function gettotalrecordcari($param){
	
		try {
		    $query=$this->db->query("select count(*) as totalrecord from barang where nama_barang ilike '%'||'$param'||'%' ") ;
            return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }	
	}



  
	function cari_barang($param){
		try {
		$totalrecordcari=$this->gettotalrecordcari($param);
		    $query=$this->db->query("SELECT row_number() over (order by kode_barang nulls last) as rownum,'".$totalrecordcari[0]->totalrecord."' as totalrecord, a.kode_barang,b.nama_produk,a.nama_barang,a.satuan,a.harga_beli,a.harga_jual,a.stock FROM barang a
			left join produk b 
			on a.kode_produk=b.kode_produk 
			where a.nama_barang ilike '%'||'$param'||'%'
			order by id") ;
			return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }
	}
	
	
	
	function detail_barang($param){
		try {
		    $query=$this->db->query("SELECT a.kode_barang,b.nama_produk,a.nama_barang,a.satuan,a.harga_beli,a.harga_jual,a.stock FROM barang a
			left join produk b 
			on a.kode_produk=b.kode_produk 
			where a.kode_barang ='$param'
			order by id") ;
			return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }
	}
	
	
	function login($username,$password){
	 $query=$this->db->query("select * from tblmasterpengguna where namauser='$username' and katakunci='$password'");
        return $query->num_rows();
	}
	
	public function gettotalrecord(){
	
		try {
		    $query=$this->db->query("select count(*) as totalrecord from barang") ;
            return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }	
	}
	
	 public function getbarangall()
    {
       try {
	   $totalrecord = $this->gettotalrecord();
		    $query=$this->db->query("SELECT row_number() over (order by a.id nulls last) as rownum,'".$totalrecord[0]->totalrecord."' as totalrecord, a.kode_barang,b.nama_produk,a.nama_barang,a.satuan,a.harga_beli,a.harga_jual,a.stock FROM barang a
			left join produk b 
			on a.kode_produk=b.kode_produk
			order by rownum limit 5") ;
            return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
	
	public function pindahpage($pagestart){
	
		try {
		$totalrecord=$this->gettotalrecord();
		
		    $query=$this->db->query("SELECT row_number() over (order by a.id nulls last) as rownum, a.kode_barang,b.nama_produk,'".$totalrecord[0]->totalrecord."' as totalrecord,a.nama_barang,a.satuan,a.harga_beli,a.harga_jual,a.stock FROM barang a
			left join produk b 
			on a.kode_produk=b.kode_produk order by a.id   limit 5 offset($pagestart * 5)") ;
            return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }	
	
	}
	
	function get_product(){
		try {
		    $query=$this->db->query("select a.kode_produk,a.nama_produk from produk a") ;
            return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }
	}
	
	function simpan_data($kode_barang,$nama_barang,$kode_produk,$satuan,$harga_beli,$harga_jual,$stock){
	try {
		$sql = "INSERT INTO barang(kode_barang,nama_barang,kode_produk,satuan,harga_beli,harga_jual,stock)
        VALUES ('".$kode_barang."','".$nama_barang."','".$kode_produk."','".$satuan."','".$harga_beli."','".$harga_jual."','".$stock."')";
		$this->db->query($sql);
		  }
        
        catch (Exception $e) {
            echo $e->getMessage();
			return $e;
        }	
		
	}
	
	function edit_data($kode_barang,$nama_barang,$kode_produk,$satuan,$harga_beli,$harga_jual,$stock){
	try {
		$sql = "update barang set nama_barang='".$nama_barang."',kode_produk='".$kode_produk."',satuan='".$satuan."',harga_beli='".$harga_beli."',harga_jual='".$harga_jual."',stock='".$stock."' where kode_barang='".$kode_barang."'";
		$this->db->query($sql);
		  }
        catch (Exception $e){
            echo $e->getMessage();
			return $e;
        }	
		
	}
	
	function buat_kode_barang(){
	
		
		try {
		    $query=$this->db->query("select kode_barang from barang order by id desc") ;
            return $query->result();
        
        }
        
        catch (Exception $e) {
            echo $e->getMessage();
        }	
	
	}
	
	function hapus_data($kode_barang){
		try {
		$sql = "delete from barang where kode_barang='".$kode_barang."'";
		$this->db->query($sql);
		  }
        
        catch (Exception $e) {
            echo $e->getMessage();
			return $e;
        }
	}
	
}