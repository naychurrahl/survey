<?php
  require_once("../includes/php/functions.php");

  $data = [
    ["name" => "question_1", "question" => "V2hhdCBkbyB5b3UgdGhpbmsgb2YgY2hhdGJvdHM/Fg=="]/*,
    ["name" => "question_2", "question" => "V2hhdCBpcyB5b3VyIG9waW5pb24gb24gdXNpbmcgYSBjaGF0Ym90IG9uIHdoYXRzYXBwPxY="],
    ["name" => "question_3", "question" => "QXMgYSBidXNpbmVzcyBvd25lciwgZG8geW91IHRoaW5rIGl0cyBhIGdvb2QgaWRlYSB0byBpbnRlZ3JhdGUgYSBjaGF0Ym90IHdpdGggd2hhdHNhcHAgdG8gYXV0b21hdGUgY3VzdG9tZXIgc3VwcG9ydD8W"],
    ["name" => "question_4", "question" => "QXNpZGUgZnJvbSBVQkEncyBMZW8sIFplbml0aCBiYW5rJ3MgWml2YSBhbmQgV2hhdHNhcHAgbWV0YS4gRG8geW91IGtub3cgb2YgYW55IG90aGVyIGNoYXRib3QgaW5lZ3JhdGVkIHdpdGggd2hhdHNhcHA/"],
    ["name" => "question_5", "question" => "SWYgeWVzLCBraW5kbHkgbWV0aW9uIGJlbG93IChzZXBlcmF0ZSBieSBjb21hIGlmIG1vcmUgdGhhbiBvbmUp"],
    ["name" => "question_6", "question" => "RG8geW91IHRoaW5rIGl0IGlzIGEgbmljZSBpZGVhIHRvIHByb3ZpZGUgJ2J1a]xkaW5nIGFuZCBpbnRlZ3JhdGluZyBjaGF0Ym90cyB3aXRoIHdoYXRzYXBwIGFzIGEgc2VydmljZT8="],
    ["name" => "question_7", "question" => "SWYgeWVzLCBIb3cgYmVzdCBjYW4gSSBtYXJrZXQgdGhpcyBzZXJ2aWNlPw=="]*/
  ];

  $ins = database_insert($con, "questions", $data);
  print_r($ins);

?>

Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36

Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0

Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:132.0) Gecko/20100101 Firefox/132.0 