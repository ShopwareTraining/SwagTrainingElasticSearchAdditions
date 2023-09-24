<?php declare(strict_types=1);

namespace SwagTraining\ElasticSearchAdditions\Test\Integration;

use Yireo\IntegrationTestHelper\Test\Integration\AbstractTestCase;

class CheckForDecorationTest extends AbstractTestCase
{
    public function getPluginName(): string
    {
        return 'SwagTrainingElasticSearchAdditions';
    }

    public function testIfServiceDecoratorIsRegistered()
    {
        $this->assertBundleIsInstalled();
    }
}