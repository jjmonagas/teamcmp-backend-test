<?php
/**
 * Created by PhpStorm.
 * User: jjmonagas
 * Date: 23/9/18
 * Time: 16:07
 */

namespace App\Services;


use App\Entity\VideoLink;
use Symfony\Component\Console\Style\SymfonyStyle;

class VideoManager
{

    /**
     * @param array $videoLinks
     */
    public function importVideosInConsole(array $videoLinks, SymfonyStyle $io) :void {
        foreach ($videoLinks as $videoLink) {
            if ($videoLink instanceof VideoLink) {
                $io->section('Importing video: ' . ucfirst($videoLink->getTitle()));
                $io->text('URL: ' . $videoLink->getUrl());
                if ($videoLink->getTags() !== null) {
                    $io->text('Tags: ' . $videoLink->getTags());
                }

                //persist DATA
                $io->comment($videoLink->persist());
            }
        }
    }

}