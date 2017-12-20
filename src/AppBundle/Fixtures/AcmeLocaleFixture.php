<?php

declare(strict_types=1);

namespace AppBundle\Fixtures;

use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Component\Locale\Model\Locale;

class LocaleFixture extends AbstractFixture
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function load(array $options): void
    {
        $localeEnglish = new Locale();
        $localeEnglish->setCode('en');

        $this->objectManager->persist($localeEnglish);

        $localeSpanish = new Locale();
        $localeSpanish->setCode('es');

        $this->objectManager->persist($localeSpanish);
        $this->objectManager->flush();
    }

    public function getName(): string
    {
        return 'acme_locales';
    }
}
