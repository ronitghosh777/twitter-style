<?php

return [

  'services' => [

      'github' => [
          'name' => 'GitHub',
      ]

  ],

  'events' => [

      'github' => [
          'created' => App\Events\Social\GitHubAccountWasLinked::class,
      ]
  ]
];