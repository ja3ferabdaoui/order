<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }
    
       /**
     * Return all order refs
     *
     * @return array
     */
    public function getAllOrderRefIds()
    {
        $arrayResult = $this->getAllOrders();
        $refIds = array();
        
        foreach ($arrayResult as $entry) {
            $refIds[] = $entry->getRefId();
        }
        return $refIds;
    }

    // /**
    //  * @return Order[] Returns an array of Order objects
    //  */
    
    public function getAllOrders()
    {
        return $this->createQueryBuilder('o')
            ->getQuery()
            ->getResult()
        ;
    }
    
}
