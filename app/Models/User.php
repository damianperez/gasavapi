<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
      "id",
      "Nro_socio",
      "Apellido y nombre",
      "Lugar de pago",
      "Actividad",
      "Domicilio",
      "telefono 1",
      "telefono 2",
      "E-Mail",
      "Pago hasta",
      "Estado",
      "Fecha de alta",
      "Fecha de baja",
      "Observaciones",
      "Antiguedad",
      "Observaciones Comision Directiva",
      'password',
      'email',

    
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
     protected $attributes = [
        "Nro_socio" => 0,                 
        "Lugar de pago" => 'no definido',
      "Actividad" => 'no definido',
      "Domicilio" =>'',
      "telefono 1"=>'',
      "telefono 2"=>'',
      "E-Mail"=>'',
      "Pago hasta"=>'',
      "Estado"=>'',
      "Fecha de alta"=>'1900-01-01',
      "Fecha de baja"=>'5000-01-01',
      "Observaciones"=>'',
      "Antiguedad"=>'',
      "Observaciones Comision Directiva"=>'',
      'email'=>'',

      
    ];
}
