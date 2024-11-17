CREATE TABLE `questions` (
  `id`        int(3)       NOT NULL AUTO_INCREMENT,
  `name`      varchar(15)  NOT NULL,
  `question`  varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `users` (
  `id`    int(3)       NOT NULL AUTO_INCREMENT,
  `user`  varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `su` (
  `id`    int(3)      NOT NULL AUTO_INCREMENT,
  `user`  varchar(36) NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `answers` (
  `id`       int(3)       NOT NULL AUTO_INCREMENT,
  `user`     int(3)       NOT NULL,
  `answer`   varchar(510) NOT NULL,
  `question` int(3)       NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user`) REFERENCES `users`(`id`)
  ON UPDATE CASCADE
  ON DELETE CASCADE,
  FOREIGN KEY (`question`) REFERENCES `questions`(`id`)
  ON UPDATE CASCADE
  ON DELETE CASCADE
) ENGINE=InnoDB;


INSERT INTO su (user)
/*VALUES ("1284c46b17dcc567c84db0b63395bb7294e");*/
VALUES ("45b9301c2bdaa937382ae6a75751a94a42d");

INSERT INTO questions (name, question) VALUES
("question_1", "V2hhdCBkbyB5b3UgdGhpbmsgb2YgY2hhdGJvdHM/Fg=="),
("question_2", "V2hhdCBpcyB5b3VyIG9waW5pb24gb24gdXNpbmcgYSBjaGF0Ym90IG9uIHdoYXRzYXBwPxY="),
("question_3", "QXMgYSBidXNpbmVzcyBvd25lciwgZG8geW91IHRoaW5rIGl0cyBhIGdvb2QgaWRlYSB0byBpbnRlZ3JhdGUgYSBjaGF0Ym90IHdpdGggd2hhdHNhcHAgdG8gYXV0b21hdGUgY3VzdG9tZXIgc3VwcG9ydD8W"),
("question_4", "QXNpZGUgZnJvbSBVQkEncyBMZW8sIFplbml0aCBiYW5rJ3MgWml2YSBhbmQgV2hhdHNhcHAgbWV0YS4gRG8geW91IGtub3cgb2YgYW55IG90aGVyIGNoYXRib3QgaW5lZ3JhdGVkIHdpdGggd2hhdHNhcHA/"),
("question_5", "SWYgeWVzLCBraW5kbHkgbWV0aW9uIGJlbG93IChzZXBlcmF0ZSBieSBjb21hIGlmIG1vcmUgdGhhbiBvbmUp"),
("question_6", "RG8geW91IHRoaW5rIGl0IGlzIGEgbmljZSBpZGVhIHRvIHByb3ZpZGUgJ2J1aWxkaW5nIGFuZCBpbnRlZ3JhdGluZyBjaGF0Ym90cyB3aXRoIHdoYXRzYXBwIGFzIGEgc2VydmljZT8="),
("question_7", "SWYgeWVzLCBIb3cgYmVzdCBjYW4gSSBtYXJrZXQgdGhpcyBzZXJ2aWNlPw=="),
("question_8", "V291bGQgeW91IGJlIGludGVyZXN0ZWQgaW4gdGhpcyBzZXJ2aWNlIG5vdyBvciBtYXliZSBpbiB0aGUgZnV0dXJlPw====");
