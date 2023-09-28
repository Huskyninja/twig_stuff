<?php
namespace Drupal\twig_stuff;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GetUrlFromFid extends AbstractExtension
{

    /**
     * {@inheritdoc}
     * This function must return the name of the extension. It must be unique.
     */
    public function getName(): string
    {
        return 'get_url_from_fid';
    }

    /**
     * {@inheritdoc}
     * In this function we can declare the extension function
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_url_from_fid',
                [$this, 'get_url_from_fid'],
                ['is_safe' => ['html']]
            )
        ];
    }

    /**
     * Return a URL string from the id of a file.
     *
     * @param mixed $fid The id of the file.
     * 
     * @return string|bool The FQDN URL link to the file.
     */
    public function get_url_from_fid(mixed $fid): mixed
    {
        $file = \Drupal\file\Entity\File::load($fid);
        if (!is_null($file)) {
            $uri  = $file->getFileUri();
            $name = $file->getFileName();
            $url  = \Drupal::service('file_url_generator')->generateAbsoluteString($uri);
            return '<a href="' . $url . '">' . $name . '</a>';
        } else {
            return false;
        }
    }

}
