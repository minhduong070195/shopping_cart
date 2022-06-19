
<?php

    return array(
        'payment_method' => array(
            'PAYMENT_METHOD_ADVANCE' => 1,
            'PAYMENT_METHOD_AT_SHOP' => 0,
        ),

        'status' => array(
            'enable' => 1,
            'disable' => 0
        ),

        'type_purchase' => array(
            'to-pay',
            'to-ship',
            'to-receive',
            'completed',
            'cancelled'
        ),

        'get_type_purchase' => array(
            'to-pay' => 1,
            'to-ship' => 2,
            'to-receive' => 3,
            'completed' => 4,
            'cancelled' => 5
        ),

        'gender' => array(
            'male' => 1,
            'female' => 2,
            'order' => 3
        )

    );