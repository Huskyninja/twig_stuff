<?php
namespace Drupal\twig_stuff;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class GetFileExtension extends AbstractExtension
{

    /**
     * {@inheritdoc}
     * This function must return the name of the extension. It must be unique.
     */
    public function getName(): string
    {
        return 'get_file_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('get_file_extension', [$this, 'get_file_extension']),
        ];
    }

    /**
     * Return the extension from a file path.
     *
     * @param string $filepath The path of the file.
     * 
     * @return string The file extension.
     */
    public function get_file_extension(string $filepath): string
    {
        $ext = pathinfo($filepath, PATHINFO_EXTENSION);
        return $ext;
    }

}
