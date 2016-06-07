<?php
return array(
    // set your paypal credential
    'client_id' => 'ATIGqNNbaTofzoYU55GuBO7I3YT43DiMTx6VMiMUFYt0Ko8os9IS54OODpOctAkEaBzGzQ_Z6coLFE7J',
    'secret' => 'ELXugYGVzEh41VTfsVE8-kSlnM5NycIMMsxA_Gs5w8Uogu1aIN_1VAGE_i1WOCO9xDBDzGUd2upD67V1',
    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);


