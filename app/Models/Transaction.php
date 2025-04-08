<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
      'key','transaction_number','user_id','pemilik_id','kamar_id','lama_sewa','hari','harga_kamar','harga_total','status','tgl_sewa','end_date_sewa'
    ];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }

    public function pemilik()
    {
      return $this->belongsTo('App\Models\User', 'pemilik_id');
    }

    public function kamar()
    {
      return $this->belongsTo('App\Models\kamar','kamar_id');
    }

    public function payment()
    {
      return $this->hasOne('App\Models\payment','transaction_id');
    }

    public function latestPayment()
    {
        return $this->hasOne(Payment::class, 'transaction_id')->latestOfMany();
    }

    public function payments()
    {
      return $this->hasMany('App\Models\payment','transaction_id');
    }

    public function bank()
    {
      return $this->hasMany('App\Models\DataRekening','user_id','pemilik_id');
    }

    public function review()
    {
      return $this->hasOne(Review::class,'transaksi_id','id');
    }

    public function kondisiBarangMasuk()
    {
        return $this->hasOne(KondisiBarang::class)
                    ->where('type', 'masuk');
    }

    public function kondisiBarangKeluar()
    {
        return $this->hasOne(KondisiBarang::class)
                    ->where('type', 'keluar');
    }

}
