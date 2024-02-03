<?php

namespace Brunocfalcao\Tokenizer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Token extends Model
{
    use SoftDeletes;

    protected $fillable = ['token'];

    public static function createToken()
    {
        return self::create(['token' => Str::random(40)]);
    }

    public static function isValid($token)
    {
        return self::where('token', $token)->exists();
    }

    public static function burn(string $token)
    {
        $tokenInstance = self::firstWhere('token', $token);

        var_dump('|' . $tokenInstance->id . ' - ' . $token);

        if (! $tokenInstance) {
            throw new \Exception('Token unexistent or already burned ('.$tokenInstance.')');
        }

        $tokenInstance->delete();

        return true;
    }
}
