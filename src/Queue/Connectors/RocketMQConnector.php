<?php

namespace Tbphp\LaravelQueueRocketMQ\Queue\Connectors;

use Illuminate\Queue\Connectors\ConnectorInterface;
use MQ\MQClient;
use Tbphp\LaravelQueueRocketMQ\Queue\RocketMQQueue;
use ReflectionException;

class RocketMQConnector implements ConnectorInterface
{
    /**
     * @throws ReflectionException
     */
    public function connect(array $config): RocketMQQueue
    {
        $client = new MQClient(
            $config['endpoint'],
            $config['access_id'],
            $config['access_key']
        );

        return new RocketMQQueue($client, $config);
    }
}
