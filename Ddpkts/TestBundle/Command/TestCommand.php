<?php

namespace Ddpkts\TestBundle\Command;

use Ellis\Oxid\Bundle\FrameworkBundle\OxidFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * Configures the current command.
     */
    protected function configure()
    {
        $this
            ->setName('test')
            ->setDescription('Test command')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var OxidFactory $factory */
        $factory = $this->container->get('oxid.oxid_factory');

        /** @var \oxArticle $product */
        $product = $factory->getFromRegistry('oxarticle');
        $product->setLanguage(0);
        $product->load('05848170643ab0deb9914566391c0c63');

        print_r($product->oxarticles__oxshortdesc);

        $output->writeLn('test command success!');
    }
}
