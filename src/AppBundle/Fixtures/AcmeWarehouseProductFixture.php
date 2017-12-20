<?php

declare(strict_types=1);

namespace AppBundle\Fixtures;

use AppBundle\Fixtures\Factory\AcmeProductFactory;
use Doctrine\Common\Persistence\ObjectManager;
use Sylius\Bundle\FixturesBundle\Fixture\AbstractFixture;
use Sylius\Component\Core\Model\ProductInterface;

class WarehouseProductFixture extends AbstractFixture
{
    /**
     * @var ObjectManager
     */
    private $productManager;

    /**
     * @var AcmeProductFactory
     */
    private $productFactory;

    public function __construct(ObjectManager $productManager, AcmeProductFactory $customProductFactory)
    {
        $this->productManager = $productManager;
        $this->productFactory = $customProductFactory;
    }

    public function load(array $options): void
    {
        for ($i = 0; $i < 10; $i++) {
            /** @var ProductInterface $product */
            $product = $this->productFactory->create();

            $this->productManager->persist($product);
        }

        $this->productManager->flush();
    }

    public function getName(): string
    {
        return 'acme_warehouse_products';
    }
}
