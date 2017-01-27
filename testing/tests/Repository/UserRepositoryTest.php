<?php
/**
 * @copyright (c) 2016 Quicken Loans Inc.
 *
 * For full license information, please view the LICENSE distributed with this source code.
 */

namespace Hal\Core\Repository;

use Hal\Core\Entity\User;
use Hal\Core\Testing\DoctrineTest;
use QL\MCP\Common\Time\TimePoint;

class UserRepositoryTest extends DoctrineTest
{
    public function testRepositoryIsCorrect()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository(User::class);

        $this->assertSame(UserRepository::class, get_class($repo));
        $this->assertSame(User::class, $repo->getClassName());
    }

    public function testGetPagedUsers()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository(User::class);

        $user1 = new User(null, 'user1');
        $user2 = new User(null, 'user2');
        $user3 = new User(null, 'user3');
        $user4 = new User(null, 'user4');

        $em->persist($user1);
        $em->persist($user2);
        $em->persist($user3);
        $em->persist($user4);
        $em->flush();

        $users = $repo->getPagedResults(2, 1);

        $raw = [];
        foreach ($users as $user) $raw[] = $user;

        // total size
        $this->assertCount(4, $users);

        // page size
        $this->assertCount(2, $raw);

        $this->assertSame($user3, $raw[0]);
        $this->assertSame($user4, $raw[1]);
    }
}
