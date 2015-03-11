<?php namespace Frostbite\Misc;

use Storage;

class LangFileUpdater {

    /**
     * @param string $file
     * @param string $key
     * @param string $value
     */
    public function update($file, $key, $value)
    {
        $path     = sprintf('resources/lang/ru/%s.php', $file);
        $contents = Storage::get($path);

        $contents = preg_replace(
            sprintf('/\'%s\'(\s*)=>(\s*)\'(.+)\'/', e($key)),
            sprintf('\'%s\'$1=>$2\'%s\'', e($key), e($value)),
            $contents
        );

        Storage::put($path, $contents);
    }
}
