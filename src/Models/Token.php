<?php

namespace Brunocfalcao\Tokenizer\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Token extends Model
{
    use SoftDeletes;

    protected $fillable = ['token'];

    public static function createToken(?string $token = null)
    {
        return self::create(['token' => $token ?? Str::random(40)]);
    }

    public static function isValid($token)
    {
        return self::where('token', $token)->exists();
    }

    public static function burn(string $token, $forceDelete = false)
    {
        $tokenInstance = self::firstWhere('token', $token);

        if (! $tokenInstance) {
            throw new \Exception('Token unexistent or already burned ('.$token.')');
        }

        $forceDelete ? $tokenInstance->forceDelete() : $tokenInstance->delete();

        return true;
    }
}
