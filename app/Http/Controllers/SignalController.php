<?php

namespace App\Http\Controllers;

use App\Handlers\ProducerHandler;

//use App\Inventory;
use Illuminate\Http\Request;

class SignalController extends Controller
{
    /**
     * Publish error message
     */
    const PUBLISH_ERROR_MESSAGE = 'Publish message to kafka failed';

     /**
     * Kafka producer
     *
     * @var \App\Handlers\Kafka\ProducerHandler
     */
    protected $producerHandler;

     /**
     * InventoryObserver's constructor
     *
     * @param \App\Handlers\Kafka\ProducerHandler $producerHandler
     */
    public function __construct(ProducerHandler $producerHandler)
    {
        $this->producerHandler = $producerHandler;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    
    protected function pushToKafka(Request $request)
    {
        $topic = env('KAFKA_TOPIC', false);
        $this->validate($request, [
            's' => 'required',
        ]);
        try {
            $this->producerHandler->setTopic($topic)
                ->send($request->input('s'));
        } catch (Exception $e) {
            Log::critical(self::PUBLISH_ERROR_MESSAGE, [
                'error' => $e->getMessage(),
                'code' => $e->getCode()
            ]);
        }
    }
}