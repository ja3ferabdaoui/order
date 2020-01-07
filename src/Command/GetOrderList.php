<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Psr\Log\LoggerInterface;
use App\Entity\Order;

class GetOrderList extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:get-orders-list';

    protected function configure()
    {
        // $this
        // // the short description shown while running "php bin/console list"
        // ->setDescription('Get a list orders.')

        // // the full command description shown when running the command with
        // // the "--help" option
        // ->setHelp('This command allows you to get orders list...')
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {    



         // Database
         $kernel = $this->getApplication()->getKernel();
         $container = $kernel->getContainer();
         $em = $container->get('doctrine')->getManager();
         $repository = $em->getRepository(Order::class);

         // Loading Xml
          $urlOrders = $container->getParameter('url_orders');
         
         $xmlContent = file_get_contents('/home/jaafar/projets/new/order/src/Resources/public/orders-test.xml');
         if ($xmlContent === false) {
             $output->writeln('Error while loading xml orders.');
             return false;
         } else {
             $output->writeln('Successfully load xml orders.');
         }
         $xml = simplexml_load_string($xmlContent, 'SimpleXMLElement', LIBXML_NOCDATA);
         // Getting all order references
            $orderRefIds = $repository->getAllOrderRefIds();
 
         // Getting all orders from xml
         foreach ($xml->xpath('orders/order') as $row) {
             if (in_array($row->order_refid, $orderRefIds)) {
                 continue;
             }
 
             // Persisting orders if not existing in database

             $order = new Order();
             $order->setRefId($row->order_refid);
             $order->setStatusMarketPlace($row->order_status->marketplace);
             $order->setStatusLengow($row->order_status->lengow);
             $order->setPurchaseDate(new \DateTime($row->order_purchase_date));
             $em->persist($order);
         }
 
         $em->flush();
         $output->writeln('Successfully get list orders');
         return 0;
    }
}
