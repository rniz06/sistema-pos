<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use \OwenIt\Auditing\Auditable;
    use HasRoles, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'usuario',
        'email',
        'password',
        'activo',
        'ultimo_acceso',
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
            'password'          => 'hashed',
            'activo'            => 'boolean',
            'ultimo_acceso'     => 'datetime',
        ];
    }

    public static function registrarAcceso($id)
    {
        static::findOrFail($id)->update(['ultimo_acceso' => now()]);
    }

    /**
     * Se implementa funcion para buscador general.
     */
    public function scopeBuscador($query, $value)
    {
        if (!empty($value)) {
            $query->where('name', 'like', "%{$value}%")
                ->orWhere('usuario', 'like', "%{$value}%")
                ->orWhere('email', 'like', "%{$value}%")
                ->orWhere('email', 'like', "%{$value}%")
                ->orWhere('activo', 'like', "%{$value}%")
                ->orWhere('ultimo_acceso', 'like', "%{$value}%");
        }
    }

    /**
     * Buscador Por Campo name.
     */
    public function scopeBuscarName($query, $value)
    {
        if (!empty($value)) {
            $query->where('name', 'like', "%{$value}%");
        }
    }

    /**
     * Buscador Por Campo usuario.
     */
    public function scopeBuscarUsuario($query, $value)
    {
        if (!empty($value)) {
            $query->where('usuario', 'like', "%{$value}%");
        }
    }

    /**
     * Buscador Por Campo email.
     */
    public function scopeBuscarEmail($query, $value)
    {
        if (!empty($value)) {
            $query->where('email', 'like', "%{$value}%");
        }
    }

    /**
     * Buscador Por Campo activo.
     */
    public function scopeBuscarActivo($query, $value)
    {
        if (in_array($value, ['0', '1'])) {
            $query->where('activo', $value === '1');
        }
    }
}
