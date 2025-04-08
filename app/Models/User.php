<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','credit','no_wa', 'alamat_ktp', 'kontak_darurat', 'hubungan_kontak', 'pekerjaan', 'penyakit', 'agama'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kamar()
    {
        return $this->hasOne(kamar::class);
    }

    public function dataRekening()
    {
      return $this->hasOne(DataRekening::class);
    }

    public function payment()
    {
      return $this->hasOne(payment::class);
    }

    public function transaksi()
    {
      return $this->hasMany(Transaction::class,'pemilik_id','id');
    }

    public function transaksi_user()
    {
      return $this->belongsToMany(Transaction::class);
    }

    public function testimoni()
    {
      return $this->hasOne(Testimoni::class);
    }

    public function simpanKamar()
    {
      return $this->hasOne(SimpanKamar::class);
    }

    public function simpanKamars()
    {
      return $this->hasMany(SimpanKamar::class)->limit(4);
    }

    public function getIncompleteFields(): array
    {
      $requiredFields = [
          'no_wa',
          'foto',
          'alamat_ktp',
          'kontak_darurat',
          'hubungan_kontak',
          'pekerjaan',
          'penyakit',
          'agama',
          'buku_nikah',
          'ktp_upload',
          'no_ktp',
          'nama_kampus_kantor',
          'alamat_kampus_kantor',
          'nama_keluarga',
          'alamat_keluarga'
      ];

      $incomplete = [];

      foreach ($requiredFields as $field) {
          if (empty($this->$field)) {
              $incomplete[] = $field;
          }
      }

      return $incomplete;
    }

    public function isProfileComplete(): bool
    {
        return count($this->getIncompleteFields()) === 0;
    }

    public function getIsFullyVerifiedAttribute(): bool
    {
        $verified = explode(',', $this->verified ?? '');
        $required = ['ktp', 'buku_nikah', 'profile'];

        return count(array_intersect($required, $verified)) === count($required);
    }
}
