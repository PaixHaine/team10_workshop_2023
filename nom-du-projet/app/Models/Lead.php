<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DEAD = 'dead';

    const TYPE_B2B = 'b2b';
    const TYPE_B2C = 'b2c';

    protected $fillable = [
        'name',
        'firstName',
        'email',
        'phone',
        'type',
        // Ajoutez d'autres champs ici
    ];

    /**
     * Règles de validation pour la création d'un lead.
     */
    public static $createRules = [
        'name' => 'required|string|max:255',
        'firstName' => 'required|string|max:255',
        'email' => 'required|email|unique:leads,email',
        'phone' => 'nullable|string|max:255',
        'type' => 'required|in:'.self::TYPE_B2B.','.self::TYPE_B2C,
        // Ajoutez d'autres règles ici
    ];

    /**
     * Règles de validation pour la modification d'un lead.
     */
    public static $updateRules = [
        'name' => 'required|string|max:255',
        'firstName' => 'required|string|max:255',
        'email' => 'required|email|unique:leads,email,{lead}',
        'phone' => 'nullable|string|max:255',
        'type' => 'required|in:'.self::TYPE_B2B.','.self::TYPE_B2C,
        // Ajoutez d'autres règles ici
    ];

}
