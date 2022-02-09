<?php

namespace MapleSnow\Yaml\Helpers;

use Illuminate\Translation\FileLoader;
use Symfony\Component\Yaml\Parser;

class YamlFileLoader extends FileLoader
{
    protected function getAllowedFileExtensions()
    {
        return ['php', 'yml.php', 'yaml.php', 'yml', 'yaml'];
    }

    protected function loadNamespaceOverrides(array $lines, $locale, $group, $namespace)
    {
        foreach ($this->getAllowedFileExtensions() as $extension)
        {
            $file = "{$this->path}/packages/{$locale}/{$namespace}/{$group}." . $extension;

            if ($this->files->exists($file))
            {
                return $this->replaceLines($extension, $lines, $file);
            }
        }

        return $lines;
    }

    protected function replaceLines($format, $lines, $file)
    {
        return array_replace_recursive($lines, $this->parseContent($format, $file));
    }

    protected function parseContent($format, $file)
    {
        $content = null;

        switch ($format) {
            case 'php':
                $content = $this->files->getRequire($file);
                break;
            case 'yml.php':
            case 'yaml.php':
            case 'yml':
            case 'yaml':
                $parser = new Parser();
                $file_str = file_get_contents($file);

                if (substr($file_str, 0, 5) == '<?php')
                {
                    $content = $parser->parse(substr($file_str, 5));
                }
                else
                {
                    $content = $parser->parse($file_str);
                }

                break;
        }

        return $content;
    }

    protected function loadPath($path, $locale, $group)
    {
        foreach ($this->getAllowedFileExtensions() as $extension)
        {
            if ($this->files->exists($full = "{$path}/{$locale}/{$group}." . $extension))
            {
                return $this->parseContent($extension, $full);
            }
        }

        return [];
    }
}