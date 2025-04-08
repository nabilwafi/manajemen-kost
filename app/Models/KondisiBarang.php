<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiBarang extends Model
{
    use HasFactory;

    protected $table = 'kondisi_barang';

    protected $fillable = [
        'user_id',
        'transaction_id',
        'type',
        'signature_path',
        'barang_1',
        'barang_2',
        'barang_3',
        'barang_4',
        'barang_5',
        'barang_6',
        'barang_7',
        'barang_8',
        'barang_9',
        'barang_10',
        'barang_11',
        'barang_12',
        'barang_13',
        'barang_14',
        'barang_15',
        'barang_16',
        'barang_17',
        'barang_18',
        'barang_19',
        'barang_20',
        'barang_21',
        'barang_22',
        'barang_23',
        'barang_24',
        'barang_25',
    ];
}
