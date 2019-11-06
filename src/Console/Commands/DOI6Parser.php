<?php

namespace DOIWeb\Console\Commands;

use Illuminate\Console\Command;
use DOIWeb\Parser\OperacaoParser;
use DOIWeb\Parser\AdquirenteParser;
use DOIWeb\Parser\AlienanteParser;
use DOIWeb\Parser\ControleParser;
use DOIWeb\Package\DeclaracaoOperacaoImobiliaria;
use RuntimeException;

class DOI6Parser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doiweb:doi6parser {--filepath=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse DOI file';

    protected $operacaoParser;
    protected $alienanteParser;
    protected $adquirenteParser;
    protected $controleParser;

    /**
     * Buffer Size
     */
    const BUFFER_SIZE = 512;

    /**
     * Register Payload
     */
    const REGISTER_PAYLOAD = 367;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        OperacaoParser $operacaoParser,
        AlienanteParser $alienanteParser,
        AdquirenteParser $adquirenteParser,
        ControleParser $controleParser
    ) {
        parent::__construct();

        $this->operacaoParser = $operacaoParser;
        $this->alienanteParser = $alienanteParser;
        $this->adquirenteParser = $adquirenteParser;
        $this->controleParser = $controleParser;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filepath = $this->option('filepath');

        if (!$filepath) {
            $this->info("The filepath cannot be empty");
            return;
        } else if (!file_exists($filepath)) {
            $this->info("File '$filepath' could not be found");
            return;
        }

        $handle = fopen($filepath, 'r');

        if (!$handle) {
            var_dump("Failed to open file '$filepath'");
            return;
        }

        $doi = new DeclaracaoOperacaoImobiliaria();

        $regCount = 0;

        while (!feof($handle)) {
            $line = fgets($handle, self::BUFFER_SIZE);

            if (!$line) {
                continue;
            } else if (strlen($line) != self::REGISTER_PAYLOAD) {
                throw new RuntimeException(
                    "Wrong register payload in line #{$regCount} '{$line}'"
                );
            }

            $type = substr($line, 0, 1);

            switch ($type) {
            case '1':
                $regCount++;

                $currentOperation = $doi->pushOperacao(
                    $this->operacaoParser->parseDOI6($line)
                );

                break;

            case '2':
                $regCount++;

                $doi->pushAlienante(
                    $currentOperation, $this->alienanteParser->parseDOI6($line)
                );

                break;

            case '3':
                $regCount++;

                $doi->pushAdquirente(
                    $currentOperation, $this->adquirenteParser->parseDOI6($line)
                );

                break;

            case '9':
                $regCount++;

                $doi->setControle($this->controleParser->parseDOI6($line));

                break;

            default:
                throw new RuntimeException("Invalid register type '$type' in DOI file");
                break;
            }
        }

        fclose($handle);

        if ($doi->getControle()->campo_controle != $regCount) {
            throw new RuntimeException(
                "Invalid DOI file '{$filepath}' expected #{$doi->getControle()->campo_controle} registers but found #{$regCount}"
            );
        }
    }
}
