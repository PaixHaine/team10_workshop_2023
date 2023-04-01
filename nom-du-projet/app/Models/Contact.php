<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DEAD = 'dead';

    const TYPE_B2B = 'b2b';
    const TYPE_B2C = 'b2c';

    const GENRE_1 = 'Lead';
    const GENRE_2 = 'Prospect';
    const GENRE_3 = 'Client';

    public static $genres = [
        self::GENRE_1,
        self::GENRE_2,
        self::GENRE_3,
    ];


    protected $fillable = ['name', 'firstName', 'email', 'phone', 'status', 'type', 'is_interested', 'is_active', 'genre'];

    /**
     * Règles de validation pour la création d'un lead.
     */
    public static $createRules = [
        'name' => 'required|string|max:255',
        'firstName' => 'required|string|max:255',
        'email' => 'required|email|unique:contacts,email',
        'phone' => 'nullable|string|max:255',
        'type' => 'required|in:'.self::TYPE_B2B.','.self::TYPE_B2C,
        'genre' => 'required|in:'.self::GENRE_1.','.self::GENRE_2.','.self::GENRE_3,
        // Ajoutez d'autres règles ici
    ];

    /**
     * Règles de validation pour la modification d'un lead.
     */
    public static $updateRules = [
        'name' => 'required|string|max:255',
        'firstName' => 'required|string|max:255',
        'email' => 'required|email|unique:contacts,email,{contacts}',
        'phone' => 'nullable|string|max:255',
        'status' => 'required|in:'.self::STATUS_IN_PROGRESS.','.self::STATUS_DEAD,
        'type' => 'required|in:'.self::TYPE_B2B.','.self::TYPE_B2C,
        'genre' => 'required|in:'.self::GENRE_1.','.self::GENRE_2.','.self::GENRE_3,
        // Ajoutez d'autres règles ici
    ];

}
