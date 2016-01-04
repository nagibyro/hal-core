<?php
/**
 * @copyright (c) 2016 Quicken Loans Inc.
 *
 * For full license information, please view the LICENSE distributed with this source code.
 */

namespace QL\Hal\Core\Repository;

use QL\Hal\Core\Entity\Deployment;
use QL\Hal\Core\Entity\DeploymentPool;
use QL\Hal\Core\Entity\DeploymentView;
use QL\Hal\Core\Testing\DoctrineTest;

class DeploymentPoolTest extends DoctrineTest
{
    public function testRepositoryIsCorrect()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository(DeploymentPool::CLASS);

        $this->assertSame(DeploymentPoolRepository::CLASS, get_class($repo));
        $this->assertSame(DeploymentPool::CLASS, $repo->getClassName());
    }

    public function testGetPoolForAViewAndDeploymentPair()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository(DeploymentPool::CLASS);

        $deployment = (new Deployment)->withId(1234);
        $view = new DeploymentView('abcde');

        $em->persist($deployment);
        $em->persist($view);
        $em->flush();

        $pools = $repo->getPoolForViewAndDeployment($view, $deployment);

        $this->assertSame([], $pools);
    }
}
