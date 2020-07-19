<?php

namespace App\Services\MoneyToWords;

use App\Models\MoneyToWordsTranslation;
use Illuminate\Support\Facades\Cache as LaravelCache;
use Tuforti\MoneyToWords\Contracts\Cache as TranslationCache;

class Cache extends TranslationCache
{
    private static $tags = ['moneytowords', 'translation'];

    /**
     * Get all content in the cache.
     *
     * @return object
     */
    public static function getAll()
    {
        // TODO: Look for a way to return all the contents in laravel cache
        // itseld instead of the db.
        return MoneyToWordsTranslation::all();
    }

    /**
     * Get the caching key for a translation
     *
     * @param int $moneyValue
     * @param Languages $languageTo
     * @return string
     */
    public static function key($moneyValue, $languageTo)
    {
        return "moneytowords-{$languageTo}-{$moneyValue}";
    }

    /**
     * Get translation from cache.
     *
     * @param int moneyInGreekNumeric
     * @param Languages $languageTo
     * @return string
     */
    public static function get($moneyValue, $languageTo)
    {
        $key = static::key($moneyValue, $languageTo);

        // Check Cache
        $cached = LaravelCache::tags(static::$tags)->get($key, null);
        if ($cached) return $cached;

        // Check DB
        $query = ['text' => $moneyValue, 'language' => $languageTo];
        $index = MoneyToWordsTranslation::query()->where($query)->first('translation');

        // Create in cache if exists in db
        if ($index) LaravelCache::tags(static::$tags)->put($key, $index->translation);
        return $index->translation ?? null;
    }

    /**
     * Set tranlation
     *
     * @param int $moneyValue
     * @param Languages $languageTo
     * @param string $translation
     * @return boolean $translation
     */
    public static function set($moneyValue, $languageTo, $translation)
    {
        $key = static::key($moneyValue, $languageTo);

        LaravelCache::tags(static::$tags)->put($key, $translation);

        MoneyToWordsTranslation::create([
            'text' => $moneyValue,
            'language' => $languageTo,
            'translation' => $translation
        ]);

        return $key;
    }
}
