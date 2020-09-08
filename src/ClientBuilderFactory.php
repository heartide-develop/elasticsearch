<?php

declare(strict_types=1);
/**
 * Created by hyperf-elasticsearch
 * Date: 2020/09/08
 * Time: 15:02
 * Author Junduo <caijunduo@gmail.com>
 */

namespace Heartide\Elasticsearch;

use Elasticsearch\ClientBuilder;
use Hyperf\Guzzle\RingPHP\CoroutineHandler;
use Swoole\Coroutine;

class ClientBuilderFactory
{
    public function create()
    {
        $builder = ClientBuilder::create();
        if (Coroutine::getCid() > 0) {
            $builder->setHandler(new CoroutineHandler());
        }

        return $builder;
    }
}