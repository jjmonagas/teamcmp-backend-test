<?php

namespace App\Command;

use App\Entity\DataSource;
use App\Services\VideoManager;
use App\Utils\FileDataSource;
use App\Utils\FtpDataSource;
use App\Utils\ParserFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportVideosCommand extends Command
{
    protected static $defaultName = 'teamcmp:import-videos';

    protected $parserFactory;
    protected $videoManager;
    protected $projectDir;

    /**
     * @var array
     */
    protected $dataSources;


    /**
     * ImportVideosCommand constructor.
     * @param ParserFactory $parserFactory
     * @param VideoManager $videoManager
     * @param string $projectDir
     */
    public function __construct(ParserFactory $parserFactory, VideoManager $videoManager, string $projectDir)
    {
        $this->parserFactory = $parserFactory;
        $this->videoManager = $videoManager;
        $this->projectDir = $projectDir;

        $this->dataSources = [DataSource::GLORF_DATA_SOURCE_COMMAND_NAME, DataSource::FLUB_DATA_SOURCE_COMMAND_NAME];

        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Command line script to import videos')
            ->addArgument('source', InputArgument::REQUIRED, 'Source provider name')
            ->addOption('path', 'p', InputOption::VALUE_REQUIRED, 'Path to feeds', '/feed-exports')
            ->addOption('filename', 'f', InputOption::VALUE_REQUIRED, 'Feed file name')
//            ->addOption('host', 'h', InputOption::VALUE_REQUIRED, 'FTP host')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $source = $input->getArgument('source');

        $path = $input->getOption('path');
        $pathToFeeds = $this->projectDir . $path;

        $fileName = $input->getOption('filename');
        $fileName = $fileName ?? ($source === DataSource::FLUB_DATA_SOURCE_COMMAND_NAME ? 'flub.yaml' : 'glorf.json');

//        $host = $input->getOption('host');

        if (!in_array($source, $this->dataSources)) {
            $io->warning(sprintf('Source %s not found. Please, try again with: %s or %s', $source, DataSource::GLORF_DATA_SOURCE_COMMAND_NAME, DataSource::FLUB_DATA_SOURCE_COMMAND_NAME));
            die();
        }

        //Load data from data source
        $dataSourceManager = null;
        switch ($source) {
            case DataSource::GLORF_DATA_SOURCE_COMMAND_NAME:
            case DataSource::FLUB_DATA_SOURCE_COMMAND_NAME:
                $dataSourceManager = new FileDataSource($pathToFeeds, $fileName);
                break;
            case DataSource::FTP_DATA_SOURCE_COMMAND_NAME:
                $dataSourceManager = new FtpDataSource('host', 'fileName');
        }
        $data = $dataSourceManager->loadData();

        if ($data === null) {
            $io->warning(sprintf('No data to import'));
            die();
        }

        //Parse Data
        $parser = $this->parserFactory->createParserFromSource($source);
        $links = $parser->parse($data);

        //Import videos
        $io->title('Importing videos from ' . strtoupper($source) .'...');
        $this->videoManager->importVideosInConsole($links, $io);

        $io->success('Success!!');
    }



}
