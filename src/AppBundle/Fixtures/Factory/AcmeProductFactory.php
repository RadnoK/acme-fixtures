<?php

declare(strict_types=1);

namespace AppBundle\Fixtures\Factory;

use Sylius\Component\Core\Model\Product;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Product\Generator\SlugGeneratorInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

class ProductFactory implements AcmeFactoryInterface
{
    /**
     * @var FactoryInterface
     */
    private $productFactory;

    /**
     * @var SlugGeneratorInterface
     */
    private $slugGenerator;

    public function __construct(FactoryInterface $productFactory, SlugGeneratorInterface $slugGenerator)
    {
        $this->productFactory = $productFactory;
        $this->slugGenerator = $slugGenerator;
    }

    public function create(array $options): ProductInterface
    {
        /** @var ProductInterface $product */
        $product = $this->productFactory->createNew();
        $product->setSlug(sprintf(
            'acme-2-%s',
            $this->slugGenerator->generate($options['name'])
        ));

        return $product;
    }
}
