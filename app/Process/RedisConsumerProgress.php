<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Process;

use App\Constants\Channel;
use App\Kernel\Subscriber;
use Hyperf\Process\AbstractProcess;
use Hyperf\Process\Annotation\Process;

/**
 * @Process(name="RedisConsumerProgress")
 */
class RedisConsumerProgress extends AbstractProcess
{
    public function handle(): void
    {
        $redis = di()->get(Subscriber::class);

        $redis->subscribe(Channel::getArray(), function ($instance, $channelName, $message) {
            var_dump($instance);
            var_dump($channelName);
            var_dump($message);

            // TODO: 执行对应的消费操作
        });
    }
}
