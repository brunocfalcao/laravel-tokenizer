<?php

namespace Brunocfalcao\Tokenizer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Token extends Model
{
    protected $fillable = ['token'];

    public static function createToken()
    {
        return self::create(['token' => Str::random(40)]);
    }

    public static function isValid($token)
    {
        return self::where('token', $token)->exists();
    }

    public static function burn($token)
    {
        $tokenInstance = self::where('token', $token)->first();

        if (! $tokenInstance) {
            throw new \Exception('Token invalid to be burned');
        }

        $tokenInstance->delete();

        return true;
    }
}
