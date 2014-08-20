<?php

include "config.php"; 

/* working version */

$DB->Query("SELECT connection,topic FROM topicb.topics");
$result = json_encode($DB->get());
echo $result;


/* 
	currently returns the following example data which is displayed here: bit.ly/1s4Epnm 
*/

/*

[
	{"0":"206-000-0005","connection":"206-000-0005","1":"Seattle","topic":"Seattle"},
	{"0":"206-000-0005","connection":"206-000-0005","1":"LA","topic":"LA"},
	{"0":"206-000-0005","connection":"206-000-0005","1":"SF","topic":"SF"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"Mariners","topic":"Mariners"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"Seahawks","topic":"Seahawks"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"Sounders","topic":"Sounders"},
	{"0":"206-000-0004","connection":"206-000-0004","1":"trumpet","topic":"trumpet"},
	{"0":"206-000-0001","connection":"206-000-0001","1":"Bootstrapping","topic":"Bootstrapping"},
	{"0":"206-000-0001","connection":"206-000-0001","1":"Angel Investor","topic":"Angel Investor"},
	{"0":"206-000-0001","connection":"206-000-0001","1":"Runway","topic":"Runway"}
]

*/


/* would like the data to be in the following format */

/*

[
  {
    "connection" : "2060000002",
    "topics" : [
    {
        "topic" : "hamburger",
        "state" : "available",
        "category" : "food"
    },
    {
        "topic" : "Mariners",
        "state" : "waiting",
        "category" : "sports"
    },
    {
        "topic" : "Ichiro",
        "state" : "available",
        "category" : "sports"
    }
    ]
  },
  {
    "connection" : "2060000001",
    "topics" : [
    {
        "topic" : "World Advertising Congress",
        "state" : "active",
        "category" : "advertising"
    },
    {
        "topic" : "Digital Strategies",
        "state" : "available",
        "category" : "technology"
    },
    {
        "topic" : "Multi-Channel Experience",
        "state" : "available",
        "category" : "technology"
    }
    ] 
  },
  {
    "connection" : "2060000003",
    "topics" : [
    {
        "topic" : "Dark Souls 2",
        "state" : "active",
        "category" : "game"
    }
    ]
  }
];

*/


?>